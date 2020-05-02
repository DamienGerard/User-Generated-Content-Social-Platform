<?php include 'session_login.php';

$url1 = 'http://localhost:1234/WebProject/processFollowings.php?id='.$id;
$json1 = json_decode(file_get_contents($url1));




?>

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
    
<?php 

        include 'navbar.php';


    ?>
  

    <div class="super-main">

    <?php 

            include 'side_column.php';


        ?>
    
        <div class="main">
            
            <div style="display:block; width:75px"> <h3>Followings</h3></div>
          
            <?php
            
            if($json1){
                foreach($json1 as $following){
                    $followingfname = $following->f_name;
                
                    $followinglname = $following->l_name;
                
                    $followingPicture = $following->profile_pic;
                    $followingDate = $following->date_since;
                    $followingUsername = $following->user_name;
                    $followingSelfDescription = $following->self_description;
                    echo '<div style="background-color:lightgrey;  border-radius: 5px; border: 3px solid black; height:100px; overflow-y:hidden" class="articleDisplayed">';
                    echo '<table>';
                    
                    echo '<tr>';
                    echo '<td rowspan="2"><a href="user_profile.php?user='.$followingUsername.'" class="generic-btn"><img src="'.$followingPicture.'" alt="" style="height:50px"></a></td>';
                    echo '<td><a class="generic-btn anchor-list-item" href="user_profile.php?user='.$followingUsername.'"><p>'.$followingfname.' '.$followinglname.'</p></a></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo "<td>".$followingDate."</td>";
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td colspan="2"><p>'.$followingSelfDescription.'</p>'.'</td>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</div>';
                    echo '<br><br>';
                }}
            ?>
        </div>        
    </div>


    <?php include 'footer.php';?>
</body>
</html>