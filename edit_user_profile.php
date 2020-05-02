<?php 
include 'session_login.php';

$FirstName = $_POST['firstName'];
$LastName = $_POST['lastName'];
$Dob = $_POST['dob'];
$Education = $_POST['education'];
$Self_description = $_POST['selfDescription'];

$values = array(':f_name' => $FirstName, ':l_name' => $LastName, ':DOB' => $Dob, ':education' => $Education, ':self_description' => $Self_description);

$query = "UPDATE webprojectdatabase.user SET user.f_name = :f_name, user.l_name = :l_name, user.DOB = :DOB, user.education = :education, user.self_description = :self_description ";

$target_dir = "uploads/picture/";
$coverUploaded = false;
$profileUploaded = false;
//$Cover_pic = $_POST['Cover_pic'];
if(isset($_FILES['coverImage']['size'])){
    $cover_target_file = $target_dir . basename($_FILES["coverImage"]["name"]);
    $coverImageFileType = strtolower(pathinfo($cover_target_file,PATHINFO_EXTENSION));
    $cover_target_file = $target_dir . basename(uniqid());

    if(getimagesize($_FILES["coverImage"]["tmp_name"]) && $_FILES["coverImage"]["size"] < 50000000 && ($coverImageFileType == "jpg" || $coverImageFileType == "png" || $coverImageFileType == "jpeg"
    || $coverImageFileType == "gif")){
        if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $cover_target_file.'.'.$coverImageFileType)) {
            $coverUploaded = true;
        }
    }
}

//$Profile_pic = $_POST['Profile_pic'];
if(isset($_FILES['profileImage']['name'])){
    $profile_target_file = $target_dir . basename($_FILES["profileImage"]["name"]);
    $profileImageFileType = strtolower(pathinfo($profile_target_file,PATHINFO_EXTENSION));
    $profile_target_file = $target_dir . basename(uniqid());

    if(getimagesize($_FILES["profileImage"]["tmp_name"]) && $_FILES["profileImage"]["size"] < 50000000 && ($profileImageFileType == "jpg" || $profileImageFileType == "png" || $profileImageFileType == "jpeg"
    || $profileImageFileType == "gif")){
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $profile_target_file.'.'.$profileImageFileType)) {
            $profileUploaded = true;
        }
    }
}


if($coverUploaded){
    $query =$query. ", user.cover_pic = :cover_pic ";
    $values[':cover_pic'] = $cover_target_file.'.'.$coverImageFileType;
}

if($profileUploaded){
    $query = $query.", user.profile_pic = :profile_pic ";
    $values[':profile_pic'] = $profile_target_file.'.'.$profileImageFileType;
}


$query = $query." WHERE user.user_id = ".$id;



try {

    $res = $pdo->prepare($query);
    $res->execute($values);

}catch (PDOException $e){
    throw new Exception($e);
}


?>