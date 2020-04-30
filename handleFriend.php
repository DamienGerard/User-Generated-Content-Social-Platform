<?php include 'session_login.php';

$response = $_GET['response'];
$requestee = $_GET['requestee']; 
$requestor = $_GET['requestor'];

if($_GET['response']=='accept'){
    $query = "UPDATE webprojectdatabase.friend SET pending = 0 WHERE requestee = $requestee AND requestor = $requestor"; 
    echo "Accepted";
}else {
    $query = "DELETE FROM webprojectdatabase.friend WHERE requestee = $requestee AND requestor = $requestor";
    echo "Rejected";
}

try {
    $res = $pdo->prepare($query);
    $res->execute();
}catch (PDOException $e){
    throw new Exception('Database query error');
}

$query = "DELETE FROM webprojectdatabase.notification WHERE cause_id = $requestor AND user_id = $requestee AND event_type = 'friend'";

try {
    $res = $pdo->prepare($query);
    $res->execute();
}catch (PDOException $e){
    throw new Exception('Database query error');
}