<?php

global $wpTPCSV;
if( isset($_POST['wptp_cron_opt']) ){
 update_option('wptp_cron_opt', $_POST['wptp_cron_opt'] );
 update_option('wptp_cron_mails', $_POST['wptp_cron_mails']);
 update_option('wptp_cron_types', $_POST['wptp_cron_types']);

$wpTPCSV -> initialize_cron();
//var_dump( $wpTPCSV -> send_mail('sabirmostofa@gmail.com'));

 
}


?>
<div class="wrap">
	<h3>Export your Trackback/Pingback URLs</h3>	
		<a href="?wptpcsv=wptp-all" target="_blank" class='button-primary wptp-csvs' id='wptp-all'>Export All As .csv</a>
		<br/>
		<br/>
		<a href="?wptpcsv=wptp-all-text" target="_blank" class='button-primary wptp-csvs' id='wptp-all-text'>Export All As .txt</a>
		<br/>
		<br/>
		<a href="?wptpcsv=wptp-pub" target="_blank" class='button-primary wptp-csvs' id='wptp-pub'>Export Published as .csv</a>
		<br/>
		<br/>
		<a href="?wptpcsv=wptp-pub-text" target="_blank" class='button-primary wptp-csvs' id='wptp-pub-text'>Export Published as .txt</a>
	
	<h3>Automatic mailing feature</h3>

	<form action = '' method='post'>
		Insert Mail address(If more than one separate by comma):
		<br/>
		<input value="<?php echo get_option('wptp_cron_mails') ?>" type="text" name="wptp_cron_mails"/>
		
		<select name='wptp_cron_types'>
			<option  <?php if( get_option('wptp_cron_types') == 'Export all(text and csv)') echo 'selected="selected"'  ; ?>>Export all(text and csv)</option>
			<option value='all-links-csv' <?php if( get_option('wptp_cron_types') == 'all-links-csv') echo 'selected="selected"'  ; ?>>Export all as csv</option>
			<option value='published-links-csv' <?php if( get_option('wptp_cron_types') == 'published-links-csv') echo 'selected="selected"'  ; ?>>Export approved as csv</option>
			<option value='all-links-text' <?php if( get_option('wptp_cron_types') == 'all-links-text') echo 'selected="selected"'  ; ?>>Export all as text</option>
			<option value='published-links-text' <?php if( get_option('wptp_cron_types') == 'published-links-text') echo 'selected="selected"'  ; ?>>Export approved as text</option>
		</select>	
		
		<select name='wptp_cron_opt'>
			<option>None</option>	
			<option <?php if( get_option('wptp_cron_opt') == 'Every 24 Hours') echo 'selected="selected"'  ; ?>>Every 24 Hours</option>
			<option <?php if( get_option('wptp_cron_opt') == 'Every 7 days') echo 'selected="selected"' ; ?>>Every 7 days</option>
		</select>
		<br/>
		<br/>
		<input class='button-primary' type='submit' value='Save Option' name='wptp-submit'/>
	</form>
	
	<h3>Recommended: </h3>
	<a href ="http://www.buildapassiveincome.com/go/build-my-rank/">Build My Rank</a> |
	<a href="http://www.buildapassiveincome.com/go/link-pushing/">Linkpushing</a> | 
	<a href="http://www.buildapassiveincome.com/go/Article-Ranks/">Article Ranks</a> | 
	<a href="http://www.buildapassiveincome.com/go/authorpro/">Authority Pro</a> | 
	<a href="http://www.buildapassiveincome.com/go/RankBuilder2/">Rank Builder 2.0</a>
	
<?php 

//var_dump( $wpTPCSV -> send_mail('ss') );


 ?>
</div>
