<?php
/**
 * 在PHP中一定不要忘了代码后边加上;!!!!不然你都不知道怎么错的
 * 还有CSDN_YYDS
*/
// 连接数据库
include('connect.php');

$content = $_POST['content'];
$msg_user = $_POST['msg_user'];
// var_dump($massage, $msg_user);
if($content == '' || $content == '有事没事说两句...') {
    die('说句话吧，求求你了~');
};
if($msg_user == '' || $msg_user == 'You Name...') {
    die('留下你的尊姓大名吧！！！');
};
$time = time();
$int = "INSERT INTO massage (username, content, intime) VALUES ('{$msg_user}', '{$content}', '{$time}')";
// 判断sql语句是否正确
// if($db->query($int) === false) {
//     echo 'sql增错误';
//     exit;
// };
$db->query($int);
//页面跳转
header('location: gbook.php');
?>