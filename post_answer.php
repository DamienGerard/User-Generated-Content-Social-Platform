<?php include 'session_login.php';?>

<?php
$text = $_GET['text'];
$question = $_GET['question_id'];
$title = $_GET['title'];

if($text != ''){
    $query = 'INSERT INTO webprojectdatabase.content (content.title, content.user_id, content.date) VALUES (:title, :user_id, :date)';
    
    $values = array(':title' => $title, ':user_id' => $account->getId(), ':date' => date("Y-m-d H:i:s"));
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
        $id = $pdo->lastInsertId();
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }  

    $query = 'INSERT INTO webprojectdatabase.answer (answer.answer_id, answer.text, answer.question_id, answer.user_id, answer.date) VALUES (:answer_id, :text, :question_id, :user_id, :date)';
    
    $values = array(':answer_id' => $id, ':text' => $text, ':question_id' => $question, ':user_id' => $account->getId(), ':date' => date("Y-m-d"));

    $pdo->beginTransaction();
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    $query = 'SELECT content.user_id from webprojectdatabase.content WHERE content_id = :question_id';
    $values = array(':question_id' => $question);
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 
    $asker = $res->fetch(); 

    $query = 'SELECT follow.follower from webprojectdatabase.follow WHERE followed = :user_id AND follower != :asker';
    $values = array(':user_id' => $account->getId(), ':asker' => $asker['user_id']);
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }  

    if($follower = $res->fetch()){
        $notif_query = 'INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES('.$id.', "posted_question", '.$account->getId().', "user", "'.date("Y-m-d").'", '.$follower['follower'].', 0)';

        while($follower = $res->fetch()){
            $notif_query = $notif_query.',('.$id.', "posted_question", '.$account->getId().', "user", "'.date("Y-m-d").'", '.$follower['follower'].', 0)';
        }
        try {
            $res = $pdo->prepare($notif_query);
            $res->execute();
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }
    }
    
    $notif_query = 'INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES('.$id.', "answered_question", '.$account->getId().', "user", "'.date("Y-m-d").'", '.$asker['user_id'].', 0)';

    $query = 'SELECT notification.cause_id from webprojectdatabase.notification WHERE event_id = :event_id AND user_id = :user_id AND event_type = "asked_question"';
    $values = array(':user_id' => $account->getId(), ':event_id' => $question);
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    while($asker = $res->fetch()){
        $notif_query = $notif_query.',('.$id.', "answered_question", '.$account->getId().', "user", "'.date("Y-m-d").'", '.$asker['cause_id'].', 0)';
    }
    try {
        $res = $pdo->prepare($notif_query);
        $res->execute();
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    $pdo->commit();
}