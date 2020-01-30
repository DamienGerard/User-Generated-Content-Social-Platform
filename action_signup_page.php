<?php

/* Start the PHP Session */
session_start();

/* Include the database connection file (remember to change the connection parameters) */
require './db_inc.php';
/* Include the Account class file */
require './account_class.php';

//if(isset($_POST['submit'])){
    
$target_dir = "uploads/picture/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . basename(uniqid());
// Check if image file is a actual image or fake image
if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file.'.'.$imageFileType)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


/* Create a new Account object */
$account = new Account();

try
{
	$newId = $account->addAccount($_POST["username"], $_POST["password"], $_POST["firstname"], $_POST["lastname"], $_POST["self-description"], $_POST["dob"],  $target_file.'.'.$imageFileType , $_POST["education"]);
}
catch (Exception $e)
{
	echo $e->getMessage();
	die();
}

$login = FALSE;

try
{
	$login = $account->login($_POST["username"], $_POST["password"]);
}
catch (Exception $e)
{
	echo $e->getMessage();
	die();
}
    
if ($login)
{
    $query = "SELECT user.user_name FROM webprojectdatabase.user WHERE user.user_id =".$account->getId();
    
    try {
        $res = $pdo->prepare($query);
        $res->execute();
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 
    $user = $res->fetch()['user_name'];
    echo "<script>window.location.href='user_profile.php';</script>";
   die();
}
else
{
    echo "<script>window.location.href='user_auth.php';</script>";
    die();
}
   