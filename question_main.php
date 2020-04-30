<?php include 'session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Questions</title>
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
        <div class="generic-btn" style="display:block; width:115px; margin-bottom: 5px;"><a href="question_main.php" class="anchor-list-item"> <h3 style="margin: 0; padding: 0;">Questions</h3> </a></div>
            <?php
                $query = 'SELECT * FROM webprojectdatabase.question INNER JOIN webprojectdatabase.content ON content.content_id = question.question_id INNER JOIN webprojectdatabase.user ON user.user_id = content.user_id ORDER BY content.date DESC';
                $res = $pdo->prepare($query);
                $res->execute();
                while($row = $res->fetch()){
                    echo '<div style="background-color:lightgrey; border-radius: 5px; border: 3px solid black; height:200px; overflow:hidden">';
                    echo '<table>';
                    echo '<tr>';
                    echo '<td colspan="2">'."<a class=\"generic-btn anchor-list-item\" href='question.php?content_id=".$row['content_id']."'>".$row['title']."</a>".'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td rowspan="2"><a href="user_profile.php?user='.$row['user_name'].'" class="generic-btn"><img src="'.$row['profile_pic'].'" alt="" style="height:50px"></a></td>';
                    echo '<td><a class="generic-btn anchor-list-item" href="user_profile.php?user='.$row['user_name'].'"><p style="margin: 0px;">'.$row['f_name'].' '.$row['l_name'].'</p></a></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo "<td>".$row['date']."</td>";
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td colspan="2">'.'<p>'.$row['description'].'</p>'.'</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '<br><br>';
                }
            ?>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>