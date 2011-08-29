
jQuery(document).ready(function($){
	$('a.wptp-csvs').bind('click',function(e){
		e.preventDefault();				
				window.location.search = '?wptpcsv=' + $(this).attr('id');		
				})
	
	})
	
