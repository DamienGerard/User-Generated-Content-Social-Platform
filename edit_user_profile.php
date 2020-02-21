<?php 
include 'session_login.php';

$Id = $_POST['Id'];
$Cover_pic = $_POST['Cover_pic'];
$Profile_pic = $_POST['Profile_pic'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Dob = $_POST['Dob'];
$Education = $_POST['Education'];
$Self_description = $_POST['Self_description'];

$query = "UPDATE webprojectdatabase.user SET user.cover_pic = :cover_pic, user.profile_pic = :profile_pic, user.f_name = :f_name, user.l_name = :l_name, user.DOB = :DOB, user.education = :education, user.self_description = :self_description WHERE user.user_id = :Id";
$values = array(':cover_pic' => $Cover_pic, ':profile_pic' => $Profile_pic, ':f_name' => $FirstName, ':l_name' => $LastName, ':DOB' => $Dob, ':education' => $Education, ':self_description' => $Self_description, ':Id' => $Id);
try {

    $res = $pdo->prepare($query);
    $res->execute($values);
  
   

}catch (PDOException $e){
    throw new Exception('Database query error');
}

?>