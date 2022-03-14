<?php
include('connect.php');
$id = $_POST['id'];
// 得到要清楚的id
// var_dump($id);
// exit;
$sql = "DELETE FROM article WHERE id = $id";
if($db->query($sql) === false) {
    echo 'sql语法错误';
    exit;
} else {
    // echo '删除成功';
    echo "<script>location.href = 'behind_del.php'</script>";
};
?>