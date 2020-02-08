<?php include 'session_login.php';?>

<?php
    //php to retrieve picture from database
    if (isset($_GET['content_id'])) {
        $content_id = $_GET['content_id'];
        $query = "SELECT content.title, content.date, picture.picture_path, user.user_name, user.f_name, user.l_name, user.profile_pic FROM webprojectdatabase.content INNER JOIN webprojectdatabase.picture ON content.content_id = picture.picture_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.content_id=".$content_id;
        //to prepare and execute code
        try {
            $res = $pdo->prepare($query);
            $res->execute();
        }catch (PDOException $e){
            throw new Exception('Database query error');
        } 
        //once we have executed, we need to find a way to get and store the php element
        $row = $res->fetch();
        //we store it here
        $content_title = $row['title'];
        $content_date = $row['date'];
        $picture_path = $row['picture_path'];
        $username = $row['user_name'];
        $user_fname = $row['f_name'];
        $user_lname = $row['l_name'];
        $user_pic = $row['profile_pic'];
    }
    if($login && ($_SERVER['HTTP_REFERER'] != "http://localhost:1234/webproject/picture.php?content_id=".$content_id)){
        $query = "INSERT INTO webprojectdatabase.view(date, user_id, content_id) VALUES(:date, :user_id, :content_id)";
        $values = array(':date'=> date("Y-m-d H:i:s"), ':user_id'=> $account->getId(), ':content_id'=>$content_id);

        try {
            $res = $pdo->prepare($query);
            $res->execute($values);
            $myViewId = $pdo->lastInsertId();
        }catch (PDOException $e){
            throw new Exception('Database query error');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>

</head>
<body>
<?php 
    if($type == "user"){
        include 'navbar.php';
    }
    if($type == "admin"){
        include 'adminnavbar.php';
    }
    ?>
    

    <div class="super-main">

    <?php 
        if($type == "user"){
            include 'side_column.php';
        }
        if($type == "admin"){
            include 'adminSide_column.php';
        }
        ?>

        <div class="main">
            <?php
                //php to display pictures
                echo "<h2>$content_title</h2>";
                echo "<br><br>";
                echo "<h6>$content_date</h6>";
                echo '<a href="user_profile.php?user='.$username.'"><img src="'.$user_pic.'" alt="images/user_icon.png" width="75"></a>';
                echo '<a class="anchor-list-item" href="user_profile.php?user='.$username.'"><p>'.$user_fname.'</p></a>';
                echo '<a class="anchor-list-item" href="user_profile.php?user='.$username.'"><p>'.$user_lname.'</p></a>';
                echo "<br><br><br>";
                echo '<img src="'.$picture_path.'" alt="" width = "600">';
            ?>
            <br><hr><br>
            <?php include 'activity.php';?>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>