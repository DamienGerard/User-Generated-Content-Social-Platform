<?php
use Opis\JsonSchema\{
    Validator, ValidationResult, ValidationError, Schema
};

require 'vendor/autoload.php';
include 'session_login.php';

if(isset($_GET["id"])){
    $id = $_GET["id"];
}

$query = "SELECT user.f_name,user.l_name,user.profile_pic,friend.date_since,user.user_name,user.self_description FROM user INNER JOIN friend on user.user_id=friend.requestor WHERE friend.requestee=".$id." AND friend.pending=0 UNION SELECT user.f_name,user.l_name,user.profile_pic,friend.date_since,user.user_name,user.self_description FROM user INNER JOIN friend on user.user_id=friend.requestee WHERE friend.requestor=".$id." AND friend.pending=0";

$result = $pdo->query($query);

$friends = $result->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($friends);
//header('Content-Type: application/json'); 
$data1 = json_decode($data);

$schema = Schema::fromJsonString(file_get_contents('userSchema.json'));
$validator = new Validator();

/** @var ValidationResult $result */
$result = $validator->schemaValidation($data1, $schema);

if ($result->isValid()) {
    
    //echo '$data is valid', PHP_EOL;
    header('Content-Type: application/json'); 
    echo $data;
}


?>