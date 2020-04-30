<?php include 'session_login.php';?>

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
        <div class="tabinator">
                <!-- <h2>CSS tabs with shadow</h2> -->
                <input type="radio" id="tab1" name="tabs" checked>
                <label for="tab1">Articles</label>
                <input type="radio" id="tab2" name="tabs">
                <label for="tab2">Images</label>
                <input type="radio" id="tab3" name="tabs">
                <label for="tab3">Videos</label>
                <input type="radio" id="tab4" name="tabs">
                <label for="tab4">Questions</label>
                <div id="content1">
                    <?php
                        $query = "SELECT * FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id INNER JOIN webprojectdatabase.content ON view.content_id = content.content_id INNER JOIN webprojectdatabase.article ON content.content_id = article.article_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE view.user_id = :thisId AND liked.type = 'like' ORDER BY view.date DESC";
                        $values = array(':thisId' => $account->getId());
                        $res = $pdo->prepare($query);
                        $res->execute($values);
                        while($row = $res->fetch()){
                            echo '<div style="background-color:lightgrey; border-radius: 5px; border: 3px solid black; height:200px; overflow:hidden">';
                            echo '<table>';
                            echo '<tr>';
                            echo '<td colspan="2">'."<a class=\"generic-btn anchor-list-item\" href='article.php?content_id=".$row['content_id']."'>".$row['title']."</a>".'</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td rowspan="2"><a href="user_profile.php?'.$row['user_name'].'" class="generic-btn"><img src="'.$row['profile_pic'].'" alt="" style="height:50px"></a></td>';
                            echo '<td><a class="generic-btn anchor-list-item" href="user_profile.php?user='.$row['user_name'].'"><p>'.$row['f_name'].' '.$row['l_name'].'</p></a></td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo "<td>".$row['date']."</td>";
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td colspan="2">'.'<a class="anchor-list-item" href="answer.php?content_id='.$row['article_id'].'"><p>'.$row['text'].'</p></a>'.'</td>';
                            echo '</tr>';
                            echo '</table>';
                            echo '</div>';
                            echo '<br><br>';
                        }
                    ?>
                </div>
                <div id="content2">
                    <?php
                        $query = "SELECT * FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id INNER JOIN webprojectdatabase.content ON view.content_id = content.content_id INNER JOIN webprojectdatabase.picture ON content.content_id = picture.picture_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE view.user_id = :thisId AND liked.type = 'like' ORDER BY view.date DESC";
                        $values = array(':thisId' => $account->getId());
                        $res = $pdo->prepare($query);
                        $res->execute($values);
                        while($row = $res->fetch()){
                            echo '<div style="background-color:lightgrey; border-radius: 5px; border: 3px solid black; height:200px; overflow:hidden">';
                            echo '<table>';
                            echo '<tr>';
                            echo '<td colspan="2">'."<a class=\"generic-btn anchor-list-item\" href='picture.php?content_id=".$row['content_id']."'>".$row['title']."</a>".'</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td rowspan="2"><a href="user_profile.php?'.$row['user_name'].'" class="generic-btn"><img src="'.$row['profile_pic'].'" alt="" style="height:50px"></a></td>';
                            echo '<td><a class="generic-btn anchor-list-item" href="user_profile.php?user='.$row['user_name'].'"><p>'.$row['f_name'].' '.$row['l_name'].'</p></a></td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo "<td>".$row['date']."</td>";
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td colspan="2">'.'<a class="anchor-list-item" href="answer.php?content_id='.$row['picture_id'].'"><img src="'.$row['picture_path'].'" alt=""></a>'.'</td>';
                            echo '</tr>';
                            echo '</table>';
                            echo '</div>';
                            echo '<br><br>';
                        }
                    ?>
                </div>
                <div id="content3">
                    <?php
                        $query = "SELECT * FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id INNER JOIN webprojectdatabase.content ON view.content_id = content.content_id INNER JOIN webprojectdatabase.video ON content.content_id = video.video_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE view.user_id = :thisId AND liked.type = 'like' ORDER BY view.date DESC";
                        $values = array(':thisId' => $account->getId());
                        $res = $pdo->prepare($query);
                        $res->execute($values);
                        while($row = $res->fetch()){
                            echo '<div style="background-color:lightgrey; border-radius: 5px; border: 3px solid black; height:350px; overflow:hidden">';
                            echo '<table>';
                            echo '<tr>';
                            echo '<td colspan="2">'."<a class=\"generic-btn anchor-list-item\" href='video.php?content_id=".$row['content_id']."'>".$row['title']."</a>".'</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td rowspan="2"><a href="user_profile.php?'.$row['user_name'].'" class="generic-btn"><img src="'.$row['profile_pic'].'" alt="" style="height:50px"></a></td>';
                            echo '<td><a class="generic-btn anchor-list-item" href="user_profile.php?user='.$row['user_name'].'"><p>'.$row['f_name'].' '.$row['l_name'].'</p></a></td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo "<td>".$row['date']."</td>";
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td colspan="2"><a class="generic-btn anchor-list-item" href="video.php?content_id='.$row['content_id'].'"><img src="'.$row['thumbnail_path'].'" alt="" ></a></td>';
                            echo '</tr>';
                            echo '</table>';
                            echo '</div>';
                            echo '<br><br>';
                        }
                    ?>
                </div>
                <div id="content4">
                    <?php
                        $query = "SELECT * FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id INNER JOIN webprojectdatabase.content ON view.content_id = content.content_id INNER JOIN webprojectdatabase.question ON content.content_id = question.question_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE view.user_id = :thisId AND liked.type = 'like' ORDER BY view.date DESC";
                        $values = array(':thisId' => $account->getId());
                        $res = $pdo->prepare($query);
                        $res->execute($values);
                        while($row = $res->fetch()){
                            echo '<div style="background-color:lightgrey; border-radius: 5px; border: 3px solid black; height:200px; overflow:hidden">';
                            echo '<table>';
                            echo '<tr>';
                            echo '<td colspan="2">'."<a class=\"generic-btn anchor-list-item\" href='question.php?content_id=".$row['content_id']."'>".$row['title']."</a>".'</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td rowspan="2"><a href="user_profile.php?'.$row['user_name'].'" class="generic-btn"><img src="'.$row['profile_pic'].'" alt="" style="height:50px"></a></td>';
                            echo '<td><a class="generic-btn anchor-list-item" href="user_profile.php?user='.$row['user_name'].'"><p>'.$row['f_name'].' '.$row['l_name'].'</p></a></td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo "<td>".$row['date']."</td>";
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td colspan="2">'.'<a class="anchor-list-item" href="answer.php?content_id='.$row['question_id'].'"><p>'.$row['description'].'</p></a>'.'</td>';
                            echo '</tr>';
                            echo '</table>';
                            echo '</div>';
                            echo '<br><br>';
                        }
                    ?>
                </div>
            </div>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>