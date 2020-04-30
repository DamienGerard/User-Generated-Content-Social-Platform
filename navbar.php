<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<nav class="navbar">
    <div class="nav-content">
        <ul>
            <li><div class="generic-btn" ><a href="index.php" class="anchor-list-item"><span class="logo">LOGO</span></a></div></li>
            <li><div class="highlight"><a href="index.php" class="anchor-list-item"><i class="fas fa-home"></i> Home</a></div></li>
            <?php if($login){ ?>  
            <div class="w3-dropdown-hover">
                <div id="notification" class="generic-btn"><i class="fas fa-bell"></i> Notification</div>
                <div id="notif-content" class="w3-dropdown-content w3-bar-block w3-border"></div>

                <script>
                    function handleFriend(response, requestee, requestor, response_button_id){
                        console.log(response_button_id);
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'handleFriend.php?response='+response+'&requestee='+requestee+'&requestor='+requestor, true);

                        if(xhr.readyState!=4){
                            document.getElementById(response_button_id).innerHTML='<div id=loading><img src="animation/pulse.gif" alt="" height=50></div>';
                        }

                        xhr.onload = function(){
                            document.getElementById(response_button_id).innerHTML=this.responseText;
                            //$("#"+response_button_id).load("#"+response_button_id);
                        }
                        
                        xhr.send();
                    }

                    $(document).ready(function(){
                        $("#notification").click(function(){
                            var unique = new Date().getUTCMilliseconds();
                            console.log(unique);
                            var xhr = new XMLHttpRequest();
                            console.log('url: '+'fetch_notification.php?user_id=<?php echo $account->getId()?>&'+unique);
                            xhr.open('GET', 'fetch_notification.php?user_id=<?php echo $account->getId()?>&'+unique, true);
                            
                            if(xhr.readyState!=4){
                                document.getElementById('notif-content').innerHTML='<div id=loading><img src="animation/pulse.gif" alt="" height=50></div>';
                            }

                            xhr.onload = function(){
                                console.log('response: '+this.responseText);
                                console.log('response length: '+this.responseText.length);
                                if(this.responseText.length>2){
                                    document.getElementById('notif-content').innerHTML=this.responseText;
                                }else{
                                    document.getElementById('notif-content').innerHTML='<div class="w3-bar-item w3-button">No new notification</div>';
                                }
                                document.getElementById('notif-content').innerHTML+='<hr style="margin: 0;"><div style="margin: 1px;"><a class="anchor-list-item generic-btn" href="#">View all</a></div>';
                            }
                            
                            xhr.send();
                        });
                    });
                </script>
            </div>
            <?php } ?>
            <li><form action="search.php" method="get"><input type="text" placeholder="Search" name="Search-query"><button class="search-button" type="submit"><i class="fa fa-search"></i></button></form></li>
            <?php if($login){ ?>
                <li><a class="anchor-list-item" href="user_profile.php"><img class="circle" src="<?php echo $profile_pic1; ?>" alt="images/user_icon.png" height="50px" ></a></li>
            <li><div class="generic-btn create-content"><a class="anchor-list-item" href="post_content.php"> Post content</a></div></li>
            <li><div class="generic-btn create-content"><a class="anchor-list-item" href="post_question.php"> Ask question</a></div></li>
            <li><div class="generic-btn"><a href="action_logout.php" class="anchor-list-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></div></li>
            <?php }else{ ?>
               <li><div class="generic-btn"><a href="user_auth.php" class="anchor-list-item"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign-in</a></div></li>
            <?php } ?>
            
        </ul>  
    </div>

</nav>
<br>
</html>