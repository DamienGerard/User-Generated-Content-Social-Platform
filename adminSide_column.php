<?php

echo '<div class="side-column">
<ul>
    <li><div class="generic-btn2"  ><a href="admin.php" class="anchor-list-item"><i class="fas fa-newspaper"></i>Reported</a></div></li>
    <li><div class="generic-btn2"  ><a href="article_main.php" class="anchor-list-item"><i class="fas fa-newspaper"></i> Articles</a></div></li>
    <li><div class="generic-btn2" ><a href="video_main.php" class="anchor-list-item"><i class="far fa-play-circle"></i> Videos</a></div></li>
    <li><div class="generic-btn2" ><a href="image_main.php" class="anchor-list-item"><i class="fas fa-images"></i> Pictures</a></div></li>
    <li><div class="generic-btn2" ><a href="question_main.php" class="anchor-list-item"><i class="fas fa-question"></i> Questions</a></div></li>
</ul>
<hr>
<ul>
    <li><div class="generic-btn2" ><a href="#" class="anchor-list-item"><i class="fas fa-fire"></i><span> Trending</span></a></div></li>';
    if($login){
        echo '<li><div class="generic-btn2" ><a href="history.php" class="anchor-list-item"><i class="fas fa-history"></i><span> History</span></a></div></li>';

    }
echo '</ul>
<hr>';
if($login){
    echo '<h4>FOLLOWINGS</h4>';
}

echo '</div>';