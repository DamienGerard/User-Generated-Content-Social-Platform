<?php include 'session_login.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="aboutUs.css">
    <link rel="stylesheet" href="about-us-11-html5\styles\about-us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e279e577b6.js"></script>
</head>
<body>
    
    <?php include 'navbar.php';?>

    <div class="super-main">

        <?php include 'side_column.php';?>

        <div class="main"><!--aboutUs content-->
        <div class="superAboutUs">
            <div class="aboutUs">
            <div class="aboutUsContent">
            <div class="wrapper row2">
  <div id="container" class="clear">

    <div id="about-us" class="clear">
      <section id="about-intro" class="clear">
        <h2 >About Us</h2>
       
        <p style="margin-left:20%;">Just a passionate team willing to provide a fun yet simple platform for everyone</p>
        <p style="margin-left:45%;">Enjoy!</p>
      </section>
  
      <section id="team">
        <h2>Our Team</h2>
        <ul class="clear">
          <li class="one_third first">
            <figure><img src="about-us-11-html5/images/demo/damienPic.jpg" alt="">
              <figcaption>
                <p class="team_name">Gerard Denis Damien</p>
                <p class="team_title">CSY2 Student UOM</p>
                <p class="team_description"></p>
              </figcaption>
            </figure>
          </li>
          <li class="one_third" >
            <figure><img src="about-us-11-html5/images/demo/nicolasPic.jpg" width:1% alt="">
              <figcaption>
                <p class="team_name">Melanie Nicolas</p>
                <p class="team_title">CS Student UOM</p>
                <p class="team_description"></p>
              </figcaption>
            </figure>
          </li>
        </ul>
      </section>
  
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