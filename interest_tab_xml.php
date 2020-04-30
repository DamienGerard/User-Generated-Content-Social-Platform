<?php
   
	require_once 'XML/Query2XML.php';
    
    require_once "db_inc.php";
   
	//We use the factory design pattern to instantiate the object with the proper driver
    $query2xml = XML_Query2XML::factory($pdo);
    if(isset($_GET["id"])){
		$id = $_GET["id"];
	}

	$query = "SELECT interest.interest_id, interest.name, interest.picture, interest.description FROM webprojectdatabase.interest INNER JOIN webprojectdatabase.user_interest ON interest.interest_id = user_interest.interest_id WHERE user_interest.user_id =".$id;
   
    
	
	@$dom = $query2xml->getXML(
  		$query,
  		array(
    	'rootTag' => 'interests',
    	'idColumn' => 'interest_id',
        'rowTag' => 'interest',
    	'elements' => array(
			'interest_id',
            'name',
            'picture',
        	'description'
		),
 	    )
	);
	header('Content-Type: application/xml');
    $dom->formatOutput = true;
    print $dom->saveXML();
 
?>
