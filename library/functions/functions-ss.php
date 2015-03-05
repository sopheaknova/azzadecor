<?php


/**
 * ----------------------------------------------------------------------------------------
 * Register styles and scripts
 * ----------------------------------------------------------------------------------------
 */
if( !function_exists('sp_frontend_scripts_styles') ) {

	function sp_frontend_scripts_styles() {
		
		//Register CSS style
		wp_enqueue_style('gfont-opensans', 'http://fonts.googleapis.com/css?family=Cardo:400,400italic|Montserrat:700,400', false, SP_THEME_VERSION);
		wp_enqueue_style('theme-info', SP_BASE_URL . '/style.css', false, SP_THEME_VERSION);
		wp_enqueue_style('normalize', SP_ASSETS . '/css/normalize.css', false, SP_THEME_VERSION);
		wp_enqueue_style('animate', SP_ASSETS . '/css/animate.css', false, SP_THEME_VERSION);
		wp_enqueue_style('base', SP_ASSETS . '/css/base.css', false, SP_THEME_VERSION);
		wp_enqueue_style('backstretch', SP_ASSETS . '/css/backstretch.css', false, SP_THEME_VERSION);
		wp_enqueue_style('main', SP_ASSETS . '/css/main.css', false, SP_THEME_VERSION);
		
		//Register scripts
		wp_enqueue_script('modernizr', SP_ASSETS . '/js/vendor/custom-modernizr.min.js', array('jquery'), SP_THEME_VERSION, false);
		wp_enqueue_script('backstretch', SP_ASSETS . '/js/vendor/jquery.backstretch.js', array('jquery'), SP_THEME_VERSION, true);
		wp_enqueue_script('main', SP_ASSETS . '/js/main.js', array('jquery'), SP_THEME_VERSION, true);

		if ( is_singular() && comments_open() ) { wp_enqueue_script( 'comment-reply' ); }

		if ( ot_get_option('responsive') != 'off' ) {
			//wp_enqueue_style('menu-mobile', SP_ASSETS . '/css/menu-mobile.css', false, SP_THEME_VERSION);
			wp_enqueue_style('responsive', SP_ASSETS . '/css/responsive.css', false, SP_THEME_VERSION);
			//wp_enqueue_script('mobile-menu', SP_ASSETS . '/js/mobile-menu.js', array('jquery'), SP_THEME_VERSION, true);
		}

		if (function_exists('icl_get_languages')) {
			if ( strtolower(ICL_LANGUAGE_CODE) == 'kh') {
				wp_enqueue_style('khmer-gfont', 'http://fonts.googleapis.com/css?family=Khmer', false, SP_THEME_VERSION);
				wp_enqueue_style('kh', SP_ASSETS . '/css/kh.css', false, SP_THEME_VERSION);
			}
		}

		wp_localize_script(
			'main', 
			'theme_objects',
			array(
				'base' => get_template_directory_uri(),
				'commentProcess' => __('Processing your comment...', SP_TEXT_DOMAIN),
				'commentError' => __('You might have left one of the fields blank, or be posting too quickly.', SP_TEXT_DOMAIN),
				'commentSuccess' => __('Thanks for your response. Your comment will be published shortly after it\'ll be moderated.', SP_TEXT_DOMAIN)
			)
		);
	}
	add_action('wp_enqueue_scripts', 'sp_frontend_scripts_styles'); //print Script and CSS
}

/**
 * ----------------------------------------------------------------------------------------
 * Print customs css
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists('sp_print_ie_script') ){

	add_action('wp_head', 'sp_print_ie_script');
	
	function sp_print_ie_script(){
		echo '<!--[if lt IE 9]>'. "\n";
		echo '<script src="' . esc_url( SP_ASSETS . '/js/vendor/html5.js' ) . '"></script>'. "\n";
		echo '<![endif]-->'. "\n";
	}
}

/**
 * ----------------------------------------------------------------------------------------
 * Print customs css and script
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists('sp_print_custom_css_script') ){

	add_action('wp_head', 'sp_print_custom_css_script');
	
	function sp_print_custom_css_script(){
?>
	<style type="text/css">
		/* custom style */
	</style>

	<?php if ( is_page() || is_singular() ) : ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
		    $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
	        	if ($(this).parents('.gallery').length == 0) {
		            $(this).magnificPopup({
		               type: 'image',
		               removalDelay: 500,
		               mainClass: 'mfp-fade'
		            });
		        }
		    });
		    $('.entry-content .gallery').each(function() {
		        $(this).magnificPopup({
		            delegate: 'a',
		            type: 'image',
		            removalDelay: 300,
		            mainClass: 'mfp-fade',
		            gallery: {
		            	enabled: true,
		            	navigateByImgClick: true
		            }
		        });
		    });
	    });

	</script>
	<?php endif; ?>
<?php		
	}

}

