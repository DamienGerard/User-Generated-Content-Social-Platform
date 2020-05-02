<?php

//Adapted from https://phppot.com/php/php-restful-web-service/
require_once("contentRestHandler.php");
$method = $_SERVER['REQUEST_METHOD'];
$view = "";

if(isset($_GET["resource"]))
	$resource = $_GET["resource"];
if(isset($_GET["page_key"]))
	$page_key = $_GET["page_key"];
/*
controls the RESTful services
URL mapping
*/


switch($resource){
	case "content":	
		switch($page_key){

            case "like":
                //var_dump($_GET);
                $contentRestHandler = new ContentRestHandler();
                $result = $contentRestHandler->like();
			break;

            case "comment":
                $contentRestHandler = new ContentRestHandler();
                $result = $contentRestHandler->comment();
			break;	
            
            default:	
                echo "Invalid request<br>";
            break;
		}
    break;
    	
	default:	
	    echo "Invalid request<br>";
	break;
}	
?>
