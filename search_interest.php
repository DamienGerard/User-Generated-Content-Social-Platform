<?php include 'session_login.php';?>
<?php
    $thisId = $_GET['subject_id'];
    $keyword = $_GET['keyword'];
    $type = $_GET['subject_type'];

    $query = "SELECT interest.interest_id, interest.name, interest.picture, interest.description FROM webprojectdatabase.interest WHERE interest.name LIKE '%".$keyword."%' AND interest.interest_id NOT IN(SELECT ".$type."_interest.interest_id FROM webprojectdatabase.".$type."_interest WHERE ".$type."_interest.".$type."_id = :".$type."_id)";
    $values = array(':'.$type.'_id'=>$thisId); 
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception($e);
    }

    if($row = $res->fetch()){
        do{
            $interest_template = '<table id="'.$row['interest_id'].'" class="generic-btn" width="100%">
                            <tr style="padding: 1px;">
                                <td rowspan="2" style="padding: 1px;">
                                    <a class="anchor-list-item" href="interest.php?interest='.$row['name'].'"><img class="circle" src="'.$row['picture'].'" height="50px"></a>
                                </td>
                                <td style="padding: 1px;"><a class="anchor-list-item" href="interest.php?interest='.$row['name'].'"><strong>'.$row['name'].'</strong></a></td>
                                <td><button class="relation-button" onclick=\'handleInterest("insert","'.$type.'",'.$thisId.','.$row['interest_id'].')\'>follow</button></td>
                            </tr>
                            <tr style="padding: 1px;"><td style="padding: 1px; font-size:10px;">'.$row['description'].'</td></tr>
                        </table>';
            echo $interest_template;
        }while($row = $res->fetch());
    }else{
        echo '<div style="text-align:center; margin-bottom: 5px;"><button type="button" class="btn btn-info btn-lg" onclick="addInterestForm()">Create Interest</button></div>';
    }
?>