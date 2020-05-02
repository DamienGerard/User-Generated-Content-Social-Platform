<?php
    if(!isset($login)){
        $login=false;
    }
    
    if(!isset($adminLogin)){
        $adminLogin=false;
    }


echo '<div class="side-column">
<ul>';
if($adminLogin){
    echo '<li><div class="generic-btn2"  ><a href="http://localhost:1234/webproject/admin/reported.php" class="anchor-list-item"><i class="fas fa-newspaper"></i>Reported</a></div></li>';
}
echo '<li><div class="generic-btn2"  ><a href="http://localhost:1234/webproject/article_main.php" class="anchor-list-item"><i class="fas fa-newspaper"></i> Articles</a></div></li>
    <li><div class="generic-btn2" ><a href="http://localhost:1234/webproject/video_main.php" class="anchor-list-item"><i class="far fa-play-circle"></i> Videos</a></div></li>
    <li><div class="generic-btn2" ><a href="image_main.php" class="anchor-list-item"><i class="fas fa-images"></i> Pictures</a></div></li>
    <li><div class="generic-btn2" ><a href="http://localhost:1234/webproject/question_main.php" class="anchor-list-item"><i class="fas fa-question"></i> Questions</a></div></li>
</ul>
<hr>
<ul>
    <li><div class="generic-btn2" ><a href="#" class="anchor-list-item"><i class="fas fa-fire"></i><span> Trending</span></a></div></li>';
    if($login){
        echo '<li><div class="generic-btn2" ><a href="http://localhost:1234/webproject/history.php" class="anchor-list-item"><i class="fas fa-history"></i><span> History</span></a></div></li>
        <li><div class="generic-btn2" ><a href="#" class="anchor-list-item"><i class="far fa-bookmark"></i><span> Bookmarks</span></a></div></li>
        <li><div class="generic-btn2" ><a href="http://localhost:1234/webproject/like.php" class="anchor-list-item"><i class="far fa-thumbs-up"></i><span> Likes</span></a></div></li>';

    }
echo '</ul>
<hr>';
if($login){
    echo '<div class="interest-tab-content"><h4>FOLLOWINGS</h4>';
    $followerings_data = json_decode(file_get_contents('http://localhost:1234/WebProject/processFollowings.php?id='.$id));

    foreach($followerings_data as $following){
        $followingfname = $following->f_name;
    
        $followinglname = $following->l_name;
    
        $followingPicture = $following->profile_pic;
        $followingUsername = $following->user_name;
        $followingSelfDescription = $following->self_description;
        echo '<table class="generic-btn" width="100%">
        <tr style="padding: 1px;">
            <td rowspan="2" style="padding: 1px;">
                <a class="anchor-list-item" href="interest.php?interest='.$followingUsername.'"><img class="circle" src="'.$followingPicture.'" height="50px"></a>
            </td>
            <td style="padding: 1px;" width="75%"><a class="anchor-list-item" href="interest.php?interest='.$followingUsername.'"><strong>'.$followingfname.' '.$followinglname.'</strong></a></td></table>';
    }
    echo '</div>';
}

echo '</div>';