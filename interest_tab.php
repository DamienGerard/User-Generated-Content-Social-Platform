<html>
    <div class="interest-tab">
        <h3 style="text-align:center;">Interest</h4><hr style="border-color: black;">
        <div id="interest-tab-content" class="interest-tab-content">
            <?php
            $url = file_get_contents('http://localhost/UniWebProject/interest_tab_xml.php?id='.$id);
            
            $dom = new DOMDocument;
            $dom->preserveWhiteSpace = FALSE;
            @$dom->load($url);
           /* if($dom->schemaValidate('interest_tab.xsd')){
                echo 'document is valid';
                echo '<br>';
            }
            else{
                echo 'document is not valid';
            }*/
            $interest_nodes = $dom->getElementsByTagName('interest');
            

                foreach($interest_nodes as $interest_node){
                    $interest_id = $interest_node->getElementsByTagName('interest_id')[0]->nodeValue;
                    $interest_name = $interest_node->getElementByTagName('name')[0]->nodeValue;
                    $interest_picture = $interest_node->getElementsByTagName('picture')[0]->nodeValue;
                    $interest_description = $interest_node->getElementsByTagName('description')[0]->nodeValue;

                    $interest_template = '<table id="'.$row['interest_id'].'" class="generic-btn" width="100%">
                                    <tr style="padding: 1px;">
                                        <td rowspan="2" style="padding: 1px;">
                                            <a class="anchor-list-item" href="interest.php?interest='.$interest_name.'"><img class="circle" src="'.$interest_picture.'" height="50px"></a>
                                        </td>
                                        <td style="padding: 1px;" width="75%"><a class="anchor-list-item" href="interest.php?interest='.$interest_name.'"><strong>'.$interest_name.'</strong></a></td>';

                                        if($login && $thisId==$id){
                                            $interest_template =  $interest_template.'<td><button class="close" width="5%" onclick=\'handleInterest("delete","'.$subject_type.'",'.$thisId.','.$interest_id.')\'>&times;</button></td>';
                                        }
                                        

                                    $interest_template =  $interest_template.'</tr>
                                    <tr style="padding: 1px;"><td style="padding: 1px; font-size:10px;">'.$interest_description.'</td></tr>
                                </table>';
                    echo $interest_template;
                }
            ?>
            <script>
            function handleInterest(action, subjectType, subjectId, interestId){
                var unique = new Date().getUTCMilliseconds();
                var xhr = new XMLHttpRequest();
                console.log('handle_interest.php?action='+action+'&subject_type='+subjectType+'&subject_id='+subjectId+'&interest_id='+interestId+'&unique='+unique);
                xhr.open('GET', 'handle_interest.php?action='+action+'&subject_type='+subjectType+'&subject_id='+subjectId+'&interest_id='+interestId+'&unique='+unique, true);

                xhr.onload = function(){
                    document.getElementById(interestId).style.display = "none";
                    var xhr1 = new XMLHttpRequest();
                    xhr1.open('GET', 'modal_body.php?id=<?php echo $thisId; ?>'+'&keyword='+document.getElementById("interest-search").value+'&subject_type='+subjectType, true);
                    xhr1.onload = function(){
                        document.getElementById('modal-body').innerHTML=this.responseText;
                    }
                    xhr1.send();
                    
                    var xhr2 = new XMLHttpRequest();
                    xhr2.open('GET', 'interest_tab_content.php?id=<?php echo $thisId; ?>'+'&subject_type='+subjectType, true);
                    xhr2.onload = function(){
                        document.getElementById('interest-tab-content').innerHTML=this.responseText;
                    }
                    xhr2.send();
                }
                
                xhr.send();
            }
            </script>
            
        </div>
        <!-- Trigger the modal with a button -->
        <?php if($login && $thisId==$id){ ?><div style="text-align:center; margin-bottom: 5px;"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Interest</button></div><?php } ?>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Interests</h4>
                        <div class="modal-body" stlye="width: 100%;">
                            <input id="interest-search" type="text" placeholder="Search" name="Search-query" autocomplete="off" size="35">
                            <button class="search-button" style="width: 5em;" onclick="searchInterest()"><i class="fa fa-search"></i></button>
                            <script>
                                function searchInterest(){
                                    var unique = new Date().getUTCMilliseconds();
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('GET', 'search_interest.php?keyword='+document.getElementById("interest-search").value+'&subject_id=<?php echo $thisId;?>'+'&subject_type=<?php echo $subject_type;?>&unique='+unique, true);

                                    xhr.onload = function(){
                                        document.getElementById('modal-body').innerHTML=this.responseText;
                                    }
                                    
                                    xhr.send();
                                }

                                function addInterestForm(){
                                    document.getElementById('modal-body').innerHTML='<form id="addInterestForm">Name: <input type="text" name="interestName" placeholder="name of interest..."><br>Description: <textarea name="interestDescription" id="" cols="15" rows="2"></textarea><br>Picture: <input type="file" name="fileToUpload"><div style="text-align:center; margin-bottom: 5px;"><button type="button" class="btn btn-info btn-lg" onclick="addInterest()">Create Interest</button></div></form>';
                                }

                                function addInterest(){
                                    let myForm = document.getElementById('addInterestForm');
                                    let formData = new FormData(myForm);
                                    var unique = new Date().getUTCMilliseconds();
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', 'add_interest.php', true);

                                    xhr.onload = function(){
                                        document.getElementById('modal-body').innerHTML=this.responseText;
                                    }
                                    
                                    if(formData.get('interestName')!=null && formData.get('interestDescription')!=null && formData.get('fileToUpload')!=null){
                                        console.log('interestName: '+formData.get('interestName'));
                                        console.log('interestDescription: '+formData.get('interestDescription'));
                                        console.log('fileToUpload: '+formData.get('fileToUpload'));
                                        xhr.send(formData);
                                    }
                                }

                            </script>
                        </div>
                    </div>
                    <div id="modal-body" class="modal-body">
                        <?php
                            $query = "SELECT interest.interest_id, interest.name, interest.picture, interest.description FROM webprojectdatabase.interest WHERE interest.interest_id NOT IN(SELECT ".$subject_type."_interest.interest_id FROM webprojectdatabase.".$subject_type."_interest WHERE ".$subject_type."_interest.".$subject_type."_id = :".$subject_type."_id)";
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
                    </div>
                </div>
            
            </div>
        </div>
    </div> 
</html>