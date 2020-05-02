<?php
require_once("SimpleRest.php");
require_once("content_class.php");

use Opis\JsonSchema\{
	Validator, ValidationResult, ValidationError, Schema
};

require 'vendor/autoload.php';

class ContentRestHandler extends SimpleRest {

    function like(){	

		$content = new Content();
        $updated_like_data = $content->like();
		if(empty($updated_like_data)) {
			$statusCode = 404;
			$updated_like_data = array('success' => 0);		
		} else {
			$statusCode = 200;
		}

		//var_dump($rawData);
		
        $requestContentType = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : null;

		$this->setHttpHeaders($requestContentType, $statusCode);
        	
		if(strpos($requestContentType,'json') !== false){
            $update_like_schema = Schema::fromJsonString(file_get_contents('update_like_schema.json'));
            $update_like_validator = new Validator();
            
            /** @var ValidationResult $result */
            $update_result = $update_like_validator->schemaValidation(json_decode(json_encode($updated_like_data)), $update_like_schema);
        
            if($update_result->isValid()){
                echo json_encode($updated_like_data);
            }
		}
    } 

    function comment(){
		$content = new Content();
        $result = $content->comment();
		if(empty($result)) {
			$statusCode = 404;
			$result = array('success' => 0);		
		} else {
			$statusCode = 200;
		}
		
		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		if(strpos($requestContentType,'application/json') !== false){
			echo json_encode($result);
		}
        
    } 
}
?>