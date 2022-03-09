<?php
include('connect.php');
$page = $_GET["page"]??1;
$sql = "SELECT COUNT(*) FROM massage";
$totalresult = mysqli_query($db, $sql);
$total = mysqli_fetch_row($totalresult)[0];
// var_dump($total);
// die();
$num = 10;
$totalpage = ceil($total/$num);
// var_dump($totalpage);
// die();
if($page > $totalpage) {
    $page = $totalpage;
};
if($page < 1) {
    $page = 1;
};
$start = ($page - 1) * 10;
// var_dump($start);
// die();
$sech = "SELECT * FROM massage ORDER BY id DESC LIMIT $start, 10";
if( $db->query($sech) === false) {
    echo 'sql查询语句错误';
    exit;
}

$mysqli_result = $db->query($sech);
$rows = [];
while( $row = $mysqli_result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
};


// 设置时区
date_default_timezone_set("Asia/Shanghai");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言删除</title>
    <style>
        .main {
            width: 1250px;
            margin: 100px auto;
        }
        .gbook {
            position: relative;
            width: 500px;
            /* height: 250px; */
            border: 2px solid black;
            margin: 0 auto;
            margin-top: 60px;
        }
        .gbook form {
            position: absolute;
            bottom: 5px;
            right: 10px;
        }
        button {
            width: 70px;
            height: 70px;
        }
        h4 {
            padding-left: 10px
            
        }
        p {
            padding-left: 15px;
        }
        h6 {
            padding-left: 5px;
        }
        .footer {
            height: 40px;
            margin: 30px auto;
        }
        .footer ul li {
            list-style: none;
            float: left;
            margin-left: 85px;
        }
        .floor ul li a {
            color: #d7dae0;
        }
    </style>
</head>
<body>
    <a class="zou" href="behind.html">返回</a>
    <?php
    foreach($rows as $value) { 
    ?>
    <div class="main">
        <div class="gbook">
            <h4><?php echo $value['username'] ?></h4>
            <p><?php echo $value['content'] ?></p>
            <h6><?php echo date("Y-m-d H:i", $value['intime']);?></h6>
            <form action="gbook_delsave.php" method="post" >
                <button type="submit" name="del" value="<?php echo $value['id'] ?>">清除</button>
            </form>
        </div>
    </div>
    <?php
    };
    ?>
    <div class="footer">
        <ul style="background-color: pink;">
            <li style="margin-left:520px"><a href='?page1'>首页</a></li>
            <li><a href='?page=<?php echo $page - 1;?>'>上一页</a></li>  <!-- ?page1 在网址末端加上这个不就跳到相应页数了 -->
            <li><a href='?page=<?php echo $page + 1;?>'>下一页</a></li>
            <li><a href='?page=<?php echo $totalpage;?>'>尾页</a></li>
        </ul>
    </div>
</body>
</html>