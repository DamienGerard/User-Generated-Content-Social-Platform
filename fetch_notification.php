<?php include 'session_login.php';?>

<?php
use Opis\JsonSchema\{
    Validator, ValidationResult, ValidationError, Schema
};

require 'vendor/autoload.php';
$notification_schema = Schema::fromJsonString(file_get_contents('notification_schema.json'));
$user_id = $account->getId();;

$query = "SELECT notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.seen, DATE_FORMAT(notification.date, '%W %M %e %Y') as date FROM webprojectdatabase.notification WHERE notification.user_id = :user_id ORDER BY date DESC, seen ASC LIMIT 5";
$values = array(':user_id'=>$user_id); 

$pdo->beginTransaction();

try {
    $res = $pdo->prepare($query);
    $res->execute($values);
}catch (PDOException $e){
    throw new Exception('Database query error');
} 
$notif_data = array();
$notif_node = array();
$notif_index = 0;
$notif = '';
$cause_name = '';
$cause_pic = '';
$notif_main = '';
$new_notif = '';
$notif_date = '';

$friend_request=0;
while($row = $res->fetch()){

    $notif_date = $row['date'];

    if(!$row['seen']){
        $main_width=350;
        $new_notif = '<td rowspan="2" style="padding: 1px;" width="50"><i class="fas fa-flag"></i></td>';
    }else{
        $main_width=400;
        $new_notif = '';
    }

    if($row['cause_type']=='user'){
        $causeQuery = 'SELECT user.user_name, user.f_name, user.l_name, user.profile_pic FROM webprojectdatabase.user WHERE user.user_id = '. $row['cause_id'];

        try {
            $causeResult = $pdo->prepare($causeQuery);
            $causeResult->execute();
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }

        $causeRow = $causeResult->fetch();
        $cause_name = $causeRow['f_name'].' '.$causeRow['l_name'];
        $cause_pic = $causeRow['profile_pic'];
        $cause_username = $causeRow['user_name'];
    }


    if($row['event_type']=='message'){
        continue;
    }else if($row['event_type']=='friend'){
        $notif_main = '<a class="anchor-list-item" href="user_profile.php?user='.$cause_username.'">'.$cause_name.'</a> sent you a freind request <div id="friend_request_'.++$friend_request.'"><button class="generic-btn" onclick="handleFriend(\'accept\','.$user_id.','.$row['cause_id'].',\'friend_request_'.$friend_request.'\')">Accept</button> <button class="generic-btn" onclick="handleFriend(\'reject\','.$user_id.','.$row['cause_id'].', \'friend_request_'.$friend_request.'\')">Reject</button></div>';
    }else if($row['event_type']=='follow'){
        $notif_main = '<a class="anchor-list-item" href="user_profile.php?user='.$cause_username.'">'.$cause_name.' started following you</a>';
    }else if($row['event_type']=='reply_comment'){
        continue;
    }else {
        list($action, $contentType)=explode('_',$row['event_type']);
        
        if($action=='posted'){
            $eventQuery = 'SELECT content.content_id, content.title FROM webprojectdatabase.content WHERE content_id = '. $row['event_id'];

            try {
                $eventResult = $pdo->prepare($eventQuery);
                $eventResult->execute();
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }
            
            $eventRow = $eventResult->fetch();

        $notif_main = '<a class="anchor-list-item" href="'.$contentType.'.php?content_id='.$eventRow['content_id'].'">'.$cause_name.' posted a new '.$contentType.': '.$eventRow['title'].'</a>';

        }else if($action=='like'){
            $eventQuery = 'SELECT liked.type, content.content_id, content.title FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id=view.view_id INNER JOIN webprojectdatabase.content ON content.content_id=view.content_id WHERE liked.like_id = '. $row['event_id'];

            try {
                $eventResult = $pdo->prepare($eventQuery);
                $eventResult->execute();
            }catch (PDOException $e){
                throw new Exception($e);
            }
            
            $eventRow = $eventResult->fetch();

            $notif_main = '<a class="anchor-list-item" href="'.$contentType.'.php?content_id='.$eventRow['content_id'].'">'.$cause_name.' '.$eventRow['type'].' your '.$contentType.': '.$eventRow['title'].'</a>';
        }else if($action=='comment'){
            $eventQuery = 'SELECT comment.text, content.content_id, content.title FROM webprojectdatabase.comment INNER JOIN webprojectdatabase.view ON comment.comment_id=view.view_id INNER JOIN webprojectdatabase.content ON content.content_id=view.content_id WHERE comment.comment_id = '. $row['event_id'];

            try {
                $eventResult = $pdo->prepare($eventQuery);
                $eventResult->execute();
            }catch (PDOException $e){
                throw new Exception($e);
            }
            
            $eventRow = $eventResult->fetch();

            $notif_main = '<a class="anchor-list-item" href="'.$contentType.'.php?content_id='.$eventRow['content_id'].'">'.$cause_name.' '.' commented: "'.$eventRow['text'].'" your '.$contentType.': '.$eventRow['title'].'</a>';

        }else if($action=='asked'){
            $eventQuery = 'SELECT content.content_id, content.title FROM webprojectdatabase.question INNER JOIN webprojectdatabase.content ON content.content_id=question.question_id WHERE question.question_id = '. $row['event_id'];

            try {
                $eventResult = $pdo->prepare($eventQuery);
                $eventResult->execute();
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }
            
            $eventRow = $eventResult->fetch();

            $notif_main = '<a class="anchor-list-item" href="'.$contentType.'.php?content_id='.$eventRow['content_id'].'">'.$cause_name.' '.' asked you : '.$eventRow['title'].'</a>';

        }else if($action=='answered'){
            $eventQuery = 'SELECT content.content_id, content.title FROM webprojectdatabase.answer INNER JOIN webprojectdatabase.content ON content.content_id=answer.answer_id WHERE answer.answer_id = '. $row['event_id'];

            try {
                $eventResult = $pdo->prepare($eventQuery);
                $eventResult->execute();
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }
            
            $eventRow = $eventResult->fetch();

            $notif_main = '<a class="anchor-list-item" href="'.$contentType.'.php?content_id='.$eventRow['content_id'].'">'.$cause_name.' '.' answered your question : '.$eventRow['title'].'</a>';

        }
    }
    $notif_data[$notif_index] = array("cause_username"=>$cause_username, "cause_pic"=>$cause_pic, "main_width"=>$main_width, "notif_main"=>$notif_main, "new_notif"=>$new_notif, "notif_date"=>$notif_date);
    $notif_index++;
}

$notif_json = json_encode($notif_data);

$notification_validator = new Validator();

/** @var ValidationResult $result */
$result = $notification_validator->schemaValidation(json_decode($notif_json), $notification_schema);

if($result->isValid()){
    echo $notif_json;
    $query = "UPDATE webprojectdatabase.notification SET seen = 1 WHERE notification.user_id = :user_id AND notification.seen=0 ORDER BY date DESC, seen ASC LIMIT 5";
    $values = array(':user_id'=>$user_id);

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    $pdo->commit();
}else{
    /** @var ValidationError $error */
    $error = $result->getErrors();
    echo '$data is invalid', PHP_EOL;
    
    foreach ($error as $key => $value) {
        # code...
        echo "Error: ", $value->keyword(), PHP_EOL;
        echo json_encode($value->keywordArgs(), JSON_PRETTY_PRINT), PHP_EOL;
    }
}
