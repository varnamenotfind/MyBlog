<?php
include('connect.php');
// 接收数据
$username = $_POST['username'];
$email = $_POST['email'];
$psd = $_POST['psd'];

// 判断用户名或邮箱是否存在
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
foreach($rows as $value) {
    if($username == $value['username']) {
        echo '<h1>当前用户名存在</h1>';
        die();
    } else {
        if($email == $value['email']) {
            echo '<h1>当前邮箱存在</h1>';
            die();
        } else {
            if($psd == '') {
                echo '<h1>密码不可为空</h1>';
                die();
            } else {
                // 把注册的用户导入数据库.
                // var_dump($username, $email, $psd);
                $spl = "INSERT INTO users (username, email, psd) VALUES ('{$username}', '{$email}', '{$psd}')";
                $db->query($spl);
                header('location: login.html');
                die();
            };
        };
    };
};
?>