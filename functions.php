<?php
function launcher_setup_theme(){
	load_theme_textdomain("launcher");
	add_theme_support("post-thumbnails");
	add_theme_support("title-tag");
	
}
add_action("after_setup_theme", "launcher_setup_theme");

function launcher_assets(){
	/*
	echo get_page_template();
	echo '</br>';
	echo basename(get_page_template());
	die();
	*/
	
	if(is_page()){
		$launcher_template_name = basename(get_page_template());
		if($launcher_template_name == "launcher.php"){
			wp_enqueue_style("launcher",get_stylesheet_uri());
			wp_enqueue_style("animate",get_theme_file_uri("/assets/css/animate.css"));
			wp_enqueue_style("icomoon",get_theme_file_uri("/assets/css/icomoon.css"));
			wp_enqueue_style("bootstrap",get_theme_file_uri("/assets/css/bootstrap.css"));
			wp_enqueue_style("style",get_theme_file_uri("/assets/css/style.css"));

			wp_enqueue_script("easing-jquery-js", get_theme_file_uri("/assets/js/jquery.easing.1.3.js"),array("jquery"),"0.01", true);
			wp_enqueue_script("bootstrap-jquery-js",get_theme_file_uri("/assets/js/bootstrap.min.js"),array("jquery"), "0.01", true);
			wp_enqueue_script("waypoints-jquery-js",get_theme_file_uri("/assets/js/jquery.waypoints.min.js"), array("jquery"), "0.01", true);
			wp_enqueue_script("countdown-jquery-js", get_theme_file_uri("/assets/js/simplyCountdown.js"), array('jquery'), time(), true);
			wp_enqueue_script("main-jquery-js", get_theme_file_uri("/assets/js/main.js"), array('jquery'), time(),  true);

			//class 4.3
			$launcher_year = get_post_meta(get_the_id(),"year", true);
			$launcher_month = get_post_meta(get_the_id(),"month", true);
			$launcher_day = get_post_meta(get_the_id(),"day", true);
			wp_localize_script("main-jquery-js", "datedata", array(
				'year'	=> $launcher_year,
				'month'	=> $launcher_month,
				'day'	=> $launcher_day,
			));
		} else {
			wp_enqueue_style("bootstrap",get_theme_file_uri("/assets/css/bootstrap.css"));
			wp_enqueue_style("style",get_theme_file_uri("/assets/css/style.css"));						
		}
	}
	
}
add_action("wp_enqueue_scripts", "launcher_assets");

function launcher_sidebars(){
	register_sidebar(
		array(
			'name'			=> __('Footer Left','launcher'),
			'id'			=> 'footer-left',
			'description'	=> __('Footer Left', 'launcher'),
			'before_widget'	=> '<section id="%1$s" class = "widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h2 class = "widget-title">',
			'after_title'	=> '</h2>'
		)
	);
	
	register_sidebar(
		array(
			'name'			=> __('Footer Right','launcher'),
			'id'			=> 'footer-right',
			'description'	=> __('Footer right','launcher'),
			'before_widget'	=> '<section id="%1$s" class = "text-right widget %2$s">',
			'after_widget'	=> '</section>',
			'before_title'	=> '<h2 class = "widget-title">',
			'after_title'	=> '</h2>'
			
		)
	);
	
}
add_action("widgets_init","launcher_sidebars");


function launcher_styles(){
	if(is_page()){
		$thumbnail_url = get_the_post_thumbnail_url(null, "large");
		?>
		<style>
			.home-side {
				background-image: url(<?php echo $thumbnail_url; ?>);
			}
		</style>
		<?php
	}	
}
add_action("wp_head", "launcher_styles");
?>

