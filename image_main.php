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

</head>
<body>
<?php include 'navbar.php';?>
   

    <div class="super-main">

    <?php include 'side_column.php';?>

        <div class="main">
            <div class="generic-btn" style="display:block; width:75px"><a href="image_main.php" class="anchor-list-item"> <h3>Images</h3> </a></div>
            <div id="image-gallery" class="row">
                <div class="column" id="image-column1"></div>
                <div class="column" id="image-column2"></div>  
                <div class="column" id="image-column3"></div>
                <div class="column" id="image-column4"></div>
            </div>
            <?php
                $queryImage = 'SELECT * FROM webprojectdatabase.picture INNER JOIN webprojectdatabase.content ON content.content_id = picture.picture_id INNER JOIN webprojectdatabase.user ON user.user_id = content.user_id WHERE content.marked=0 ORDER BY content.date DESC';
            ?>
            <script>
                $(document).ready(function(){
                   $.get( "get_content_xml.php", { image: "<?php echo $queryImage?>" } )
                    .done(function( xmlDoc ) {
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