<?php
  $host        = "host = 127.0.0.1";
  $port        = "port = 5432";
  $dbname      = "dbname = postgres";
  $credentials = "user = postgres password=postgres";

  $db = pg_connect( "$host $port $dbname $credentials"  );
  // $db = new SQLite3('Sat_Repo.db');
  $satno = $_POST["satno"];
  $query_string = "SELECT RAW_TLE FROM Sat_Info WHERE SATELLITE_NUMBER = ".$satno;
  $results = $db->query($query_string);
  $rows = array();
  while ($row = $results->fetchArray()) {
    $rows[] = $row[0];
  }
  if (empty($rows)) {
	  echo json_encode("No record found");
  } else {
		echo json_encode($rows);
  }
?>
