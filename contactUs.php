<?php include 'session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contactUs.css">
    <link rel="stylesheet" href="user_auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>
</head>
<body>
    
    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main"><!--contactUs content-->
        <div class="superContactUs">
        <div class="contactUs">
            <div class="contactUsContent">
            <div  style="padding:80px">
                <div>
                    <div class="textbox">
                    <input id="name" placeholder="Name">
                    </div>
                    <div class="textbox">
                    <input id="email" placeholder="Email">
                    </div>
                    <div class="textbox">
                    <input id="subject" placeholder="Subject">
                    </div>
                    <div class="textbox">
                    <textarea id="body" placeholder="Email Body"></textarea>
                    </div>
                    <input type="button" onclick="sendEmail()" value="Send an Email" class="btn btn-primary">
                </div>
                

            </div>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script type="text/javascript">
            function sendEmail(){
                console.log("sending...");
                var name = $("#name");
                var email = $("#email");
                var subject = $("#subject");
                var body = $("#body");

                if(isNotEmpty(name)&&isNotEmpty(email)&&isNotEmpty(subject)&&isNotEmpty(body)){
                   $.ajax({
                       url: 'sendEmail.php',
                       method: 'POST',
                       dataType: 'json',
                       data: {
                           name: name.val();
                           subject: subject.val();
                           body: body.val()
                       }, success: function (response){
                           console.log(response);
                       }
                   })
                }

            }

            function isNotEmpty(caller){
                if(caller.val()==''){
                    caller.css('border','1px solid red');
                    return false;
                }
                else{
                    caller.css('border','');
                    return true;
                }
            }


            </script>


            </div>
            </div>
        </div>
        </div>

        
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>
