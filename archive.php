<?php

get_header();

?>

<section class="page-wrap">
<div class="container">


   

    <?php get_template_part('includes/section','archive'); ?>
    
    <?php previous_post_link(); ?>
    <?php next_post_link(); ?>

   
</section>   


<?php
get_footer();
?>

