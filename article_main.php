<?php include 'session_login.php';
    include 'admin/admin_session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>

</head>
<body>
    
    <?php include 'navbar.php';?>
  

    <div class="super-main">

        <?php include 'side_column.php';?>
    
        <div class="main">
            
            <div class="generic-btn " style="display:block; width:75px"><a href="article_main.php" class="anchor-list-item"> <h3>Articles</h3> </a></div>
          <div id="article-container"></div>
            <?php
                $queryArticle = 'SELECT * FROM webprojectdatabase.article INNER JOIN webprojectdatabase.content ON content.content_id = article.article_id INNER JOIN webprojectdatabase.user ON user.user_id = content.user_id WHERE content.marked=0 ORDER BY content.date DESC';
            ?>
            <script>
                $(document).ready(function(){
                   $.get( "get_content_xml.php", { article: "<?php echo $queryArticle?>" } )
                    .done(function( xmlDoc ) {
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

                            var article_list_container = document.getElementById('article-container');
                            article_list_container.appendChild(article_Pane);
                        }
                    });
                });

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

                function createElementFromHTML(htmlString) {
                    var div = document.createElement('div');
                    div.innerHTML = htmlString.trim();

                    return div.firstChild; 
                }
            </script>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>