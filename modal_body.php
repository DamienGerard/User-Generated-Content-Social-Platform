<?php include 'session_login.php';?>
<?php
    $thisId = $_GET['id'];
    $subject_type = $_GET['subject_type'];
    $keyword = $_GET['keyword'];
    $query = "SELECT interest.interest_id, interest.name, interest.picture, interest.description FROM webprojectdatabase.interest WHERE interest.name LIKE '%".$keyword."%' AND interest.interest_id NOT IN(SELECT ".$subject_type."_interest.interest_id FROM webprojectdatabase.".$subject_type."_interest WHERE ".$subject_type."_interest.".$subject_type."_id = :".$subject_type."_id)";
    $values = array(':'.$subject_type.'_id'=>$thisId); 
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception($e);
    }

    while($row = $res->fetch()){
        $interest_template = '<table id="'.$row['interest_id'].'" class="generic-btn" width="100%">
                        <tr style="padding: 1px;">
                            <td rowspan="2" style="padding: 1px;">
                                <a class="anchor-list-item" href="interest.php?interest='.$row['name'].'"><img class="circle" src="'.$row['picture'].'" height="50px"></a>
                            </td>
                            <td style="padding: 1px;"><a class="anchor-list-item" href="interest.php?interest='.$row['name'].'"><strong>'.$row['name'].'</strong></a></td>
                            <td><button class="relation-button" onclick=\'handleInterest("insert","'.$subject_type.'",'.$thisId.','.$row['interest_id'].')\'>follow</button></td>
                        </tr>
                        <tr style="padding: 1px;"><td style="padding: 1px; font-size:10px;">'.$row['description'].'</td></tr>
                    </table>';
        echo $interest_template;
    }
?>