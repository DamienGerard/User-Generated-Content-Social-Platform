<?php include 'session_login.php';?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  isset($_FILES['fileToUpload'])) {

        $title = $_POST['title'];
      
        if($title != ''){
            $query = 'INSERT INTO webprojectdatabase.content (content.title, content.user_id, content.date) VALUES (:title, :user_id, :date)';
            
            $values = array(':title' => $title, ':user_id' => $account->getId(), ':date' => date("Y-m-d"));
            
            $pdo->beginTransaction();

            try {
                $res = $pdo->prepare($query);
                $res->execute($values);
                $id = $pdo->lastInsertId();
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }  
        
            $thumbnail_dir = "content_video/thumbnails/";
            $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
            $videoFile = $_FILES["fileToUpload"]["tmp_name"];
            $thumbnail = $thumbnail_dir.basename(uniqid()).'.jpg';
            $size = "320x240";
            $getFromSecond = 5;
            $cmd = "$ffmpeg -i $videoFile -an -ss $getFromSecond -s $size $thumbnail";
            shell_exec($cmd);

            $target_dir = "content_video/video_files/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $target_file = $target_dir . basename(uniqid());
            
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($videoFileType != "mp4" && $videoFileType != "webm" && $videoFileType != "ogg") {
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file.'.'.$videoFileType)) {
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            $query = 'INSERT INTO webprojectdatabase.video(video.video_id, video.video_path, video.thumbnail_path) VALUES(:video_id, :video_path, :thumbnail_path)';
            $values = array(':video_id'=>$id, ':video_path'=>$target_file.'.'.$videoFileType, ':thumbnail_path'=>$thumbnail);

            try {
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw new Exception('Database query error');
            } 

            $query = 'SELECT follow.follower from webprojectdatabase.follow WHERE followed = :user_id';
            $values = array(':user_id' => $account->getId());
            try {
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }  

            if($follower = $res->fetch()){
                $notif_query = 'INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES('.$id.', "posted_video", '.$account->getId().', "user", "'.date("Y-m-d").'", '.$follower['follower'].', 0)';

                while($follower = $res->fetch()){
                    $notif_query = $notif_query.',('.$id.', "posted_video", '.$account->getId().', "user", "'.date("Y-m-d").'", '.$follower['follower'].', 0)';
                }
                try {
                    $res = $pdo->prepare($notif_query);
                    $res->execute();
                }catch (PDOException $e){
                    throw new Exception('Database query error');
                }
            }

            $pdo->commit(); 
        }


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Video</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>

</head>
<body>
    
    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main">
        <form action="post_video.php" id="artform" method ="post" enctype="multipart/form-data">
            <br><br>
            Enter the title
            <input type="text" name="title">
            <br><br>
            Select video to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><br>
            <input type="submit" value=" Post " class="generic-btn create-content">
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $query = 'SELECT content.title FROM webprojectdatabase.content WHERE content.content_id='.$id;
                $res = $pdo->prepare($query);
                $res->execute();
                $row = $res->fetch();
                echo '<h2>'.$row['title'].'</h2>';
                echo '<br><br>';
                $query = 'SELECT video.video_path, video.thumbnail_path FROM webprojectdatabase.video WHERE video.video_id='.$id;
                $res = $pdo->prepare($query);
                $res->execute();
                $row = $res->fetch();
                echo '<div style="width:100%; dsplay:flex;">';
                $path_parts = pathinfo($row['video_path']);
                echo '<div style="float:left; width:75%;"><video width="320" heigth="240" controls poster="'.$row['thumbnail_path'].'">';
                echo '<source src="'.$row['video_path'].'" type="video/'.$path_parts['extension'].'">';
                echo '</video></div>';
                $thisId = $id;
                $subject_type = 'content';
                include 'interest_tab.php';
                echo '</div>';
                echo '<div style="text-align:center; margin-bottom: 5px;"><a href="video.php?content_id='.$id.'"><button type="button" class="btn btn-info btn-lg">Done</button></a></div>';
                echo '<br><br>';
            }
        ?>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>