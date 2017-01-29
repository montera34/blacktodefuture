<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
	<title>Tarjetas Black to de Future. Hace 10 a&ntilde;os gastaban las tarjetas black en...</title>
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
	<meta property="og:url" content="http://lab.montera34.com/blacktodefuture" /> 
	<!-- twitter meta -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@montera34">
	<meta name="twitter:title" content="Hace 10 años gastaban las tarjetas black en..." />
	<meta name="twitter:description" content="¿Qué estaban gastando justo hace 10 años los de las tarjetas black?" />
	<meta name="twitter:creator" content="@montera34">
	<meta name="twitter:image:src" content="img/blacktodefuture-presentacion.png" /> 	<!-- TODO: pending image -->
	<meta property="twitter:account_id" content="137677992" />
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet"> 
</head>

<?php
// data file
$csv_filename = "data/data.csv"; // relative path to data filename
$line_length = "4096"; // max line lengh (increase in case you have longer lines than 1024 characters)
$delimiter = ","; // field delimiter character
$enclosure = '"'; // field enclosure character

// Grabs day from url to filter the list
$dia = $_GET['dia'];

if ( !empty($dia)) { //if day is specified in the url, use it
	$then = date('Y-m-d',strtotime($dia));
} else {
	$then = date('Y-m-d',strtotime('10 years ago'));
}

// then and now
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

#Calculate day of the week and prints it in Spanish
$month = date('n', strtotime($then));
$mes = "";

if ($month == 1 ) { 
	$mes = "enero";
} elseif ($month == 2 ) {
	$mes = "febrero";
} elseif ($month == 3 ) {
	$mes = "marzo";
} elseif ($month == 4 ) {
	$mes = "abril";
} elseif ($month == 5 ) {
	$mes = "mayo";
} elseif ($month == 6 ) {
	$mes = "junio";
} elseif ($month == 7 ) {
	$mes = "julio";
} elseif ($month == 8 ) {
	$mes = "agosto";
} elseif ($month == 9 ) {
	$mes = "septiembre";
} elseif ($month == 10 ) {
	$mes = "octubre";
} elseif ($month == 11 ) {
	$mes = "noviembre";
} else {
	$mes = "diciembre";
}


#Calculate day of the week and prints it in Spanish
$dayofweek = date('w', strtotime($then));
$diasemana = "";

if ($dayofweek == 0 ) { 
	$diasemana = "domingo";
} elseif ($dayofweek == 1 ) {
	$diasemana = "lunes";
} elseif ($dayofweek == 2 ) {
	$diasemana = "martes";
} elseif ($dayofweek == 3 ) {
	$diasemana = "mi&eacute;rcoles";
} elseif ($dayofweek == 4 ) {
	$diasemana = "jueves";
} elseif ($dayofweek == 5 ) {
	$diasemana = "viernes";
} else {
	$diasemana = "s&aacute;bado";
}

#TODO make es_ES locale work or install it
#setlocale(LC_ALL,"es_ES");
#$string = "24/11/2014";
#$date = DateTime::createFromFormat("d/m/Y", $string);
#echo strftime("%G",$date->getTimestamp());

?>
<body>
<div class="container main-container">
	<div class="row">
		<div class="share pull-right">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://lab.montera34.com/blacktodefuture" data-text="¿Qué estaban gastando justo hace 10 años los de las tarjetas black?" data-via="montera34" data-lang="es">Twittear</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		</div>
	</div>
	<div class="row">
		<img src="img/banner-header-black-to-the-future-c.jpg" class="img-responsive" alt="Responsive image">
		<div class="col-md-4 col-md-offset-4">
			<p class="clear">Sigue en Twitter los gastos en riguroso diferido:</p>
			<a class="btn btn-dark btn-lg btn-block" href="https://twitter.com/BlacktodeFuture">@BlacktodeFuture</a>
		</div>
	</div>
	<div class="row">
		<div class="text-center">
			<?php if ( $then == date('Y-m-d',strtotime('10 years ago')) ) {
						echo '<h1>¿En qu&eacute; se gastaban las Tarjetas black hoy justo hace 10 años?</h1>';
					} else {
						echo '<h1>As&iacute; se gastaban las Tarjetas black</h1>';
					} ?>
			<h2><?php echo $diasemana . ', '. date('d', strtotime($then)) . ' de '. $mes .' '. date('Y', strtotime($then)); ?>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
			<?php if ( $then == date('Y-m-d',strtotime('10 years ago')) ) {
						echo 'Tal día como hoy hace 10 años era ';
					} else {
						echo 'Era un ';
					} 
			echo $diasemana. ' ' .  date('d', strtotime($then)) . ' de '. $mes .' de '. date('Y', strtotime($then)); ?> y ...</div>
			<div class="panel-body">

<?php
	if ( is_array($events) ) {
		foreach ( $events as $e ) {
			$total = $total + $e['importe'];
			echo '<p class="linea">a las <span class="mononumber"> '.$e['hora']. '</span> <span class="persona"><strong>'.$e['quien'].'</strong></span>';
			//Checks if operation is extracting money or paying
			if ( $e['operacion'] == "DISPOSICION EFECTIVO OFICINA" || $e['operacion'] == "REINTEGRO EN CAJERO PROPIO" || $e['operacion'] == "REINTEGRO EN CAJERO AJENO NACIONAL" ) {
			echo ' sacaba ';
			} else {
				echo ' gastaba ';
			} 
			echo '<span class="label label-default dinero">'.$e['importe'].'€</span> con su tarjeta black en <span class="lugar">';
			//checks in which comerce 
			if ( $e['comercio'] == 'NA') {
				if ( $e['operacion'] == 'REINTEGRO EN CAJERO PROPIO') {
					echo 'un cajero';
				} else {
					echo $e['actividad'];
				}
			} else {
				echo $e['comercio'];
			} 
			echo '</span> <span class="detail">('.$e['operacion'].' en '.$e['actividad'].')</span>.</p>'; //quito la fecha: '.$e['date']. 
		}		

	} else { echo '¡Nadie utilizó las tarjetas black!' ; }

} else {
	echo "<h2>Error</h2>
		<p>File with contents not found or not accesible.</p>
		<p>Check the path: " .$csv_filename. ". Maybe it has to be absolute...</p>";
} // end if file exist and is readable
	echo '<hr><p class="linea">Un total de <span class="label label-default dinero">' . $total . '€</span> ese día.</p>';
?>
			</div>
		</div>
	</div>
	<div class="row clear	">
			<span class="pull-right">@blacktodefuture</span>
	</div>
	<div class="row clear">
		<div class="col-md-8">
			<p>Si quieres saber m&aacute;s de estos gastos puedes consultarlos <a href="http://numeroteca.org/tarjetasblack/">gr&aacute;ficamente en esta visualizaci&oacute;n interactiva en numeroteca.org</a> (ojo, son muchos datos y tarda en cargar).</p>
			<p>Para saber m&aacute;s sobre el caso de las tarjetas black y las preferents de Caja de Madrid-Bankia visita <a href="https://15mparato.wordpress.com/">15MpaRato</a>.
			</p>
			<h3>Datos</h3>
			<p>Originalmente fueron elaborados por Bankia y enviados a la Fiscal&iacute;a Anticorrrupci&oacute;n. Posteriormente fueron publicados por varios medios de comunicaci&oacute;n.<br>
			Nosotros los hemos descargado de <a href="http://elpais.com/especiales/2014/tarjetas-opacas-caja-madrid/">El Pa&iacute;s</a> y los hemos recopilado en <a href="https://github.com/numeroteca/tarjetasblack/blob/master/data/data.tsv">un &uacute;nico documento descargable</a> en formato .tsv. Adem&aacute;s, <a href="https://15mparato.wordpress.com/repositorio-legal-caso-bankia/">15mparato</a> los tiene disponibles para su descarga en varios documentos en formato .xlsx.</p>
			<h3>Sobre el proyecto</h3>
			<p>Este un experimento de <a href="https://montera34.com">montera34.com</a> desarrollado por <a href="https://twitter.com/skotperez">@skotperez</a> y <a href="https://twitter.com/numeroteca">@numeroteca</a>.<br>Aportaron ideas <a href="https://twitter.com/guillelamb">@guillelamb</a>, <a href="https://twitter.com/jorgelamb">@jorgelamb</a> y <a href="https://twitter.com/martgnz">@marting</a>.</p>
			<h4>Para saber m&aacute;s</h4>
			<p>
				<ul>
					<li>Proceso de creación de @blacktodefuture: <a href="http://numeroteca.org/2017/01/22/un-experimento-de-small-data-black-to-de-future">Un experimento de small data: black to de future</a> en numeroteca.org</li>
					<li>Cómo se desarrolló técnicamente: <a href="https://voragine.net/visualizacion-de-datos/black-to-de-future">Black to de Future, el making-of</a> en voragine.net</li>
				</ul>
			</p>
			<h4>C&oacute;digo</h4>
			<p>El c&oacute;digo de los proyecto est&aacute; disponible en:
				<ul>
					<li><a href="https://github.com/montera34/blacktodefuture/">P&aacute;gina web (github.com)</a></li>
					<li><a href="https://github.com/montera34/blacktodefuture.bot">Bot de Twitter (github.com)</a></li>
				</ul>
			</p>
		</div>
	</div>
	<div class="row clear">
		<div><a class="btn btn-dark pull-right" href="https://github.com/montera34/blacktodefuture">Colabora / Usa el c&oacute;digo <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
		</div>
	</div>
</div>
<?php
//Include stats javascript
include_once("stats.php");
?>
</body>
