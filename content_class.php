<?php
require_once("dbcontroller.php");
include 'session_login.php';

use Opis\JsonSchema\{
	Validator, ValidationResult, ValidationError, Schema
};

require 'vendor/autoload.php';
/* 
A domain Class to demonstrate RESTful web services
*/
Class Content {
	public function like(){
		unset($_GET["resource"]);
		unset($_GET["page_key"]);
		$like_data = json_decode(json_encode($_GET));
		$like_schema = Schema::fromJsonString(file_get_contents('like_schema.json'));
		$like_validator = new Validator();
		
		/** @var ValidationResult $result */
		$result = $like_validator->schemaValidation($like_data, $like_schema);
		
		if($result->isValid()){
			$type = $like_data->type;
			$content_id = $like_data->content_id;
			$content_type = $like_data->content_type;
			$user_id = $like_data->user_id;
			$liker_id = $like_data->liker_id;
			$thisViewId = $like_data->view_id;

			$prevType = "";

			$dbcontroller = new DBController();
		
			$query = "SELECT liked.like_id , liked.type FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND view.user_id = :user_id";
			$values = array(':thisContent'=>$content_id, ':user_id'=>$liker_id); 
		
			$dbcontroller->conn->beginTransaction();
			$row = $dbcontroller->executeSelectQuery_data($query, $values)->fetch();
			$like_id = $row['like_id'];
			$prevType = $row['type'];
		
			if($like_id > 0){
				$query = "DELETE FROM webprojectdatabase.notification WHERE notification.event_type = 'like_".$content_type."' AND notification.cause_id = :cause_id AND notification.user_id = :user_id";
				$values = array(':cause_id'=>$liker_id, ':user_id'=>$user_id);   
				$res = $dbcontroller->executeQuery($query, $values);
		
				$query = "DELETE FROM webprojectdatabase.liked WHERE liked.like_id = :like_id";
				$values = array(':like_id'=>$like_id); 
				
				$res = $dbcontroller->executeQuery($query, $values);   
			}
			
			if($prevType != $type){
				$query = "INSERT INTO webprojectdatabase.liked(liked.like_id, liked.type) VALUES(:like_id, :type) ON DUPLICATE KEY UPDATE type=:type";
				$values = array('like_id'=>$thisViewId, ':type'=>$type);  
		
				$res = $dbcontroller->executeQuery($query, $values);   
				
				$query = "INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES(:event_id, :event_type, :cause_id, :cause_type, :date, :user_id, :seen)";
				$values = array(':event_id'=>$thisViewId, ':event_type'=>'like_'.$content_type, ':cause_id'=>$liker_id, ':cause_type'=>'user', ':date'=>date("Y-m-d"), ':user_id'=>$user_id, ':seen'=>0);  
		
				$res = $dbcontroller->executeQuery($query, $values);
			}
			
			$query = "SELECT count(*) FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND liked.type='like'";
			$values = array(':thisContent'=>$content_id);  
		
			$nLikes = $dbcontroller->executeSelectQuery_data($query, $values)->fetchColumn();
		
			$query = "SELECT count(*) FROM webprojectdatabase.liked INNER JOIN webprojectdatabase.view ON liked.like_id = view.view_id WHERE view.content_id = :thisContent AND liked.type='dislike'";
			$values = array(':thisContent'=>$content_id);  
		
			$nDislikes = $dbcontroller->executeSelectQuery_data($query, $values)->fetchColumn();
		
			$dbcontroller->conn->commit();
		
			$updated_like_data = array();
			$updated_like_data["like_count"] = $nLikes;
			$updated_like_data["dislike_count"] = $nDislikes;
		
			$toggle_like = false;
			$toggle_dislike = false;
			if($type=='like' ||  ($type=='dislike' && $prevType=='like')){
				$toggle_like = true;
			}
		
			if($type=='dislike' ||  ($type=='like' && $prevType=='dislike')){
				$toggle_dislike = true;
			}
		
			$updated_like_data["toggle_like"] = $toggle_like;
			$updated_like_data["toggle_dislike"] = $toggle_dislike;
			
			return $updated_like_data;
		}
		
		
	}

	public function comment(){
		unset($_GET["resource"]);
		unset($_GET["page_key"]);
		$comment_data = json_decode(json_encode($_GET));
		$comment_schema = Schema::fromJsonString(file_get_contents('comment_schema.json'));
		$comment_validator = new Validator();
		
		/** @var ValidationResult $result */
		$result = $comment_validator->schemaValidation($comment_data, $comment_schema);
		
		if($result->isValid()){
			
			$text = $comment_data->text;
			$thisViewId = $comment_data->view_id;
			$content_type = $comment_data->content_type;
			$user_id = $comment_data->user_id;
			$commenter_id = $comment_data->commenter_id;

			if($text != ''){
				$query = "INSERT INTO webprojectdatabase.comment(comment.comment_id, comment.text, comment.date_time) VALUES(:comment_id, :text, :date_time)";
				$values = array(':comment_id'=>$thisViewId, ':text'=>$text, ':date_time'=>date('Y-m-d H:i:s'));

				$dbcontroller = new DBController();
		  
				
				$dbcontroller->conn->beginTransaction();
		
				$res = $dbcontroller->executeQuery($query, $values); 
				
				$query = "INSERT INTO webprojectdatabase.notification(notification.event_id, notification.event_type, notification.cause_id, notification.cause_type, notification.date, notification.user_id, notification.seen) VALUES(:event_id, :event_type, :cause_id, :cause_type, :date, :user_id, :seen)";
				$values = array(':event_id'=>$thisViewId, ':event_type'=>'comment_'.$content_type, ':cause_id'=>$commenter_id, ':cause_type'=>'user', ':date'=>date("Y-m-d"), ':user_id'=>$user_id, ':seen'=>0); 
		
				$res =$res+$dbcontroller->executeQuery($query, $values); 
				$dbcontroller->conn->commit();
				return array("status"=>1);
			}
		}
	}
}
?>