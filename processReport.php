<?php include 'session_login.php';?>

<?php
if(isset($_POST)){
$content_id = $_POST['content_id'];
$user_id = $_POST['user_id'];

    $query = "SELECT * FROM webprojectdatabase.reported WHERE report_id='".$content_id."' AND user_id='".$user_id."'";
    try {

        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }
    $result = $res->fetchColumn();
if($result>0){
    echo 'You already reported this content. Admin will verify it very soon.';
}
else{
    $query = "INSERT INTO webprojectdatabase.reported(reported.report_id,reported.user_id) VALUES ('".$content_id."','".$user_id."')";
     
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    $query = "SELECT COUNT(*) FROM webprojectdatabase.reported WHERE report_id='".$content_id."'";
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 
    $numReport = $res->fetchColumn();
    echo 'content id: '.$content_id.' has been reported. Admin will review it shortly.';
}

}
?>


