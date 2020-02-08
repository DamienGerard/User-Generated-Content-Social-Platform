<?php include 'session_login.php';?>

<?php
if(isset($_POST)){
    $content_id = $_POST['content_id'];

    $query = "SELECT * FROM webprojectdatabase.content WHERE content.content_id = :thisContent";
    $values = array(':thisContent'=>$content_id);

    try {

        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    $result = $res->fetchColumn();

    if($result>0){
 $query = "DELETE FROM webprojectdatabase.content WHERE content.content_id = :thisContent";
    $values = array(':thisContent'=>$content_id);
    try {

        $res = $pdo->prepare($query);
        $res->execute($values);
        echo 'data has been deleted';
    }catch (PDOException $e){
        echo 'Error, data not deleted';
        
    }
    }
}
?>