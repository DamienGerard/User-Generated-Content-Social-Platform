<?php include 'session_login.php';
    include 'admin/admin_session_login.php';?>

<?php
    if (isset($_GET['content_id'])) {
        $content_id = $_GET['content_id'];
        $query = "SELECT content.title, content.date, video.video_path, video.thumbnail_path, user.user_id, user.user_name, user.f_name, user.l_name, user.profile_pic FROM webprojectdatabase.content INNER JOIN webprojectdatabase.video ON content.content_id = video.video_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 AND content.content_id=".$content_id;

        try {
            $res = $pdo->prepare($query);
            $res->execute();
        }catch (PDOException $e){
            throw new Exception('Database query error');
        } 

        $row = $res->fetch();

        $content_title = $row['title'];
        $content_date = $row['date'];
        $video = $row['video_path'];
        $thumbnail = $row['thumbnail_path'];
        $user_id = $row['user_id'];
        $username = $row['user_name'];
        $user_fname = $row['f_name'];
        $user_lname = $row['l_name'];
        $user_pic = $row['profile_pic'];
    }
    if($login){
        $query = "INSERT INTO webprojectdatabase.view(view.date, view.user_id, view.content_id) VALUES(:date, :user_id, :content_id) ON DUPLICATE KEY UPDATE date=:date";
        $values = array(':date'=> date("Y-m-d H:i:s"), ':user_id'=> $account->getId(), ':content_id'=>$content_id);

        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
            $myViewId = $pdo->lastInsertId();
        }catch (PDOException $e){
            throw new Exception($e);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $content_title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>

</head>
<body>
    
    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main">
            <?php
                echo "<h2>$content_title</h2>";
                echo "<br><br>";
                echo "<h6>$content_date</h6>";
                echo '<a href="user_profile.php?user='.$username.'"><img src="'.$user_pic.'" alt="images/user_icon.png" width="75"></a>';
                echo '<a href="user_profile.php?user='.$username.'"><p>'.$user_fname.' '.$user_lname.'</p></a>';
                echo "<br><br><br>";
                $path_parts = pathinfo($row['video_path']);
                echo '<video width="680" heigth="500" controls poster="'.$thumbnail.'">';
                echo '<source src="'.$video.'" type="video/'.$path_parts['extension'].'">';
                echo '</video>';
            ?>
            <br><hr><br>
            <?php 
                include 'display_tag.php';
                $content_type = 'video';
                include 'activity.php';
            ?>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>