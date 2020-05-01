

<div class="tabinator" width="100px">​
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <h2>CSS tabs with shadow</h2> -->
    <input type="radio" id="tab1" name="tabs" checked>
    <label for="tab1">Articles</label>
    <input type="radio" id="tab2" name="tabs">
    <label for="tab2">Images</label>
    <input type="radio" id="tab3" name="tabs">
    <label for="tab3">Videos</label>
    <input type="radio" id="tab4" name="tabs">
    <label for="tab4">Questions</label>

    <div id="content1">
    </div>
    <div id="content2">
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
    <div id="content4">
    </div>
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