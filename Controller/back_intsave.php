<?php
include('connect.php');
$text_content = $_POST['text_content'];
$titles = $_POST['titles'];
// var_dump($titles);
$time = time();  
$int="INSERT INTO article (title, content, intime) VALUES ('{$titles}', '{$text_content}', '{$time}')";
// $db->query($int); // md!!!为什么我用sql变量储存就没法用,
// cao,用qsl这个变量名死活不可以,换一个就行!!!
if($db->query($int) == false) {
    echo('sql语法错误,提交失败');
    die();
} else {
    echo "<script>alert('提交成功');</script>";
    echo "<script>location.href = 'back_int.html'</script>";
};
?>
