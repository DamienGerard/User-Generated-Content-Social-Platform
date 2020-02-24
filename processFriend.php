<?php include 'session_login.php';

$requestee = $_POST['requestee']; 
$requestor = $_POST['requestor'];

$query = "SELECT friend.pending FROM webprojectdatabase.friend WHERE friend.requestee = :requestee AND friend.requestor = :requestor";
$values = array(':requestee'=>$requestee, ':requestor'=>$requestor); 

try {
    $res = $pdo->prepare($query);
    $res->execute($values);
}catch (PDOException $e){
    throw new Exception('Database query error');
} 

if($res->rowCount() > 0) {
    $query = "DELETE FROM webprojectdatabase.notification WHERE notification.event_type = 'friend' AND notification.cause_id = :requestor AND notification.user_id = :requestee";
    $values = array(':requestor'=>$requestor, ':requestee'=>$requestee);   

    $pdo->beginTransaction();
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    $query = "DELETE FROM webprojectdatabase.friend WHERE friend.requestee = :requestee AND friend.requestor = :requestor";
    $values = array(':requestee'=>$requestee, ':requestor'=>$requestor); 
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }
    
    $pdo->commit();
    
    echo '<button id="friendButton" class="relation-button" onclick="processFriend()" >Friend</button>';
}else{
    $query = "INSERT INTO webprojectdatabase.friend(friend.requestee, friend.requestor, friend.date_since, friend.pending) VALUES(:requestee, :requestor, :date_since, :pending)";
    $values = array(':requestee'=>$requestee, ':requestor'=>$requestor, ':date_since'=>date("Y-m-d"), ':pending'=>1);  

    $pdo->beginTransaction();

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
        $lastIdFriend = $pdo->lastInsertId();
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 

    $query = "INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES(:event_id, :event_type, :cause_id, :cause_type, :date, :user_id, :seen)";
    $values = array(':event_id'=>$lastIdFriend, ':event_type'=>'friend', ':cause_id'=>$requestor, ':cause_type'=>'user', ':date'=>date("Y-m-d"), ':user_id'=>$requestee, ':seen'=>0);  

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 
    
    $pdo->commit();

    echo '<button id="friendButton" class="in-relation-button" onclick="processFriend()" >Pending</button>';
}