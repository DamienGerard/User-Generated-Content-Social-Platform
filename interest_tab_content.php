<?php include 'session_login.php';?>
<?php
    $thisId = $_GET['id'];
    $subject_type = $_GET['subject_type'];
    $query = "SELECT interest.interest_id, interest.name, interest.picture, interest.description FROM webprojectdatabase.interest INNER JOIN webprojectdatabase.".$subject_type."_interest ON interest.interest_id = ".$subject_type."_interest.interest_id WHERE ".$subject_type."_interest.".$subject_type."_id = :".$subject_type."_id";
    $values = array(':'.$subject_type.'_id'=>$thisId); 
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    while($row = $res->fetch()){
        $interest_template = '<table id="'.$row['interest_id'].'" class="generic-btn" width="100%">
                        <tr style="padding: 1px;">
                            <td rowspan="2" style="padding: 1px;">
                                <a class="anchor-list-item" href="interest.php?interest='.$row['name'].'"><img class="circle" src="'.$row['picture'].'" height="50px"></a>
                            </td>
                            <td style="padding: 1px;" width="75%"><a class="anchor-list-item" href="interest.php?interest='.$row['name'].'"><strong>'.$row['name'].'</strong></a></td>
                            <td><button class="close" width="5%" onclick=\'handleInterest("delete","'.$subject_type.'",'.$thisId.','.$row['interest_id'].')\'>&times;</button></td>
                        </tr>
                        <tr style="padding: 1px;"><td style="padding: 1px; font-size:10px;">'.$row['description'].'</td></tr>
                    </table>';
        echo $interest_template;
    }
?>