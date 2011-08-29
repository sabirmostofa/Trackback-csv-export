<?php   

/*
Plugin Name: WP-Trackback-CSV
Plugin URI: http://sabirul-mostofa.blogspot.com
Description: Output the tracback/pingback urls to a CSV file
Version: 1.0
Author: Sabirul Mostofa
Author URI: http://sabirul-mostofa.blogspot.com
*/


$wpTPCSV = new wpTrackbackCSV();

   
class wpTrackbackCSV{
	
	function __construct(){
		add_action('admin_enqueue_scripts' , array($this,'admin_scripts'));
		add_action('wp_dashboard_setup',array($this, 'add_widget'));
		add_action( 'wp_ajax_myajax-submit', array($this,'ajax_handle' ));
		add_action( 'wp_loaded',array($this,'export_csv') );

		
		}
		
	function admin_scripts(){	
			wp_enqueue_script('kt_admin_script',plugins_url('/' , __FILE__).'js/script_admin.js');

		}
		
		function add_widget(){
				wp_add_dashboard_widget('wptpcsv', 'Export Trackback/Pingback URLS as CSV/txt', array($this, 'build_widget'));
			
			}
			
		function build_widget(){
			?>
			<a href="?wptpcsv=wptp-all" target="_blank" class='button-primary wptp-csvs' id='wptp-all'>Export All</a>
			<a href="?wptpcsv=wptp-pub" target="_blank" class='button-primary wptp-csvs' id='wptp-pub'>Only Published</a>
			<br/>
			<br/>
			<a href="?wptpcsv=wptp-all-text" target="_blank" class='button-primary wptp-csvs' id='wptp-all-text'>All As .txt</a>
			<a href="?wptpcsv=wptp-pub-text" target="_blank" class='button-primary wptp-csvs' id='wptp-pub-text'>Pubished as .txt</a>
			<?php
			}
		
		function export_csv(){
		
			if( isset( $_GET['wptpcsv'] ) ):
				switch ($_GET['wptpcsv']){
					
					case 'wptp-all':
					$this->build_csv(true);
					exit;
					break;
					
					case 'wptp-pub':
					$this->build_csv();
					exit;
					break;
					
					case 'wptp-all-text':
					$this->build_text(true);
					exit;
					break;
					
					case 'wptp-pub-text':
					$this->build_text();
					exit;
					break;
					
					}
			endif;
			
		}
		
		function build_csv($val = false){
			global $wpdb;
			$query = "select comment_author_url from $wpdb->comments where comment_type in('trackback','pingback')";
			$query = ($val)? $query : $query . " and comment_approved=1";
			$res = $wpdb ->get_results($query, 'ARRAY_N');
			$str ='';
			foreach( $res as $single){
				$str .= ('"'.$single[0].'"'."\r\n");				
				}
			trim($str, "\r\n");
			$filename= trim(site_url(),'http://').'-'.time();
			header('Content-type: text/csv');
			header("Content-disposition: attachment;filename={$filename}.csv");
			echo $str;
			}
			
		function build_text($val = false){
			global $wpdb;
			$query = "select comment_author_url from $wpdb->comments where comment_type in('trackback','pingback')";
			$query = ($val)? $query : $query . " and comment_approved=1";
			$res = $wpdb ->get_results($query, 'ARRAY_N');
			$str ='';
			foreach( $res as $single){
				$str .= ($single[0]."\r\n");				
				}
			trim($str, "\r\n");
			$filename= trim(site_url(),'http://').'-'.time();
			header('Content-type: text');
			header("Content-disposition: attachment;filename={$filename}.txt");
			echo $str;
			}
}
