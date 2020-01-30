<?php
    $thisId = $content_id;
    $query = "SELECT interest.name FROM webprojectdatabase.interest INNER JOIN webprojectdatabase.content_interest ON interest.interest_id = content_interest.interest_id WHERE content_interest.content_id = :content_id";
    $values = array(':content_id'=>$thisId); 
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    echo '<ul class="tag">';
    while($row = $res->fetch()){
        $tag = '<li><td style="padding: 1px;"><a href="interest.php?interest='.$row['name'].'">'.$row['name'].'</a></td></li>';
        echo $tag;
    }
    echo '</ul>';
?>