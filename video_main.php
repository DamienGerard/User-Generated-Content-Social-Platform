<?php include 'session_login.php';
    include 'admin/admin_session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>
    
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
</head>
<body>
<?php include 'navbar.php';?>
    
    <div class="super-main">

    <?php include 'side_column.php';?>

        <div class="main">
            <div class="generic-btn" style="display:block; width:75px"><a href="image_main.php" class="anchor-list-item"> <h3>Videos</h3> </a></div>
            <div id="video-gallery" class="row">
                <div class="column" id="video-column1"></div>
                <div class="column" id="video-column2"></div>  
                <div class="column" id="video-column3"></div>
            </div>
                <?php
                    $queryVideo = 'SELECT * FROM webprojectdatabase.video INNER JOIN webprojectdatabase.content ON content.content_id = video.video_id INNER JOIN webprojectdatabase.user ON user.user_id = content.user_id WHERE content.marked=0 ORDER BY content.date DESC';
                ?>
                <script>
                    $(document).ready(function(){
                       $.get( "get_content_xml.php", { video: "<?php echo $queryVideo?>" } )
                        .done(function( xmlDoc ) {
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