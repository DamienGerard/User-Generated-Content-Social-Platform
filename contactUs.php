<?php include 'session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contactUs.css">
    <link rel="stylesheet" href="user_auth.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    
<?php 
if(isset($_POST['sendEmail'])){
    // the message
$name = $_POST['name'];
$msg = $_POST['emailBody'];
$subject = $_POST['subject'];
$email = $_POST['email'];
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
if(mail("nmelanie014@gmail.com",$subject,$msg,'From: '.$email)){
    echo 'successfully sent';
}
else{
    echo 'not sent';
}
}
?>

    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main"><!--contactUs content-->
        <div class="superContactUs">
        <div class="contactUs">
            <div class="contactUsContent">
            <div class="container" style="margin-top:10%;">
                <div class="row justify-content-center"><!--contents will be at the centre of the screen-->
                    <div class="col-md-6 col-md-offset-3" align="center">

                    <form action='contactUs.php' method='POST' >
                        <div class="textbox">
                        <input id="name" name='name' placeholder="Name">
                        </div>
                        <div class="textbox">
                        <input id="email" name='email' placeholder="Email">
                        </div>
                        <div class="textbox">
                        <input id="subject" name='subject'  placeholder="Subject">
                        </div>
                        <div class="textbox">
                        <textarea id="emailBody" name="emailBody"  placeholder="Email Body"></textarea>
                        </div>
                        <input type="submit" name='sendEmail' value="Send an Email" class="btn btn-primary">
                    </form>

                    </div>

                </div>
                

            </div>
            </div>
        </div>
        </div>
        </div>

        
    </div>        


    <?php include 'footer.php';?>
</body>
</html>
