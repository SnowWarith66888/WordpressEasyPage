<?php

/**
 * @links view links example:  https://xxxxx/?paged=
 * @paged current page index 
 * @nums how many data of every page
 * @cols how many pagination of the current page index left and right
 */
function number_pagenavi($links, $paged = 1, $nums = 2, $cols = 2) {

    $query = new WP_Query(array('post_type'=>'post'));

    $total = $query->found_posts;   

    $max_pages = ceil($total/$nums);
   
    if ($max_pages > 1)
    {
       
        echo '<div class="navigation pagination" aria-label="books">';
        echo '<div class="nav-links">';
        if ($paged - 1 > 0)  {
            echo '<a href="'.$links.($paged-1).'" class="prev page-numbers" >Prev</a>';
        }
        $p_start = 1;
        $start = 1;
        if ($paged - $cols > 1) {$start = $paged-$cols;}
        for ($i = $start; $i < $paged; $i++) 
        {
            if ($p_start > $cols) {break;}

            echo '<a href="'.$links.$i.'" class="page-numbers">'.$i.'</a>';
            $p_start++;
        }

        echo '<span aria-current="page" class="page-numbers current">'.$paged.'</span>';

        $p_end = 1;
        for ($i = $paged+1; $i < $max_pages; $i++) {
            if ($p_end > $cols) {break;}

            echo '<a href="'.$links.($paged+1).'" class="page-numbers">'.$i.'</a>';

            $p_end++;
        }

        if ($paged+1 < $max_pages)  {
            echo '<a href="'.$links.($paged+1).'" class="next page-numbers">Next</a>';
        }
        echo '</div>';
        echo '</div>';
    } 

}



?>