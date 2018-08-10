<html>
<head>
	<style>
		td{
			width:200px;
			text-align:center;
		}
		tr:nth-child(even){
			background-color:rgba(255,212,120,0.2);
		}
	</style>
	<script src="scripts/jquery-2.0.3.min.js"></script>
</head>
<body>
	<form id="SelectTour" method="Get" action="pricesController.php">
	<span>Select tour package</span><select id="choice" name="code">';
	<?php	
	$handle = opendir('json/');
	while (false !== ($entry = readdir($handle))) {
		if ((preg_match('#^'.DST.'#i',$entry))||(preg_match('#^'.DVGT.'#i',$entry))||(preg_match('#^'.DVET.'#i',$entry))||(preg_match('#^'.DDT.'#i',$entry))||(preg_match('#^'.SDT.'#i',$entry))){
	    	echo '<option value="'.basename($entry,'.json').'">'.basename($entry,'.json').'</option>';
		}	
	}
	?>
	</select>
	</form>
	<div id="output"></div>
	<script>
	$('#choice').prop('selectedIndex', -1);
	$('#choice').change(function(event){
		event.preventDefault(event);
		console.log('hello');
		$.ajax({
			type:"Get",
			url:"pricesController.php",
			data: $('#SelectTour').serialize(),
			success: function(html){
				$('#output').empty();
				$('#output').append(html);	
			}
			})	
	})
	
	</script>	
</body>