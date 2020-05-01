<?php include 'session_login.php';?>
<?php
    $thisId = $_GET['id'];
    $subject_type = $_GET['subject_type'];

    $xml = new DOMDocument();
    $xml_interests = $xml->createElement("Interests");

    $query = "SELECT interest.interest_id, interest.name, interest.picture, interest.description FROM webprojectdatabase.interest INNER JOIN webprojectdatabase.".$subject_type."_interest ON interest.interest_id = ".$subject_type."_interest.interest_id WHERE ".$subject_type."_interest.".$subject_type."_id = :".$subject_type."_id";
    $values = array(':'.$subject_type.'_id'=>$thisId); 
    
    try {
        $res = $pdo->prepare($query);
        $res->execute($values);
    }catch (PDOException $e){
        throw new Exception('Database query error');
    }

    while($row = $res->fetch()){
        $xml_interest = $xml->createElement("Interest");
        $xml_interest->setAttribute("interest_id", $row['interest_id']);
        $xml_interest_name = $xml->createElement("name",$row['name']);
        $xml_interest_picture = $xml->createElement("picture",$row['picture']);
        $xml_interest_description = $xml->createElement("description",$row['description']);

        $xml_interest->appendChild($xml_interest_name);
        $xml_interest->appendChild($xml_interest_picture);
        $xml_interest->appendChild($xml_interest_description);

        $xml_interests->appendChild($xml_interest);
    }
    $xml->appendChild($xml_interests);

    if($xml->schemaValidate('interest_tab_content_schema.xsd')){
        header('Content-Type: application/xml');
        echo $xml->saveXML();
    }
    
?>