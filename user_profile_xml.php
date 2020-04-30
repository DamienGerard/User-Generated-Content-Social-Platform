<?php
   
	require_once 'XML/Query2XML.php';
    
    require_once "db_inc.php";
   
	//We use the factory design pattern to instantiate the object with the proper driver
    $query2xml = XML_Query2XML::factory($pdo);
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }    
	

	$query = "SELECT user.f_name,user.l_name,user.self_description,user.DOB,user.education,user.profile_pic FROM webprojectdatabase.user WHERE user.user_id=".$id;
   
    
	
	@$dom = $query2xml->getXML(
  		$query,
  		array(
     
        'rowTag' => 'user',
    	'elements' => array(
			'f_name',
            'l_name',
            'self_description',
            'DOB',
            'education',
            'profile_pic'
		),
    ),
	);
	header('Content-Type: application/xml');
    $dom->formatOutput = true;
    print $dom->saveXML();
 
?>
