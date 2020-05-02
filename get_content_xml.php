<?php 
    include 'session_login.php';
    include 'admin/admin_session_login.php';

    $xml = new DOMDocument();

    $xml_contents = $xml->createElement("Contents");

    if(isset($_GET["article"])){
        $resArticle = $pdo->prepare($_GET["article"]);
        $resArticle->execute();
        while($rowArticle = $resArticle->fetch()){
            $xml_content = $xml->createElement("Content");
            $xml_content->setAttribute("content_id", $rowArticle['content_id']);
            $xml_content->setAttribute("type", "ARTICLE");
            $xml_title = $xml->createElement("title", $rowArticle['title']);
            $xml_user_name = $xml->createElement("user_name", $rowArticle['user_name']);
            $xml_profile_pic = $xml->createElement("profile_pic", $rowArticle['profile_pic']);
            $xml_f_name = $xml->createElement("f_name", $rowArticle['f_name']);
            $xml_l_name = $xml->createElement("l_name", $rowArticle['l_name']);
            $xml_date = $xml->createElement("date", $rowArticle['date']);
            $xml_data = $xml->createElement("data");
            $xml_data->appendChild($xml->createCDATASection($rowArticle['text']));

            $xml_content->appendChild($xml_title);
            $xml_content->appendChild($xml_user_name);
            $xml_content->appendChild($xml_profile_pic);
            $xml_content->appendChild($xml_f_name);
            $xml_content->appendChild($xml_l_name);
            $xml_content->appendChild($xml_date);
            $xml_content->appendChild($xml_data);

            $xml_contents->appendChild($xml_content);
        }
    }

    if(isset($_GET["image"])){
        $resImage = $pdo->prepare($_GET["image"]);
        $resImage->execute();
        while($rowImage = $resImage->fetch()){
            $xml_content = $xml->createElement("Content");
            $xml_content->setAttribute("content_id", $rowImage['content_id']);
            $xml_content->setAttribute("type", "IMAGE");
            $xml_title = $xml->createElement("title", $rowImage['title']);
            $xml_user_name = $xml->createElement("user_name", $rowImage['user_name']);
            $xml_profile_pic = $xml->createElement("profile_pic", $rowImage['profile_pic']);
            $xml_f_name = $xml->createElement("f_name", $rowImage['f_name']);
            $xml_l_name = $xml->createElement("l_name", $rowImage['l_name']);
            $xml_date = $xml->createElement("date", $rowImage['date']);
            $xml_data = $xml->createElement("data", $rowImage['picture_path']);

            $xml_content->appendChild($xml_title);
            $xml_content->appendChild($xml_user_name);
            $xml_content->appendChild($xml_profile_pic);
            $xml_content->appendChild($xml_f_name);
            $xml_content->appendChild($xml_l_name);
            $xml_content->appendChild($xml_date);
            $xml_content->appendChild($xml_data);

            $xml_contents->appendChild($xml_content);
        }
    }


    if(isset($_GET["video"])){
        $resVideo = $pdo->prepare($_GET["video"]);
        $resVideo->execute();
        while($rowVideo = $resVideo->fetch()){
            $xml_content = $xml->createElement("Content");
            $xml_content->setAttribute("content_id", $rowVideo['content_id']);
            $xml_content->setAttribute("type", "VIDEO");
            $xml_title = $xml->createElement("title", $rowVideo['title']);
            $xml_user_name = $xml->createElement("user_name", $rowVideo['user_name']);
            $xml_profile_pic = $xml->createElement("profile_pic", $rowVideo['profile_pic']);
            $xml_f_name = $xml->createElement("f_name", $rowVideo['f_name']);
            $xml_l_name = $xml->createElement("l_name", $rowVideo['l_name']);
            $xml_date = $xml->createElement("date", $rowVideo['date']);
            $xml_data = $xml->createElement("data", $rowVideo['thumbnail_path']);

            $xml_content->appendChild($xml_title);
            $xml_content->appendChild($xml_user_name);
            $xml_content->appendChild($xml_profile_pic);
            $xml_content->appendChild($xml_f_name);
            $xml_content->appendChild($xml_l_name);
            $xml_content->appendChild($xml_date);
            $xml_content->appendChild($xml_data);

            $xml_contents->appendChild($xml_content);
        }
    }


    if(isset($_GET["question"])){
        $resQuestion = $pdo->prepare($_GET["question"]);
        $resQuestion->execute();
        while($rowQuestion = $resQuestion->fetch()){
            $xml_content = $xml->createElement("Content");
            $xml_content->setAttribute("content_id", $rowQuestion['content_id']);
            $xml_content->setAttribute("type", "QUESTION");
            $xml_title = $xml->createElement("title", $rowQuestion['title']);
            $xml_user_name = $xml->createElement("user_name", $rowQuestion['user_name']);
            $xml_profile_pic = $xml->createElement("profile_pic", $rowQuestion['profile_pic']);
            $xml_f_name = $xml->createElement("f_name", $rowQuestion['f_name']);
            $xml_l_name = $xml->createElement("l_name", $rowQuestion['l_name']);
            $xml_date = $xml->createElement("date", $rowQuestion['date']);
            $xml_data = $xml->createElement("data", $rowQuestion['description']);

            $xml_content->appendChild($xml_title);
            $xml_content->appendChild($xml_user_name);
            $xml_content->appendChild($xml_profile_pic);
            $xml_content->appendChild($xml_f_name);
            $xml_content->appendChild($xml_l_name);
            $xml_content->appendChild($xml_date);
            $xml_content->appendChild($xml_data);

            $xml_contents->appendChild($xml_content);
        }
    }

   
    $xml->appendChild($xml_contents);
    if($xml->schemaValidate('contents.xsd')){
        header( "content-type: application/xml" );
        echo  $xml->saveXML();
    }

?>