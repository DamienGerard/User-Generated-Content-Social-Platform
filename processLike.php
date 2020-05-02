<?php include 'session_login.php';?>

<?php
use Opis\JsonSchema\{
    Validator, ValidationResult, ValidationError, Schema
};

require 'vendor/autoload.php';
$like_data = json_decode(file_get_contents('php://input'));
$like_schema = Schema::fromJsonString(file_get_contents('like_schema.json'));
$like_validator = new Validator();

/** @var ValidationResult $result */
$result = $like_validator->schemaValidation($like_data, $like_schema);

if($result->isValid()){
    $type = $like_data->type;
    $content_id = $like_data->content_id;
    $content_type = $like_data->content_type;
    $user_id = $like_data->user_id;
    $thisViewId = $like_data->view_id;

    $query = "SELECT liked.like_id , liked.type FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND view.user_id = :user_id";
    $values = array(':thisContent'=>$content_id, ':user_id'=>$account->getId()); 

    $pdo->beginTransaction();

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 

    $row = $res->fetch();
    $like_id = $row['like_id'];
    $prevType = $row['type'];

    if($like_id > 0){
        $query = "DELETE FROM webprojectdatabase.notification WHERE notification.event_type = 'like_".$content_type."' AND notification.cause_id = :cause_id AND notification.user_id = :user_id";
        $values = array(':cause_id'=>$account->getId(), ':user_id'=>$user_id);   
        
        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception($e);
        }

        $query = "DELETE FROM webprojectdatabase.liked WHERE liked.like_id = :like_id";
        $values = array(':like_id'=>$like_id); 
        
        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }    
    }
    $lastIdLike = -1;
    if($prevType != $type){
        $query = "INSERT INTO webprojectdatabase.liked(liked.like_id, liked.type) VALUES(:like_id, :type) ON DUPLICATE KEY UPDATE type=:type";
        $values = array('like_id'=>$thisViewId, ':type'=>$type);  

        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception($e);
        }   
        
        $query = "INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES(:event_id, :event_type, :cause_id, :cause_type, :date, :user_id, :seen)";
        $values = array(':event_id'=>$thisViewId, ':event_type'=>'like_'.$content_type, ':cause_id'=>$account->getId(), ':cause_type'=>'user', ':date'=>date("Y-m-d"), ':user_id'=>$user_id, ':seen'=>0);  

        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
        }catch (PDOException $e){
            throw new Exception('Database query error');
        } 
    }

    

    $query = "SELECT count(*) FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND liked.type='like'";
    $values = array(':thisContent'=>$content_id);  

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 

    $nLikes = $res->fetchColumn();

    $query = "SELECT count(*) FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND liked.type='dislike'";
    $values = array(':thisContent'=>$content_id);  

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 

    $pdo->commit();

    $nDislikes = $res->fetchColumn();

    $updated_like_data = array();
    $updated_like_data["like_count"] = $nLikes;
    $updated_like_data["dislike_count"] = $nDislikes;

    $toggle_like = false;
    $toggle_dislike = false;
    if($login && $type=='like' ||  ($type=='dislike' && $prevType=='like')){
        $toggle_like = true;
    }

    if($login && $type=='dislike' ||  ($type=='like' && $prevType=='dislike')){
        $toggle_dislike = true;
    }

    $updated_like_data["toggle_like"] = $toggle_like;
    $updated_like_data["toggle_dislike"] = $toggle_dislike;

    $update_like_schema = Schema::fromJsonString(file_get_contents('update_like_schema.json'));
    $update_like_validator = new Validator();
    
    /** @var ValidationResult $result */
    $update_result = $update_like_validator->schemaValidation(json_decode(json_encode($updated_like_data)), $update_like_schema);

    if($update_result->isValid()){
        header('Content-Type: application/json');
        echo json_encode($updated_like_data);
    }
}


