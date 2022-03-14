<?php
include("connect.php");
$value = $_POST['search'];
// var_dump("$value");
// exit;
$sql = "SELECT * FROM article WHERE content LIKE '%$value%' OR title LIKE '%$value%' ORDER BY id DESC";
$mysqli_result = $db->query($sql);
$rows = [];
while($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
};
// var_dump($rows);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章修改</title>
    <style>
        div {
            width: 900px;
            margin: 50px auto;
            text-align: center;
            border: 1px solid black;
        }
        textarea {
            display:block;
            margin:auto;
        }
    </style>
</head>
<body>
    <form action="behind_search_result.php" method="POST" style=" margin-top: 50px;width: 100%;text-align: center;">
        <input type="text" value='' name='search'><button type='submit'>搜索</button>
    </form>
    <div>啥都不写直接搜索就是全部文章</div>
    <a class="zou" href="behind.html">返回</a>
    <?php foreach($rows as $row){ ?>
    <div>
        <form action="behind_update_save.php" method="POST">
            <h3>文章题目</h3>
            <input type="text" name='title'  value='<?php echo $row['title']; ?>'>
            <h4>文章内容</h4>
            <textarea name="content" id="" cols="30" rows="10"><?php echo $row['content']; ?></textarea>
            <!-- 可以给button的value附上值让他等于id -->
            <button  style="width: 65px;height: 50px;" type='submit' value="<?php echo $row['id'];?>"name='id'>提交</button>
        </form>
    </div>
    <?php } ?>
</body>
</html>