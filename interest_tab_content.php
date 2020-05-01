<?php include 'session_login.php';?>
<?php
    $thisId = $_GET["thisId"];
    $subject_type = $_GET["subject_type"];

     $url = 'http://localhost/UniWebProject/interest_tab_xml.php?id='.$id;
     $xmlstr = file_get_contents($url);
     $dom = new DOMDocument;
     $dom->preserveWhiteSpace = FALSE;
     $dom->loadXML($xmlstr);
   
     
     if($dom->schemaValidate('interest_tab.xsd')){
     $interest_nodes = $dom->getElementsByTagName('interest');
     

         foreach($interest_nodes as $interest_node){
             $interest_id = $interest_node->getElementsByTagName('interest_id')[0]->nodeValue;
             $interest_name = $interest_node->getElementsByTagName('name')[0]->nodeValue;
             $interest_picture = $interest_node->getElementsByTagName('picture')[0]->nodeValue;
             $interest_description = $interest_node->getElementsByTagName('description')[0]->nodeValue;

             $interest_template = '<table id="'.$interest_id.'" class="generic-btn" width="100%">
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
        }
        else{
            echo "document is not valid";
        }
    
?>