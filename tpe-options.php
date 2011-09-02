<?php
if( isset($_POST['wptp_cron_opt']) ){
 update_option('wptp_cron_opt', $_POST['wptp_cron_opt'] );
 var_dump( get_option('wptp_cron_opt') );

global $wpTPCSV;
$wpTPCSV -> initialize_cron();
 
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




 ?>
</div>
