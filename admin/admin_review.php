<?php
include 'admin_session_login.php';

$decision = $_GET["decision"];
$content_id = $_GET["content_id"];

$pdo->beginTransaction();

$query = "DELETE FROM reported WHERE report_id = ".$content_id;
$pdo->query($query);

if($decision==="takeDown"){
    $query = "UPDATE content SET marked = 1 WHERE content_id = ".$content_id;
    $pdo->query($query);
}

$pdo->commit();

echo json_encode(array("status"=>"success"));