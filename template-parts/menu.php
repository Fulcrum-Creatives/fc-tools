<div class="main--aside">
  <div class="projects">
  <?php
    $home = get_page_by_title( 'Home' );
    $menu_query = new WP_Query( array(
        'post_type'     => 'page',
        'post_parent'   => 0,
        'post__not_in'  => array($home->ID),
        'no_found_rows' => true
    ) );
    if( have_posts() ) : 
      while( $menu_query->have_posts() ) : 
        $menu_query->the_post();
          $published = get_the_date();
          $page_id = $post->ID;
          ?>
            <h3 class="projects__heading">
              <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
          <?php
            $args = array(
              'child_of'     => $page_id,
              'title_li'     => '', 
            );
          ?><ul><?php
            wp_list_pages( $args );
          ?></ul><?php
      endwhile; 
    endif; 
    wp_reset_postdata();
    ?>
  </div>
</div>