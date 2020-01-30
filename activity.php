<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<?php

    $query = "SELECT liked.type FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND view.user_id = :user_id";
    $values = array(':thisContent'=>$content_id, ':user_id'=>$account->getId()); 

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 

    $row = $res->fetch();
    $type = $row['type'];


    $query = "SELECT count(*) FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND liked.type='like'";
    $values = array(':thisContent'=>$content_id);  

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 
    
    $nLikes = $res->fetchColumn();

    $query = "SELECT count(*) FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND liked.type='dislike'";
    $values = array(':thisContent'=>$content_id);  

    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    } 

    $nDislikes = $res->fetchColumn();
?>

<html>
<style>
table, th, td {
  padding: 5px;
}
</style>
    <div id="likeButtons">
        <div id = "like" class="generic-btn <?php if($login && $type=='like'){ echo 'highlight';} ?>" <?php if($login){?>onclick="processLike('like')"<?php } ?>><i class="far fa-thumbs-up"></i> <?php echo $nLikes; ?></div>
        <div id = "dislike" class="generic-btn <?php if($login && $type=='dislike'){ echo 'highlight';} ?>" <?php if($login){?>onclick="processLike('dislike')"<?php } ?>><i class="far fa-thumbs-down"></i> <?php echo $nDislikes; ?></div>
            <br>
    </div>  
    <div id="post-comment">  
        <textarea name="comment" id="comment" style="width:45%; display:block" rows="1" form="getComment"></textarea>
        <button class="generic-btn create-content" <?php if($login){?>onclick="processComment()"<?php } ?>>Comment</button>
    </div>
    
    <br><br><hr><br>
    <h3>Comments</h3>
    <br>
    <div id="comment-container">
        <?php
            $query = "SELECT user.user_name, user.profile_pic, comment.date_time, comment.text FROM webprojectdatabase.comment INNER JOIN webprojectdatabase.view ON comment.comment_id = view.view_id INNER JOIN webprojectdatabase.user ON user.user_id = view.user_id WHERE view.content_id = :thisContent ORDER BY comment.date_time DESC";
            $values = array(':thisContent'=>$content_id);

            try {
                $res = $pdo->prepare($query);
                $res->execute($values);
            }catch (PDOException $e){
                throw new Exception('Database query error');
            }  
            while($row = $res->fetch()){
                echo '<div style="background-color:lightgrey; border-radius: 25px; border: 1px solid black;">';
                echo '<table>';
                echo "<tr>";
                echo "<td rowspan=\"2\"><a class=\"generic-btn anchor-list-item\" href=\"user_profile.php?user=".$row['user_name']."\"><img src=\"".$row['profile_pic']."\" alt=\"\" style='height:50px'></a></td>";
                echo '<td><a class="generic-btn anchor-list-item" href="user_profile.php?user='.$row['user_name'].'">'.$row['user_name'].'</a></td>';
                echo "<td>".$row['date_time']."</td></tr>";
                echo "<tr><td colspan='2'>".$row['text']."</td>";
                echo '</tr>';
                echo '</table>';
                echo '</div>';
                echo '<br>';
            }
        ?>
    </div>
    <?php if($login){?>
    <script>
        function processLike(type){
            var unique = new Date().getUTCMilliseconds();
            console.log('processLike.php?type='+type+'&content_id='+<?php echo $content_id; ?>+'&content_type=<?php echo $content_type; ?>&user_id='+<?php echo $user_id; ?>+'&view_id='+<?php echo $myViewId; ?>+'&unique='+unique);
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'processLike.php?type='+type+'&content_id='+<?php echo $content_id; ?>+'&content_type=<?php echo $content_type; ?>&user_id='+<?php echo $user_id; ?>+'&view_id='+<?php echo $myViewId; ?>+'&unique='+unique, true);

            xhr.onload = function(){
                document.getElementById('likeButtons').innerHTML=this.responseText;
                $("#likeButtons").load(" #likeButtons");
            }
            
            xhr.send();
        }

        function processComment(){
            var unique = new Date().getUTCMilliseconds();
            var xhr = new XMLHttpRequest();
            console.log('post_comment.php?text='+document.getElementById('comment').value+'&view_id='+<?php echo $myViewId; ?>+'&content_type=<?php echo $content_type; ?>&user_id='+<?php echo $user_id; ?>+'&unique='+unique);
            xhr.open('GET', 'post_comment.php?text='+document.getElementById('comment').value+'&view_id='+<?php echo $myViewId; ?>+'&content_type=<?php echo $content_type; ?>&user_id='+<?php echo $user_id; ?>+'&unique='+unique, true);

            xhr.onload = function(){
                $("#comment-container").load(" #comment-container");
                $("#post-comment").load(" #post-comment");
            }
            
            xhr.send();
        }
    </script>
    <?php }?>
</html>