<?php
include('connect.php');
$sql = "SELECT * FROM article ORDER BY id DESC";
if($db->query($sql) == false) {
    echo 'sql语法错误';
};
$mysqli_result = $db->query($sql);
$rows = [];
while($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
};
var_dump($rows);
?>