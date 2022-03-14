<?php
// 一个表单对应一个php文件.
include('connect.php');
if($db->connect_errno <> 0) {
    die("连接失败");
} 
// 为啥不可以变量名字为$sql,是的话就会报错.

$search = "SELECT * FROM users ORDER BY id DESC";
if($db->query($search) === false) {
    echo 'sql语句错误';
    exit;
} 
$mysqli_result = $db->query($search);
// var_dump($mysqli_result); 
$rows =[];  // 得到每一条数据.
// $row = $mysqli_result->fetch_array( MYSQLI_ASSOC );
while( $row = $mysqli_result->fetch_array(MYSQLI_ASSOC) ) {
    $rows[] = $row;
    // var_dump($row);
};
    // var_dump($rows);

// 得到登录得到的数据.
$email = $_POST['email'];
$password = $_POST['password'];
// var_dump($email);
// var_dump($password);
// 管理员登录

// var_dump();
// $administrator = 'SELECT * FROM users WHERE mail='STUD@gmail.com' AND `psd`='12345678' ORDER BY id DESC';
// emm && 在if里边竟然没法用!!!!
if($email == 'STUD@gmail.com') {
    if($password == 12345678) {
        header('location: behind.html');
    }
};
// 普通游客登录
foreach($rows as $value) {
    if($email == $value['email'] ) {
        if($password == $value['psd']) {
            // 制作COOKIE登录
            // 在设置cookie登录时无法看见值
            setcookie('islogin',true,time()+3600, '/');
            setcookie('user_email', $_POST['email'],time()+3100,'/');
            header('location: home.php');
            die();           
        } else {
            echo "<h1> 密码错误</h1>";
            die();
        };
        exit;
    };
};
echo "<h1>当前邮箱不存在 </h1>";


// CSDN YYDS!!!
// 发送头之前不能有不论什么输出，空格也不行,你须要将header(...)之前的空格去掉,
// 或者其它输出的东西去掉，假设他上面include其它文件了，你还要检查其它文件中是否有输出。
?>