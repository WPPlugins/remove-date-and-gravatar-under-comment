<?php
error_reporting(E_ALL ^ E_NOTICE);
/**
 * Plugin Name: Remove comment date and gravatar
 * Plugin URI: https://venugopalphp.wordpress.com
 * Description: This automaticity removes the comment date and gravatar. If you want to enable anything so go to this plugin settings and uncheck checkbox. 
 * Version: 1.0
 * Author: Venugopal.
 * Author URI: https://venugopalphp.wordpress.com
 * License: GPL2
 */

Class WP_remove_date_gravatar
{
	public function __construct()
	{
		add_action( 'admin_init',  array($this, 'hide_c_d_g_styles') );
		add_action( 'admin_menu', array($this, 'hide_c_d_g_plugin_menu') );
		
	}
	
	/* Adding css to plugn */
	public function hide_c_d_g_styles() {
			$pluginfolder = get_bloginfo('url') . '/' . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__)).'/css';
			wp_enqueue_style( 'hide_c_d_g', $pluginfolder.'/hide_c_d_g.css' );
		
	}
	
	/* Creating plugin setting menu */
	public function hide_c_d_g_plugin_menu()	{
			add_options_page('Remove comment date & gravatar','Remove comment date & gravatar','manage_options','hide-c-d-g',array($this,'hide_c_d_g_load'));
	}
	
	/* Creating plugin settings */
	
	public function hide_c_d_g_load(){
				 /* Checking submit button clicked or not	 */
				if(isset($_REQUEST['hid_c_d_g_submit'])){
					
					/* Insert detail to database */
					$this->hide_c_d_g_to_db_details();
				}
				
				 /* Display form checkboxes form setting.php file */
		 require(dirname( __FILE__ ).'/admin-checkbox-settings.php');
				 
	}
	
	
	public function hide_c_d_g_to_db_details()
		{
					/* If Date checkbox checked  asign value 1 else 0*/
			if(isset($_REQUEST['date_r'])){
				update_option('hcdg_remove_date', "1"); 	
				}else{
				 update_option('hcdg_remove_date', '0');	
			}
	
			/* If Gravatar checkbox checked asign value 1 else 0 */
			if(isset($_REQUEST['gravatar_r'])){
				update_option('hcdg_remove_gravatar', "1");	
				}else{
					update_option('hcdg_remove_gravatar', '0');	
			}
			
	}

	
		
}

$WP_hid_d_g = new WP_remove_date_gravatar();


/* Getting checkbox cheked values from datbase plugin function outside  */
$comment_date_d = get_option('hcdg_remove_date');
$comment_gravatar_d = get_option('hcdg_remove_gravatar');
	
	
/* If Date checkbox checked REMOVED Date under the comment */
if($comment_date_d == '1'){	
	add_action('wp_head','hcdg_date_css');
	function hcdg_date_css() {
	$date_out .="<style> .comment-metadata { display:none !important; } </style>";
			
	echo $date_out;
	}
}
	
	
/* If Gravatar checkbox checked REMOVED Gravatar image under the comment */
	if($comment_gravatar_d == '1'){	
	
	
		add_action('wp_head','hcdg_gravtar_css');
		function hcdg_gravtar_css() {
		$image_out .="<style> .comment-author .vcard .avatar{ display:none !important; } 
													.comment-author .avatar{ display:none !important; }
									</style>";
				
		echo $image_out;
		}
		
	} 
	
	
/* By default checkboxes checked on plugin activation */
 class Remove_d_g_default {
	 
    static function d_g_default_checked() {
 
		update_option('hcdg_remove_date', '1');
		update_option('hcdg_remove_gravatar', '1');
	
     }
}
register_activation_hook( __FILE__, array( 'Remove_d_g_default', 'd_g_default_checked' ) );	