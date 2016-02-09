<?php 
get_header();
?>
<div id="content" class="main--body">
  <?php
  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      $approval = get_field('fc_sign_off_required');
      $client   = get_bloginfo( 'name' );
      $project  = get_the_title();
      $form_url = add_query_arg( array(
        'client'  => $client,
        'project' => $project,
      ), home_url() . '/approval' );
      ?>
      <div class="approval">
        <div class="approval__title">
          <h3><?php the_title(); ?></h3>
        </div>
        <?php if( $approval ) : ?>
        <a href="<?php echo $form_url; ?>" class="approval__link">
          Your Approval is Required
        </a>
        <?php endif; ?>
      </div>
      
      <?php
      the_content();
      ?><div class="files"><?php
      if( have_rows('fc_image_gallery') ):
        while ( have_rows('fc_image_gallery') ) : the_row();
          $file  = get_sub_field( 'fc_image' );
          $title = get_sub_field( 'fc_image_title' );
          ?>
            <div class="files__container">
              <div class="files__item">
                <a href="<?php echo $file['url']; ?>" class="fancybox" rel="group">
                  <img src="<?php echo $file['url']; ?>" />
                </a>
              </div>
              <div class="files__title">
                <?php echo $title; ?>
              </div>
            </div>
          <?php
        endwhile;
      endif;
      if( have_rows('fc_files') ):
        while ( have_rows('fc_files') ) : the_row();
        $file  = get_sub_field( 'fc_file' ); 
        echo do_shortcode( '[pdf-embedder url="' . $file['url'] . '"]' );
        endwhile;
      endif;
      ?>
      </div>
      <?php 
      if( !is_page( array('approval', 'request' ) ) ) :
        if( $approval ) : ?>
          <div class="change_request">
            <?php 
            $values = array( 'client' => $client, 'project' => $project );
            gravity_form( 'Change Request', $display_title = true, $field_values = $values, $ajax = true ); 
            ?>
          </div>
      <?php
        endif;
      endif;
    endwhile;
  endif; 
  wp_reset_postdata();
  ?>
</div>
<?php get_template_part( 'template-parts/menu' ); ?>
<?php get_footer(); ?>