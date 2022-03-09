<?php
include('connect.php');
$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST["id"];
// var_dump($title, $content,$id);
// exit;
// 虽然得到的是字符串类型,但是你还是得加'';
$sql = "UPDATE article SET content='$content', title='$title' WHERE id=$id";
// 执行改的语句和其他的不一样,不可用query了
if ($db->query($sql) === TRUE) {
    echo "<script> alert('修改成功'); location='./behind_update.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
};
?>
