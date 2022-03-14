<?php
include('connect.php');
$id = $_POST['del'];
// 得到要清楚的id
// var_dump($id);
$sql = "DELETE FROM massage WHERE id = $id";
if($db->query($sql) === false) {
    echo 'sql语法错误';
    exit;
} else {
    // echo '删除成功';
    echo "<script>location.href = 'gbook_del.php'</script>";
};
?>