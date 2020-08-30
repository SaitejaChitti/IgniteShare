<?php
require_once "pdo.php";
if(isset($_SESSION['name'])){
$sqlEvents=$pdo->query("SELECT * FROM images WHERE name ='{$_SESSION['name']}'");
$calendar = array();
if( $rows = $sqlEvents->fetchAll(PDO::FETCH_ASSOC) ) {
	// convert  date to milliseconds
	foreach($rows as $row)
 {
	$start = strtotime($row['uploaded_on']) * 1000;
	$end = strtotime($row['uploaded_on']) * 1000;
	$calendar[] = array(
        'id' =>$row['post_id'],
        'title' => $row['message'],
        'url' => "../posts.php?Filter=YTP",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
	"success" => 1,
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
}
}
?>
