<?php
  $db = new SQLite3('Sat_Repo.db');
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
