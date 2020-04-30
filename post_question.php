<?php include 'session_login.php';?>
<?php include 'user_only.php';?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $question = $_POST['question'];
        $description = $_POST['ques_desc'];
      
        if($question != ''){
            $query = 'INSERT INTO webprojectdatabase.content (content.title, content.user_id, content.date) VALUES (:title, :user_id, :date)';
            
            $values = array(':title' => $question, ':user_id' => $account->getId(), ':date' => date("Y-m-d"));
            
            try {
                $res = $pdo->prepare($query);
                $res->execute($values);
                $id = $pdo->lastInsertId();
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }  
            
            $query = 'INSERT INTO webprojectdatabase.question(question.question_id, question.description) VALUES(:question_id, :description)';
            $values = array(':question_id'=>$id, ':description'=>$description);

            try {
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw new Exception('Database query error');
            } 
        }


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ask Question</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
						

</head>
<body>
    
    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main">
        <form action="post_question.php" id="quesform" method ="post">
            <br><br>
            Enter the Question
            <input type="text" name="question">
            <br><br>
            Description <br>
            <textarea rows="5" style="width:75%;" id="ques_desc" name="ques_desc" form="quesform" placeholder="Tell us more about the question"></textarea>
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
                $query = 'SELECT question.description FROM webprojectdatabase.question WHERE question.question_id='.$id;
                $res = $pdo->prepare($query);
                $res->execute();
                $row = $res->fetch();
                echo '<div style="width:100%; dsplay:flex;">';
                echo '<div style="float:left; width:75%;">'.$row['description'].'</div>';
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