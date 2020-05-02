<?php 
    include 'session_login.php';
    include 'admin/admin_session_login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <script>$('html').css('overflow', 'sroll');</script> 
</head>
<body>
    
    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main" style="width:55%;">
            <?php
                $queryArticle = 'SELECT * FROM webprojectdatabase.content INNER JOIN webprojectdatabase.article ON content.content_id = article.article_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 ORDER BY content.date DESC';

                $queryImage =  'SELECT * FROM webprojectdatabase.content INNER JOIN webprojectdatabase.picture ON content.content_id = picture.picture_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 ORDER BY content.date DESC';

                $queryVideo = 'SELECT * FROM webprojectdatabase.content INNER JOIN webprojectdatabase.video ON content.content_id = video.video_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 ORDER BY content.date DESC';

                $queryQuestion = 'SELECT * FROM webprojectdatabase.content INNER JOIN webprojectdatabase.question ON content.content_id = question.question_id INNER JOIN webprojectdatabase.user ON content.user_id = user.user_id WHERE content.marked=0 ORDER BY content.date DESC';
            ?>
            <div class="generic-btn" style="display:block; width:85px"><a href="article_main.php" class="anchor-list-item"> <h3>Articles</h3> </a></div><hr>
            <div id="content1">
            </div>
            <div class="generic-btn" style="display:block; width:80px"><a href="image_main.php" class="anchor-list-item"> <h3>Images</h3> </a></div>
            <div id="content2"><hr>
                <style>
                    * {
                        box-sizing: border-box;
                    }

                    body {
                        margin: 0;
                        font-family: Arial;
                    }

                    .header {
                        text-align: center;
                        padding: 32px;
                    }

                    .row {
                        display: -ms-flexbox; /* IE10 */
                        display: flex;
                        -ms-flex-wrap: wrap; /* IE10 */
                        flex-wrap: wrap;
                        padding: 0 4px;
                    }

                    /* Create four equal columns that sits next to each other */
                    .column {
                        -ms-flex: 25%; /* IE10 */
                        flex: 25%;
                        max-width: 25%;
                        padding: 0 4px;
                    }

                    .column img {
                        margin-top: 8px;
                        vertical-align: middle;
                        width: 100%;
                    }

                    /* Responsive layout - makes a two column-layout instead of four columns */
                    @media screen and (max-width: 800px) {
                        .column {
                            -ms-flex: 50%;
                            flex: 50%;
                            max-width: 50%;
                        }
                    }

                    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
                    @media screen and (max-width: 600px) {
                        .column {
                            -ms-flex: 100%;
                            flex: 100%;
                            max-width: 100%;
                        }
                    }
                </style>
                <div class="row"> 
                    <div class="column" id="image-column1"></div>
                    <div class="column" id="image-column2"></div>  
                    <div class="column" id="image-column3"></div>
                    <div class="column" id="image-column4"></div>
                </div>
            </div>
            <div class="generic-btn" style="display:block; width:75px"><a href="video_main.php" class="anchor-list-item"> <h3>Videos</h3> </a></div><hr>
            <div id="content3">
                <style>
                    * {
                        box-sizing: border-box;
                    }

                    body {
                        margin: 0;
                        font-family: Arial;
                    }

                    .header {
                        text-align: center;
                        padding: 32px;
                    }

                    .row {
                        display: -ms-flexbox; /* IE10 */
                        display: flex;
                        -ms-flex-wrap: wrap; /* IE10 */
                        flex-wrap: wrap;
                        padding: 0 4px;
                    }

                    /* Create four equal columns that sits next to each other */
                    .column {
                        -ms-flex: 33%; /* IE10 */
                        flex: 33%;
                        max-width: 33%;
                        padding: 0 4px;
                    }

                    .column img {
                        margin-top: 8px;
                        vertical-align: middle;
                        width: 100%;
                    }
                </style>
                <div class="row"> 
                    <div class="column" id="video-column1"></div>
                    <div class="column" id="video-column2"></div>  
                    <div class="column" id="video-column3"></div>
                </div>
            </div>
            <div class="generic-btn" style="display:block; width:100px"><a href="question_main.php" class="anchor-list-item"> <h3>Question</h3> </a></div><hr>
            <div id="content4">
            </div>
            <script>
                $(document).ready(function(){
                   $.get( "get_content_xml.php", { article: "<?php echo $queryArticle?>", image: "<?php echo $queryImage?>", video: "<?php echo $queryVideo?>", question: "<?php echo $queryQuestion?>" } )
                    .done(function( xmlDoc ) {
                        console.log(xmlDoc);
                        createArticlePaneList(xmlDoc);
                        createImageGallery(xmlDoc);
                        createVideoGallery(xmlDoc);
                        createQuestionPaneList(xmlDoc);
                    });
                });

                function createArticlePaneList(xmlDoc){
                    var articleList = xmlDoc.querySelectorAll("[type='ARTICLE']");
                    
                    for(i=0; i<articleList.length; i++){
                        var article_Pane = document.createElement('div');
                        var article_title = articleList[i].getElementsByTagName('title')[0].firstChild.nodeValue;
                        var content_id = articleList[i].getAttribute("content_id"); 
                        var article_user_name = articleList[i].getElementsByTagName('user_name')[0].firstChild.nodeValue;
                        var article_profile_pic = articleList[i].getElementsByTagName('profile_pic')[0].firstChild.nodeValue;
                        var article_f_name = articleList[i].getElementsByTagName('f_name')[0].firstChild.nodeValue;
                        var article_l_name = articleList[i].getElementsByTagName('l_name')[0].firstChild.nodeValue;
                        var article_date = articleList[i].getElementsByTagName('date')[0].firstChild.nodeValue;
                        var article_data = articleList[i].getElementsByTagName('data')[0].firstChild.nodeValue;
                        var article_image = article_data.match(/<img[^>]*>/g);
                        var article_text = article_data.replace(/<[^>]*>/g, "");
                        article_text = article_text.substring(0, 500)+"...";
                        
                        var article_image_pane = document.createElement('div');
                        
                        if(article_image.length!=0){
                            var article_image_displayed1 = createElementFromHTML(article_image[0]);
                            article_image_displayed1.setAttribute("style", "width:100%");
                            article_image_displayed1.classList.add("w3-margin-bottom");
                            var article_image_displayed1_wrapper = document.createElement('div');
                            article_image_displayed1_wrapper.classList.add("w3-half");
                            article_image_displayed1_wrapper.appendChild(article_image_displayed1);
                            article_image_pane.appendChild(article_image_displayed1_wrapper);
                            if(article_image.length>=2){
                                var article_image_displayed2 = createElementFromHTML(article_image[1]);
                                article_image_displayed2.setAttribute("style", "width:100%");
                                article_image_displayed2.classList.add("w3-margin-bottom");
                                var article_image_displayed2_wrapper = document.createElement('div');
                                article_image_displayed2_wrapper.classList.add("w3-half");
                                article_image_displayed2_wrapper.appendChild(article_image_displayed2);
                                article_image_pane.appendChild(article_image_displayed2_wrapper);
                            }
                        }
                        
                        article_Pane.innerHTML = '<div class="w3-container w3-card w3-white w3-round w3-margin"><br><a href="user_profile.php?user='+article_user_name+'"><img src="'+article_profile_pic+'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"></a><button  type="button" id="'+content_id+'" style="float:right; border-radius:20px;font-size:15px;" onclick="reportContent('+content_id+')">x</button><br><span class="w3-right w3-opacity">'+article_date+'</span><a class="generic-btn anchor-list-item" href="article.php?content_id='+content_id+'"><h4>'+article_title+'</h4></a><br><a class="generic-btn anchor-list-item" href="user_profile.php?user='+article_user_name+'"><h6>'+article_f_name+' '+article_l_name+'</h6></a><br><hr class="w3-clear"><p>'+article_text+'</p><div class="w3-row-padding" style="margin:0 -16px">'+article_image_pane.outerHTML+'</div></div>';

                        var article_list_container = document.getElementById('content1');
                        article_list_container.appendChild(article_Pane);
                    }
                }

                function createImageGallery(xmlDoc){
                    var imageList = xmlDoc.querySelectorAll("[type='IMAGE']");
                    
                    for(i=0; i<imageList.length; i++){
                        var image_title = imageList[i].getElementsByTagName('title')[0].firstChild.nodeValue;
                        var content_id = imageList[i].getAttribute("content_id"); 
                        var image_user_name = imageList[i].getElementsByTagName('user_name')[0].firstChild.nodeValue;
                        var image_profile_pic = imageList[i].getElementsByTagName('profile_pic')[0].firstChild.nodeValue;
                        var image_f_name = imageList[i].getElementsByTagName('f_name')[0].firstChild.nodeValue;
                        var image_l_name = imageList[i].getElementsByTagName('l_name')[0].firstChild.nodeValue;
                        var image_date = imageList[i].getElementsByTagName('date')[0].firstChild.nodeValue;
                        var image_data = imageList[i].getElementsByTagName('data')[0].firstChild.nodeValue;
                        
                        var image_Pane = createElementFromHTML('<div class="w3-container w3-card w3-white w3-round w3-margin"><a class="generic-btn anchor-list-item" href="picture.php?content_id='+content_id+'"><h4>'+image_title+'</h4></a><br><a href="user_profile.php?user='+image_user_name+'"><img src="'+image_profile_pic+'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:25px"></a><a class="generic-btn anchor-list-item" href="user_profile.php?user='+image_user_name+'"><h6>'+image_f_name+' '+image_l_name+'</h6></a><button  type="button" id="'+content_id+'" style="float:right; border-radius:20px;font-size:15px;" onclick="reportContent('+content_id+')">x</button><br><span class="w3-right w3-opacity">'+image_date+'</span><hr class="w3-clear"><a href="picture.php?content_id='+content_id+'"><img src="'+image_data+'" style="width:100%"></a></div>');
                        
                        if(i%4 === 0){
                            document.getElementById('image-column1').appendChild(image_Pane);
                        }else if(i%4 === 1){
                            document.getElementById('image-column2').appendChild(image_Pane);
                        }else if(i%4 === 2){
                            document.getElementById('image-column3').appendChild(image_Pane);
                        }else if(i%4 === 3){
                            document.getElementById('image-column4').appendChild(image_Pane);
                        }
                    }
                }

                function createVideoGallery(xmlDoc){
                    var videoList = xmlDoc.querySelectorAll("[type='VIDEO']");
                    
                    for(i=0; i<videoList.length; i++){
                        var video_title = videoList[i].getElementsByTagName('title')[0].firstChild.nodeValue;
                        var content_id = videoList[i].getAttribute("content_id"); 
                        var video_user_name = videoList[i].getElementsByTagName('user_name')[0].firstChild.nodeValue;
                        var video_profile_pic = videoList[i].getElementsByTagName('profile_pic')[0].firstChild.nodeValue;
                        var video_f_name = videoList[i].getElementsByTagName('f_name')[0].firstChild.nodeValue;
                        var video_l_name = videoList[i].getElementsByTagName('l_name')[0].firstChild.nodeValue;
                        var video_date = videoList[i].getElementsByTagName('date')[0].firstChild.nodeValue;
                        var video_data = videoList[i].getElementsByTagName('data')[0].firstChild.nodeValue;
                        
                        var video_Pane = createElementFromHTML('<div class="w3-container w3-card w3-white w3-round w3-margin"><a class="generic-btn anchor-list-item" href="video.php?content_id='+content_id+'"><h4>'+video_title+'</h4></a><br><a href="user_profile.php?user='+video_user_name+'"><img src="'+video_profile_pic+'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:25px"></a><a class="generic-btn anchor-list-item" href="user_profile.php?user='+video_user_name+'"><h6>'+video_f_name+' '+video_l_name+'</h6></a><button  type="button" id="'+content_id+'" style="float:right; border-radius:20px;font-size:15px;" onclick="reportContent('+content_id+')">x</button><br><span class="w3-right w3-opacity">'+video_date+'</span><hr class="w3-clear"><a href="video.php?content_id='+content_id+'"><img src="'+video_data+'" style="width:100%"></a></div>');
                        
                        if(i%3 === 0){
                            document.getElementById('video-column1').appendChild(video_Pane);
                        }else if(i%3 === 1){
                            document.getElementById('video-column2').appendChild(video_Pane);
                        }else if(i%3 === 2){
                            document.getElementById('video-column3').appendChild(video_Pane);
                        }
                    }
                }

                function createQuestionPaneList(xmlDoc){
                    var questionList = xmlDoc.querySelectorAll("[type='QUESTION']");
                    
                    for(i=0; i<questionList.length; i++){
                        var question_Pane = document.createElement('div');
                        var question_title = questionList[i].getElementsByTagName('title')[0].firstChild.nodeValue;
                        var content_id = questionList[i].getAttribute("content_id"); 
                        var question_user_name = questionList[i].getElementsByTagName('user_name')[0].firstChild.nodeValue;
                        var question_profile_pic = questionList[i].getElementsByTagName('profile_pic')[0].firstChild.nodeValue;
                        var question_f_name = questionList[i].getElementsByTagName('f_name')[0].firstChild.nodeValue;
                        var question_l_name = questionList[i].getElementsByTagName('l_name')[0].firstChild.nodeValue;
                        var question_date = questionList[i].getElementsByTagName('date')[0].firstChild.nodeValue;
                        var question_data = questionList[i].getElementsByTagName('data')[0].firstChild.nodeValue;
                        var question_text = question_data.substring(0, 500);
                        
                        
                        question_Pane.innerHTML = '<div class="w3-container w3-card w3-white w3-round w3-margin"><br><a href="user_profile.php?user='+question_user_name+'"><img src="'+question_profile_pic+'" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px"></a><button  type="button" id="'+content_id+'" style="float:right; border-radius:20px;font-size:15px;" onclick="reportContent('+content_id+')">x</button><br><span class="w3-right w3-opacity">'+question_date+'</span><a class="generic-btn anchor-list-item" href="question.php?content_id='+content_id+'"><h4>'+question_title+'</h4></a><br><a class="generic-btn anchor-list-item" href="user_profile.php?user='+question_user_name+'"><h6>'+question_f_name+' '+question_l_name+'</h6></a><br><hr class="w3-clear"><p>'+question_text+'</p></div>';

                        var question_list_container = document.getElementById('content4');
                        question_list_container.appendChild(question_Pane);
                    }
                }

                function createElementFromHTML(htmlString) {
                    var div = document.createElement('div');
                    div.innerHTML = htmlString.trim();

                    return div.firstChild; 
                }
    
                function reportContent(content_id){
                    console.log("hello");
                    var user_id = <?php echo $account->getId(); ?>;
                    $.ajax({
                        url:"processReport.php",
                        data:{content_id: content_id,user_id: user_id},
                        cache: false,
                        method: "POST",
                        success: function(result){
                            if(result.length>10){
                                alert(result);
                            }
                        }
                    })
                }

            </script>
        </div> 
        
        <div style="margin:2px; width:25%;">
            <?php include 'regular_weather_report/weather_forecast.php';?>
            <div class="container main-wthree-row w3-container w3-card w3-white w3-round" style="padding:0px; margin:0px; margin-top:20px;">
                <div class="list-group"  style="margin:0px;">
                    <div class="list-group-item active" id="news-container">
                        <h2 class="list-group-item-heading">Latest news</h2>
                        
                    </div>
                </div>
            </div>
            <?php
                use Opis\JsonSchema\{
                    Validator, ValidationResult, ValidationError, Schema
                };

                require 'vendor/autoload.php';

                $json = file_get_contents('http://newsapi.org/v2/top-headlines?country=us&apiKey=ffc4e7ea70d4424591ac48a3c6d13ddd');
                $news_data = json_decode($json);
                $news_api_schema = Schema::fromJsonString(file_get_contents('news_api_schema.json'));

                $news_api_validator = new Validator();

                /** @var ValidationResult $result */
                $result = $news_api_validator->schemaValidation($news_data, $news_api_schema);

            ?>
            <script>
            <?php if ($result->isValid()) { ?>
                $( document ).ready(function() {
                    //data is the JSON string
                    var news_data =  <?php echo json_encode($news_data); ?>;
                    for(i=0; i<6; i++){
                        var title = news_data.articles[i].title;
                        var author = news_data.articles[i].author;
                        if(author==null){
                            author = "";
                        }else if(author.length >20){
                            author = author.substring(0, 17)+"...";
                        }
                        var content = "";
                        if(news_data.articles[i].content != null){
                            var raw_content = news_data.articles[i].content;
                            var dummy_div = document.createElement("div");
                            dummy_div.innerHTML = raw_content;
                            var text = dummy_div.textContent || dummy_div.innerText || "";
                            content = text.substring(0, 200)+"...";
                        }
                        var date = news_data.articles[i].publishedAt;
                        var now = new Date(Date.now());
                        var published_date = new Date(date);
                        var time_since = timeago(now.getTime()-published_date.getTime());
                        var source = news_data.articles[i].source.name;
                        var article_link = news_data.articles[i].url;
                        var image_link = news_data.articles[i].urlToImage;
                        if(image_link==null){
                            image_link = "images/news-icon.jpg";
                        }
                        
                        var news_pane = createElementFromHTML('<div class="list-group-item"><img src="'+image_link+'"  style="width:100px; float:left; margin:5px"><a href="'+article_link+'" target="_blank"><h4 class="list-group-item-heading" style="color:darkblue;">'+title+'</h4></a><p class="list-group-item-text" style="color:darkgrey"><span>'+author+'</span> &#9679<span>'+source+'</span> &#9679<span>'+time_since+'</span></p><p style="margin-top:5px; color:black">'+content+'</p></div>');
                        $("#news-container").append(news_pane);
                    }
                });
            <?php }?>

                function createElementFromHTML(htmlString) {
                    var div = document.createElement('div');
                    div.innerHTML = htmlString.trim();

                    return div.firstChild; 
                }

                function timeago(ms) {

                    var ago = Math.floor(ms / 1000);
                    var part = 0;

                    if (ago < 2) { return "a moment ago"; }
                    if (ago < 5) { return "moments ago"; }
                    if (ago < 60) { return ago + " seconds ago"; }

                    if (ago < 120) { return "a minute ago"; }
                    if (ago < 3600) {
                        while (ago >= 60) { ago -= 60; part += 1; }
                        return part + " minutes ago";
                    }

                    if (ago < 7200) { return "an hour ago"; }
                    if (ago < 86400) {
                        while (ago >= 3600) { ago -= 3600; part += 1; }
                        return part + " hours ago";
                    }

                    if (ago < 172800) { return "a day ago"; }
                    if (ago < 604800) {
                        while (ago >= 172800) { ago -= 172800; part += 1; }
                        return part + " days ago";
                    }

                    if (ago < 1209600) { return "a week ago"; }
                    if (ago < 2592000) {
                        while (ago >= 604800) { ago -= 604800; part += 1; }
                        return part + " weeks ago";
                    }

                    if (ago < 5184000) { return "a month ago"; }
                    if (ago < 31536000) {
                        while (ago >= 2592000) { ago -= 2592000; part += 1; }
                        return part + " months ago";
                    }

                    if (ago < 1419120000) { // 45 years, approximately the epoch
                        return "more than year ago";
                    }

                    // TODO pass in Date.now() and ms to check for 0 as never
                    return "never";
                }
            </script>
        </div>
        
        
    </div>

    
    <?php include 'footer.php';?>
</body>
</html>