<?php
$con=mysqli_connect("localhost","root","","db_bandara");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

// Data for Sugar
$query = mysqli_query($con,"SELECT COUNT(*) as sugar FROM tb_dokumen_baru");
$rows = array();
$rows['name'] = 'Sugar';
while($tmp= mysqli_fetch_array($query)) {
    $rows['data'][] = $tmp['sugar'];
}

// Data for Rice
$query = mysqli_query($con,"SELECT COUNT(*) as rice FROM catatan_mutu");
$rows1 = array();
$rows1['name'] = 'Rice';
while($tmp = mysqli_fetch_array($query)) {
    $rows1['data'][] = $tmp['rice'];
}

// Data for Wheat Flour
$query = mysqli_query($con,"SELECT COUNT(*) as wheat_flour FROM tb_peraturan");
$rows2 = array();
$rows2['name'] = 'Wheat Flour';
while($tmp = mysqli_fetch_array($query)) {
    $rows2['data'][] = $tmp['wheat_flour'];
}

$result = array();
array_push($result,$rows);
array_push($result,$rows1);
array_push($result,$rows2);

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
?> 