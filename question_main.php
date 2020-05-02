<?php include 'session_login.php';
    include 'admin/admin_session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Questions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>

</head>
<body>
    
    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main">
        <div class="generic-btn" style="display:block; width:115px; margin-bottom: 5px;"><a href="question_main.php" class="anchor-list-item"> <h3 style="margin: 0; padding: 0;">Questions</h3> </a></div>
        <div id="question-container"></div>
            <?php
                $queryQuestion = 'SELECT * FROM webprojectdatabase.question INNER JOIN webprojectdatabase.content ON content.content_id = question.question_id INNER JOIN webprojectdatabase.user ON user.user_id = content.user_id WHERE content.marked=0 ORDER BY content.date DESC';
            ?>
            <script>
                $(document).ready(function(){
                   $.get( "get_content_xml.php", { question: "<?php echo $queryQuestion?>" } )
                    .done(function( xmlDoc ) {
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

                            var question_list_container = document.getElementById('question-container');
                            question_list_container.appendChild(question_Pane);
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
            </script>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>