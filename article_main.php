<?php include 'session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>

<script>

var user_id = <?php echo $account->getId(); ?>

$(document).ready(function(){
    $("button.reportContent").click(function(){
        var content_id = $(this).attr('id');
        $.ajax({
            url:"processReport.php",
            data:{content_id: content_id,user_id: user_id},
            cache: false,
            method: "POST",
            success: function(result){
                $("div#abcd").html(result);
            }
        })

    });
});

</script>

</head>
<body>
    
<?php 

        include 'navbar.php';


    ?>
  

    <div class="super-main">

    <?php 

            include 'side_column.php';


        ?>
    
        <div class="main">
            
            <div class="generic-btn " style="display:block; width:75px"><a href="article_main.php" class="anchor-list-item"> <h3>Articles</h3> </a></div>
          
            <?php
            
            echo '<div id="abcd"></div>';
                $query = 'SELECT * FROM webprojectdatabase.article INNER JOIN webprojectdatabase.content ON content.content_id = article.article_id INNER JOIN webprojectdatabase.user ON user.user_id = content.user_id WHERE content.marked=0 ORDER BY content.date DESC ';
                $res = $pdo->prepare($query);
                $res->execute();
                while($row = $res->fetch()){
                    echo '<div style="background-color:lightgrey;  border-radius: 5px; border: 3px solid black; height:200px; overflow-y:scroll" class="articleDisplayed" id="'.$row['content_id'].'">';
                    echo '<table>';
                    echo '<tr>';
                    echo '<td colspan="2">'."<a class=\"generic-btn anchor-list-item\" href='article.php?content_id=".$row['content_id']."'>".$row['title']."</a>".$row['content_id'].'<button class="reportContent" type="button" id="'.$row['content_id'].'" style="float:right; border-radius:20px;font-size:15px;">x</button>'.'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td rowspan="2"><a href="user_profile.php?user='.$row['user_name'].'" class="generic-btn"><img src="'.$row['profile_pic'].'" alt="" style="height:50px"></a></td>';
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
    </div>


    <?php include 'footer.php';?>
</body>
</html>