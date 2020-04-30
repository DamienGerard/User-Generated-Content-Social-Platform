<?php include 'session_login.php';?>

<?php
    
    if (isset($_GET['content_id'])) {
        $content_id = $_GET['content_id'];
        $query = "SELECT content.title, content.date, question.description, user.user_id, user.user_name, user.f_name, user.l_name, user.profile_pic FROM webprojectdatabase.content INNER JOIN webprojectdatabase.question ON content.content_id = question.question_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.content_id=".$content_id;

        try {
            $res = $pdo->prepare($query);
            $res->execute();
        }catch (PDOException $e){
            throw new Exception('Database query error');
        } 

        $row = $res->fetch();

        $content_title = $row['title'];
        $content_date = $row['date'];
        $ques_desc = $row['description'];
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
                echo '<a class="anchor-list-item" href="user_profile.php?user='.$username.'"><p>'.$user_fname.'</p></a>';
                echo '<a class="anchor-list-item" href="user_profile.php?user='.$username.'"><p>'.$user_lname.'</p></a>';
                echo "<br><br><br>";
                echo "<p>$ques_desc</p>";
                echo "<br><br><br>";
            ?>
            <br><hr><br>
            <?php 
                $content_type = 'question';
                include 'activity.php';
            ?>
            <br><hr><br>
            <div id="post-answer"> 
                <h3>Write an answer</h3> 
                <textarea name="answer" id="answer" style="width:45%; display:block" rows="1" form="getAnswer"></textarea>
                <!-- <script src="ckeditor/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('answer');
                    config.removePlugins = 'elementspath,save,font';
                </script> -->
                <button class="generic-btn create-content" <?php if($login){?>onclick="processAnswer()"<?php } ?>>Answer</button>
            </div>
            
            <br><br><hr><br>
            <h3>Answers</h3>
            <br>
            <div id="answer-container">
                <?php
                    $query = "SELECT DISTINCT user.user_name, user.f_name, user.l_name, user.profile_pic, answer.answer_id, answer.date, answer.text FROM webprojectdatabase.question INNER JOIN webprojectdatabase.answer ON answer.question_id = question.question_id INNER JOIN webprojectdatabase.user ON user.user_id = answer.user_id WHERE question.question_id = :thisContent ORDER BY answer.date DESC";
                    $values = array(':thisContent'=>$content_id);

                    try {
                        $res = $pdo->prepare($query);
                        $res->execute($values);
                    }catch (PDOException $e){
                        throw new Exception('Database query error');
                    }  
                    while($row = $res->fetch()){
                        echo '<div style="background-color:lightgrey; border-radius: 5px; border: 3px solid black; height:200px; overflow:hidden">';
                        echo '<table>';
                        echo '<tr>';
                        echo '<td rowspan="2"><a href="user_profile.php?user='.$row['user_name'].'" class="generic-btn"><img src="'.$row['profile_pic'].'" alt="" style="height:50px"></a></td>';
                        echo '<td><a class="generic-btn anchor-list-item" href="user_profile.php?user='.$row['user_name'].'"><p>'.$row['f_name'].' '.$row['l_name'].'</p></a></td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo "<td>".$row['date']."</td>";
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td colspan="2">'.'<a class="answer-link" href="answer.php?content_id='.$row['answer_id'].'"><p>'.$row['text'].'</p></a>'.'</td>';
                        echo '</tr>';
                        echo '</table>';
                        echo '</div>';
                        echo '<br><br>';
                    }
                ?>
            </div>
            <?php if($login){?>
            <script>
                function processAnswer(){
                    var unique = new Date().getUTCMilliseconds();
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'post_answer.php?text='+document.getElementById('answer').value+'&question_id='+<?php echo $content_id; ?>+'&title=<?php echo $content_title; ?>'+'&unique='+unique, true);
                    xhr.send();

                    xhr.onload = function(){
                        $("#answer-container").load(" #answer-container");
                        $("#post-answer").load(" #post-answer");
                    }
                    
                }
            </script>
            <?php }?>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>