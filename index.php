<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
	<title>Hace 10 a&ntilde;os gastaban las tarjetas black en...</title>
	<meta http-equiv="content-type" content="text/html"/>
	<meta name="description" content="quizás no necesites una web" />
	<meta charset="utf-8">
	<!-- generic meta -->
	<meta content="montera34" name="author" />
	<meta name="title" content="..." />
	<meta content="..." />
	<meta content="..." name="keywords" />
	<!-- facebook meta 	-->
	<meta property="og:title" content="Hace 10 años gastaban las tarjetas black en..." />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="¿Qué estaban gastando justo hace 10 años los de las tarjetas black?" />
	<meta content="corrupción,caja marid,bankia" />
	<meta property="og:url" content="http://lab.montera34.com" /> 
	<!-- twitter meta -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@montera34">
	<meta name="twitter:title" content="Hace 10 años gastaban las tarjetas black en..." />
	<meta name="twitter:description" content="¿Qué estaban gastando justo hace 10 años los de las tarjetas black?" />
	<meta name="twitter:creator" content="@montera34">
	<meta name="twitter:image:src" content="pendiente" />
	<meta property="twitter:account_id" content="137677992" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css" />
</head>

<body>
	<div class="container main-container">
		<div class="share pull-right">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://lab.montera34.com" data-text="¿Qué estaban gastando justo hace 10 años los de las tarjetas black" data-via="numeroteca" data-lang="es">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</div>

<?php
// data file
$csv_filename = "data/data.csv"; // relative path to data filename
$line_length = "4096"; // max line lengh (increase in case you have longer lines than 1024 characters)
$delimiter = ","; // field delimiter character
$enclosure = '"'; // field enclosure character

// then and now
$then = date('Y-m-d',strtotime('10 years ago'));
$now = date('Y-m-d');

// events container
$events = '';

// open the data file
$fp = fopen($csv_filename,'r');

// get data and store it in array
if ( $fp !== FALSE ) { // if the file exists and is readable

	// data array generation
	$data = array();
	$line = 0;
	while ( ($fp_csv = fgetcsv($fp,$line_length,$delimiter,$enclosure)) !== FALSE ) { // begin main loop
		if ( $line == 0 ) {}
		else {
			$date = $fp_csv[0];
			if ( $date == $then ) {
				$events[$line]['date'] = $date;
				$events[$line]['hora'] = $fp_csv[1];
				$events[$line]['comercio'] = $fp_csv[2];
				$events[$line]['actividad'] = $fp_csv[3];
				$events[$line]['importe'] = $fp_csv[4];
				$events[$line]['operacion'] = $fp_csv[5];
				$events[$line]['quien'] = $fp_csv[6];
			}

		} // end if not line 0
		$line++;
	}
	fclose($fp);
?>


	<h1>¿Qu&eacute; estaban gastando justo hace 10 años los de las tarjetas black?</h1>
	<a class="btn btn-info pull-right" href="https://github.com/montera34/habiaunavez" role="button">Colabora <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
	<div class="row">
		<h2>Tal día como hoy hace 10 años...</h2>
	</div>

<?php
	if ( is_array($events) ) {
		foreach ( $events as $e ) {
			echo '<p>'.$e['quien'].' a las '.$e['hora'].' del '.$e['date']. ' gastaba '.$e['importe'].'euros con su tarjeta black en '.$e['comercio'].' ('.$e['operacion'].' en '.$e['actividad'].').</p>';
		}

	} else { echo '¡Nadie utilizó las tarjetas black!' ; }

} else {
	echo "<h2>Error</h2>
		<p>File with contents not found or not accesible.</p>
		<p>Check the path: " .$csv_filename. ". Maybe it has to be absolute...</p>";
} // end if file exist and is readable
?>

</div>	
</body>
