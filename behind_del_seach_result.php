<?php

include('connect.php');
$value = $_POST['search'];
// var_dump("$value");
// exit;
$sql = "SELECT * FROM article WHERE content LIKE '%$value%' OR title LIKE '%$value%' ORDER BY id DESC";
$mysqli_result = $db->query($sql);
$rows = [];
while($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
};
date_default_timezone_set("Asia/Shanghai");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章删除</title>
    <style>
        .main {
            position: relative;
            width: 800px;
            margin: 50px auto;
            border: 1px solid #860c0c;
            text-align: center;
        }
        .haha {
            width: 70px;
            height: 60px;
        }
        span {
            display:block;
            position:absolute;
            top:10px;
            right:10px;
        }
        .qw {
            width: 900px;
            margin: 50px auto;
            text-align: center;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="behind_del_seach_result.php" method="POST" style=" margin-top: 50px;width: 100%;text-align: center;">
        <input type="text" value='' name='search'><button type='submit'>搜索</button>
    </form>
    <div class='qw'>啥都不写直接搜索就是全部文章</div>
    <a class="zou" href="behind.html">返回</a>
    <?php foreach($rows as $value){ ?>
    <div class="main">
        <form action="behind_del_save.php" method="post">
            <h2><?php echo $value['title'] ?></h2>
            <p><?php echo $value['content'] ?></p>
            <span><?php echo date("Y-m-d H:i", $value['intime']);?></span>
            <button class='haha' type="submit" value= '<?php echo $value['id'] ?>' name='id'>删除</button>
        </form>
    </div>
    <?php }; ?>
</body>
</html>