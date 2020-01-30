<?php include 'session_login.php';?>
<?php include 'user_only.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Content</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>

</head>
<body>
    
    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main">
        <br>
        <div class="post-content-row">
            <div class="generic-btn create-content"><a class="anchor-list-item" href="post_article.php"><i class="fas fa-newspaper"></i> Post Article</a></div>
            <div class="generic-btn create-content"><a class="anchor-list-item" href="post_video.php"><i class="far fa-play-circle"></i> Post Video</a></div>
        </div>
        <br>
        <div class="post-content-row">
        <div class="generic-btn create-content"><a class="anchor-list-item" href="post_image.php"><i class="fas fa-images"></i> Post Image</a></div>
        <div class="generic-btn create-content"><a class="anchor-list-item" href="post_question.php"><i class="fas fa-question"></i> Post Question</a></div>
        </div>       
        </div> 
    </div>


    <?php include 'footer.php';?>
</body>
</html>