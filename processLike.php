<?php include 'session_login.php';?>

<?php
$type = $_GET['type'];
$content_id = $_GET['content_id'];
$content_type = $_GET['content_type'];
$user_id = $_GET['user_id'];
$thisViewId = $_GET['view_id'];

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

if($login && $type=='like' && $prevType!=$type){
    echo '<div id = "like" class="generic-btn highlight"><i class="far fa-thumbs-up"></i> '.$nLikes.'</div>';
}else{
    echo '<div id = "like" class="generic-btn"><i class="far fa-thumbs-up"></i> '.$nLikes.'</div>';
}

if($login && $type=='dislike' && $prevType!=$type){
    echo '<div id = "dislike" class="generic-btn highlight"><i class="far fa-thumbs-up"></i> '.$nDislikes.'</div>';
}else{
    echo '<div id = "dislike" class="generic-btn"><i class="far fa-thumbs-up"></i> '.$nDislikes.'</div>';
}


