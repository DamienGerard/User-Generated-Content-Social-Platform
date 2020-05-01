<?php include 'session_login.php';
    include 'admin/admin_session_login.php';?>
<?php
    $keyword = $_GET['Search-query'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="tab.css">
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
                $queryArticle = "SELECT * FROM webprojectdatabase.content INNER JOIN webprojectdatabase.article ON content.content_id = article.article_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE CONCAT(content.title, ' ', user.f_name, ' ', user.l_name, ' ', user.user_name) LIKE '%".$keyword."%' AND content.marked=0 ORDER BY content.date DESC";

                $queryImage =  "SELECT * FROM webprojectdatabase.content INNER JOIN webprojectdatabase.picture ON content.content_id = picture.picture_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE CONCAT(content.title, ' ', user.f_name, ' ', user.l_name, ' ', user.user_name) LIKE '%".$keyword."%' AND content.marked=0 ORDER BY content.date DESC";

                $queryVideo = "SELECT * FROM webprojectdatabase.content INNER JOIN webprojectdatabase.video ON content.content_id = video.video_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE CONCAT(content.title, ' ', user.f_name, ' ', user.l_name, ' ', user.user_name) LIKE '%".$keyword."%' AND content.marked=0 ORDER BY content.date DESC";

                $queryQuestion = "SELECT * FROM webprojectdatabase.content INNER JOIN webprojectdatabase.question ON content.content_id = question.question_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE CONCAT(content.title, ' ', user.f_name, ' ', user.l_name, ' ', user.user_name) LIKE '%".$keyword."%' AND content.marked=0 ORDER BY content.date DESC";

                include 'content_tabinator.php';
            ?>
        
        </div>        
    </div>

    <?php include 'footer.php';?>
</body>
</html>