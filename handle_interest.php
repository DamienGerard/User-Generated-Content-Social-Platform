<?php
include 'session_login.php';
$action = $_GET['action'];
$subject_type = $_GET['subject_type'];
$subject_id = $_GET['subject_id'];
$interest_id = $_GET['interest_id'];

if($action == 'insert'){
    $query = 'INSERT INTO '.$subject_type.'_interest(interest_id, '.$subject_type.'_id) VALUES('.$interest_id.', '.$subject_id.')';
}else if($action == 'delete'){
    $query = 'DELETE FROM '.$subject_type.'_interest WHERE interest_id = '.$interest_id.' AND '.$subject_type.'_id = '.$subject_id;
}

try {
    $res = $pdo->prepare($query);
    $res->execute();
}catch (PDOException $e){
    throw new Exception('Database query error');
}