<?php
    if(!isset($login)){
        $login=false;
    }
    
    if(!isset($adminLogin)){
        $adminLogin=false;
    }
?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<nav class="navbar">
    <div class="nav-content">
        <ul>
            <li><div class="generic-btn" ><a href="http://localhost:1234/webproject/index.php" class="anchor-list-item"><span class="logo">LOGO</span></a></div></li>
            <li><div class="highlight"><a href="http://localhost:1234/webproject/index.php" class="anchor-list-item"><i class="fas fa-home"></i> Home</a></div></li>
            <?php if($login){ ?>  
            <div class="w3-dropdown-hover">
                <div id="notification" class="generic-btn"><i class="fas fa-bell"></i> Notification</div>
                <div id="notif-content" class="w3-dropdown-content w3-bar-block w3-border"></div>

                <script>
                    function handleFriend(response, requestee, requestor, response_button_id){
                        $.get( "handleFriend.php", { response: response, requestee: requestee, requestor: requestor } )
                        .done(function( responseText ) {
                            document.getElementById(response_button_id).innerHTML=responseText;
                        });
                    }

                    $(document).ready(function(){
                        $("#notification").click(function(){
                            $.get( "fetch_notification.php", { user_id: "<?php echo $account->getId()?>" } )
                            .done(function( response ) {
                                var news_data = JSON.parse(response);

                                if(news_data.length>0){
                                        document.getElementById('notif-content').innerHTML="";
                                    for(i = 0; i < news_data.length; i++){
                                        document.getElementById('notif-content').appendChild(createElementFromHTML('<table class="generic-btn" width="450"><tr style="padding: 1px;"><td rowspan="2" style="padding: 1px;"><a class="anchor-list-item" href="http://localhost:1234/webproject/user_profile.php?user='+news_data[i].cause_username+'"><img class="circle" src="'+news_data[i].cause_pic+'" alt="http://localhost:1234/webproject/images/user_icon.png" height="50px"></a></td><td style="padding: 1px;" width="'+news_data[i].main_width+'">'+news_data[i].notif_main+'</td>'+news_data[i].new_notif+'</tr><tr style="padding: 1px;"><td style="padding: 1px;">'+news_data[i].notif_date+'</td></tr></table>'));
                                    }
                                }else{
                                    document.getElementById('notif-content').innerHTML='<div class="w3-bar-item w3-button">No new notification</div>';
                                }
                                document.getElementById('notif-content').innerHTML+='<hr style="margin: 0;"><div style="margin: 1px;"><a class="anchor-list-item generic-btn" href="#">View all</a></div>';
                            });
                        });
                    });

                    function createElementFromHTML(htmlString) {
                        var div = document.createElement('div');
                        div.innerHTML = htmlString.trim();

                        return div.firstChild; 
                    }
                </script>
            </div>
            <?php } ?>
            <li><form action="search.php" method="get"><input type="text" placeholder="Search" name="Search-query"><button class="search-button" type="submit"><i class="fa fa-search"></i></button></form></li>
            <?php if($login){ ?>
                <li><a class="anchor-list-item" href="user_profile.php"><img class="circle" src="<?php echo $profile_pic1; ?>" alt="images/user_icon.png" height="50px" ></a></li>
            <li><div class="generic-btn create-content"><a class="anchor-list-item" href="post_content.php"> Post content</a></div></li>
            <li><div class="generic-btn create-content"><a class="anchor-list-item" href="post_question.php"> Ask question</a></div></li>
            <li><div class="generic-btn"><a href="action_logout.php" class="anchor-list-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></div></li>
            <?php }else if($adminLogin){?>
                <li><div class="generic-btn"><a href="http://localhost:1234/webproject/admin/admin_action_logout.php" class="anchor-list-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></div></li>
            <?php }else{ ?>
               <li><div class="generic-btn"><a href="user_auth.php" class="anchor-list-item"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign-in</a></div></li>
            <?php } ?>
            
        </ul>  
    </div>

</nav>
<br>
</html>