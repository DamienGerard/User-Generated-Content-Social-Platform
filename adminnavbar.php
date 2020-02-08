<?php

    echo '    <nav class="navbar">
    <div class="nav-content">
        <ul>
            <li><div class="generic-btn" ><a href="index.php" class="anchor-list-item"><span class="logo">LOGO</span></a></div></li>
            <li><div class="highlight"><a href="index.php" class="anchor-list-item"><i class="fas fa-home"></i> Home</a></div></li>';
            if($login){
               echo' <li><div class="generic-btn"><a href="#" class="anchor-list-item"><i class="fas fa-bell"></i> Notification</a></div></li>';
            }
            if($login){
                echo '
            <li><div class="generic-btn"><a href="action_logout.php" class="anchor-list-item"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></div></li>';
            }else{
               echo '<li><div class="generic-btn"><a href="user_auth.php" class="anchor-list-item"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign-in</a></div></li>';
            }
            
    echo '    </ul>  
    </div>

    </nav>
    <br>';