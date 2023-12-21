<?php
// Your database connection code here

$name = $_GET['name'];
$generation = $_GET['generation'];
$type = $_GET['type'];

$sql = "SELECT * FROM pokemon WHERE
        name LIKE '%$name%'
        AND generation LIKE '%$generation%'
        AND type LIKE '%$type'";
// Execute the query and include the display_results.php
?>
