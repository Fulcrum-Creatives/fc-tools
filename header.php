<?php 
if( !current_user_can( 'manage_options' ) ) :
  wp_redirect( 'http://clients.fulcrumcreatives.com/' ); 
  exit; 
endif;
?>
<?php get_template_part( 'template-parts/head' ); ?>
<header id="header" class="header" role="banner">
  <div id="header__logo" class="header__logo">
    <?php get_template_part( 'template-parts/partials/logo' ); ?>
  </div>
  <div class="header__name">
    Fulcrum Creatives
  </div>
</header>
<main id="main" class="main content__wrapper" role="main">