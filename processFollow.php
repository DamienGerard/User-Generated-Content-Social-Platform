<?php include 'session_login.php';?>

<?php
$followed = $_POST['followed'];
$follower = $_POST['follower'];

$query = "SELECT follow.date_since FROM webprojectdatabase.follow WHERE follow.followed = :followed AND follow.follower = :follower";
$values = array(':followed'=>$followed, ':follower'=>$follower); 

try {
    $res = $pdo->prepare($query);
    $res->execute($values);
}catch (PDOException $e){
    throw new Exception('Database query error');
} 

if($res->rowCount() > 0) {
    $query = "DELETE FROM webprojectdatabase.notification WHERE notification.event_type = 'follow' AND notification.cause_id = :follower AND notification.user_id = :followed";
    $values = array(':followed'=>$followed, ':follower'=>$follower);   

    $pdo->beginTransaction();
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    $query = "DELETE FROM webprojectdatabase.follow WHERE follow.followed = :followed AND follow.follower = :follower";
    $values = array(':followed'=>$followed, ':follower'=>$follower); 
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }
    
    $pdo->commit();
    
    echo '<button id="followButton" class="relation-button" onclick="processFollow()" >Follow</button>';

    die();
} else {
    $query = "INSERT INTO webprojectdatabase.follow(follow.followed, follow.follower, follow.date_since) VALUES(:followed, :follower, :date_since)";
    $values = array(':followed'=>$followed, ':follower'=>$follower, ':date_since'=>date("Y-m-d"));  

    $pdo->beginTransaction();

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
        $lastIdFollow = $pdo->lastInsertId();
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 

    $query = "INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES(:event_id, :event_type, :cause_id, :cause_type, :date, :user_id, :seen)";
    $values = array(':event_id'=>$lastIdFollow, ':event_type'=>'follow', ':cause_id'=>$follower, ':cause_type'=>'user', ':date'=>date("Y-m-d"), ':user_id'=>$followed, ':seen'=>0);  

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 
    
    $pdo->commit();

    echo '<button id="followButton" class="in-relation-button" onclick="processFollow()" >Following</button>';

    die();   
}
