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

	// OUTPUT
	// echo "Total gastos tarjetas black: " .$line.'<br>';

	echo "<h2>Tal día como hoy hace 10 años...</h2>";

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
