<?php
/*
Template Name: Home
*/
get_header();
?>
<div id="content" class="main--body">
  <?php
  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      the_content();
    endwhile; 
  endif; 
  wp_reset_postdata();
  ?>
</div>
<?php get_template_part( 'template-parts/menu' ); ?>
<?php get_footer(); ?>