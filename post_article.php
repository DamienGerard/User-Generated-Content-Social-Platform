<?php include 'session_login.php';?>
<?php include 'user_only.php';?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = $_POST['title'];
        $text = $_POST['editor'];
      
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
            
            $query = 'INSERT INTO webprojectdatabase.article(article.article_id, article.text) VALUES(:article_id, :text)';
            $values = array(':article_id'=>$id, ':text'=>$text);

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
                $notif_query = 'INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES('.$id.', "posted_article", '.$account->getId().', "user", "'.date("Y-m-d").'", '.$follower['follower'].', 0)';

                while($follower = $res->fetch()){
                    $notif_query = $notif_query.',('.$id.', "posted_article", '.$account->getId().', "user", "'.date("Y-m-d").'", '.$follower['follower'].', 0)';
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
    <title>Post Article</title>
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
            <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') {?>
                <form action="post_article.php" id="artform" method ="post">
                    <br><br>
                    Enter the title
                    <input type="text" name="title">
                    <br><br>
                    <textarea rows="20" cols="100" id="editor" name="editor" form="artform" placeholder="Describe yourself here..."></textarea>
                    <br><br>
                    <input type="submit" value=" Post " class="generic-btn create-content">
                </form>
                <script>
                    CKEDITOR.replace('editor');
                </script>
            <?php
                } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $query = 'SELECT content.title FROM webprojectdatabase.content WHERE content.content_id='.$id;
                    $res = $pdo->prepare($query);
                    $res->execute();
                    $row = $res->fetch();
                    echo '<h2>'.$row['title'].'</h2>';
                    echo '<br><br>';
                    $query = 'SELECT article.text FROM webprojectdatabase.article WHERE article.article_id='.$id;
                    $res = $pdo->prepare($query);
                    $res->execute();
                    $row = $res->fetch();
                    echo '<div style="width:100%; dsplay:flex;">';
                    echo '<div style="float:left; width:75%;">'.$row['text'].'</div>';
                    $thisId = $id;
                    $subject_type = 'content';
                    include 'interest_tab.php';
                    echo '</div>';
                    echo '<div style="text-align:center; margin-bottom: 5px;"><a href="article.php?content_id='.$id.'"><button type="button" class="btn btn-info btn-lg">Done</button></a></div>';
                    echo '<br><br>';
                }
            ?>
            
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>