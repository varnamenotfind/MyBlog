<?php
// 连接数据库
$dbhost ='127.0.0.1';  // 地址
$dbuser = 'root';  // 用户名
$dbpwd = '';  // 密码
$dbname = 'myblog';  // 数据库名字
$db = new mysqli( $dbhost, $dbuser, $dbpwd, $dbname );  // 连接 
// 判断是是否连接成功
if($db->connect_errno <> 0) {
    die("连接失败");
};

// 设置编码，防止中文乱码
$db->query("SET NAMES UTF8");
?>