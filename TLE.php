<?php
  //$host        = "host = 127.0.0.1";
  //$port        = "port = 5432";
  //$dbname      = "dbname = tracksat";
  //$credentials = "user = postgres password=postgres";

  //$db = pg_connect("$host $port $dbname $credentials");
  $db = pg_connect(getenv("DATABASE_URL"));
  
  if ($db) {
	  $satno = $_POST["satno"];
          $query_string = "SELECT SATELLITE_NAME, RAW_TLE FROM public.Sat_Info WHERE SATELLITE_NUMBER = ".$satno;
	  $results = pg_query($db, $query_string);
	  $rows = array();
	  while ($row = pg_fetch_row($results)) {
	    $rows[] = $row;
	  }
	  if (empty($rows)) {
		  echo json_encode("No record found");
	  } else echo json_encode($rows);
  }
?>
