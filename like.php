<?php include 'session_login.php';
    include 'admin/admin_session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liked</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
        <div class="generic-btn" style="display:block; width:65px; margin-bottom: 5px;"><a href="like.php" class="anchor-list-item"> <h3 style="margin: 0; padding: 0;">Likes</h3> </a></div>
        <?php
            $queryArticle = "SELECT * FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id INNER JOIN webprojectdatabase.content ON view.content_id = content.content_id INNER JOIN webprojectdatabase.article ON content.content_id = article.article_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 AND view.user_id = ". $account->getId()." AND liked.type = 'like' ORDER BY view.date DESC";

            $queryImage =  "SELECT * FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id INNER JOIN webprojectdatabase.content ON view.content_id = content.content_id INNER JOIN webprojectdatabase.picture ON content.content_id = picture.picture_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 AND view.user_id = ". $account->getId()." AND liked.type = 'like' ORDER BY view.date DESC";

            $queryVideo = "SELECT * FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id INNER JOIN webprojectdatabase.content ON view.content_id = content.content_id INNER JOIN webprojectdatabase.video ON content.content_id = video.video_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 AND view.user_id = ". $account->getId()." AND liked.type = 'like' ORDER BY view.date DESC";

            $queryQuestion = "SELECT * FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id INNER JOIN webprojectdatabase.content ON view.content_id = content.content_id INNER JOIN webprojectdatabase.question ON content.content_id = question.question_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 AND view.user_id = ". $account->getId()." AND liked.type = 'like' ORDER BY view.date DESC";

            include 'content_tabinator.php';
        ?>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>