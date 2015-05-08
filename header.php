<?php
/**
 * The Header
 */
?>
<!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js lt-ie9> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<!-- Start header -->
    <header>

        <div class="header-inner scrolled">
        <a class="logo" href="<?php echo home_url() ?>/"  title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
            <img src="<?php echo SP_ASSETS; ?>/images/logo-mobile.png">
        </a>
        </div> <!-- /.header-inner -->
        
        <div class="menu-button">
            <span class="before"></span>
            <span class="middle"></span>
            <span class="after"></span>
        </div> <!-- /.menu-button -->
        
    </header>
    <!-- End header -->

    <!-- Start sidebar -->
    <nav class="push-sidebar push-left">
        <div class="logo-nav"><a href="<?php echo home_url() ?>/"  title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>">
            <img src="<?php echo SP_ASSETS; ?>/images/logo-header.png"></a>
        </div>

        <?php echo sp_main_navigation(); ?>

        <div class="quick-contact">
            <p><?php echo ot_get_option( 'info-address' ); ?></p>
            <ul>
            <?php 
                if ( function_exists( 'ot_get_option' ) ) {

                /* get the deatil array */
                $infos = ot_get_option( 'info-contact', array() );
                if ( ! empty( $infos ) ) {
                foreach( $infos as $info ) {
                  echo '<li>'.$info['info-value'].'</li>';
                    }
                }

            } ?>     
            </ul>
        </div>
        
        <div class="footer-nav">
            <img src="<?php echo SP_ASSETS; ?>/images/pic-italy-flat.png">
            <p>&copy AZZA DECOR &copy 2015</p>
        </div>

    </nav> 
    <!-- End Sidebar -->

    <div class="navigation-overlay"></div>

    <!-- Start wrapper -->
    <div id="wrapper">

