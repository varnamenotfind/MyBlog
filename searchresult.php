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
// var_dump($rows);

//搜索结果加高亮
// str_replace("world","Peter","Hello world!");
// 设置时区
date_default_timezone_set("Asia/Shanghai");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>天梦の小窝</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <style>
      @font-face {
        font-family: font2;
        src: url(fonts/FZSJ-XIAOHBZLL.TTF);
      }
      @font-face {
        font-family: font3;
        src: url(fonts/FZYouMaoZaiJ.TTF);
      }
      .nav {
        background-color: rgba(255,255,255,0.65 );
      }
      .nav a {
        font-size: 20px;
        transition: all 0.5s;
        font-family: font2;
      }
      .nav li:hover a {
        font-size: 25px;
      }
      body {
        background-image: url(img/wallhaven-9mee7x.jpg);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
      }
        .main {
            background-color: rgba(255, 255, 255, 0.1);
            margin: 50px auto;
            /* height: 1000px; */
            width: 800px;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 15px;
        }
        .main .article {
          display: flex;
          justify-content: space-between;
          width: 670px;
          height: 330px;
          background-color: rgba(255, 255, 255,0.8);
          border-radius: 15px;
          margin: 50px auto;
          overflow: hidden;
          box-shadow: -9px -8px 16px -7px #888888; 
          transition: all 0.3s;
        }
        .main .article:hover {
          box-shadow: 4px 5px 20px 2px #888888;
        }
        .article .left {
          width: 240px;
          /* background-color: aqua; */
          font-family: font3;
        }
        .article .left{
          /* padding: 10px; */
          font-size: 20px;
          text-align: center;
          margin:20px 0;
          line-height: 295px;
          color: #504e4e;
          border-right: 2px solid rgba(0, 0, 0, 0.2);
        }
        .article .right {
          width: 430px;
          /* background-color: blanchedalmond; */
          padding: 20px 10px;
        }
        .article .right p {
          color: #504e53;
          text-indent: 2em;
          font-size: 15px;
        }
        .float {
          position: fixed;
          width: 230px;
          height: 230px;
          /* background-color: aquamarine; */
          top: 210px;
        }
        .float img {
          display: block;
          width: 47%;
          height: 48%;
          border-radius: 50%;
          margin: 0 auto;
        }

        .float h3 {
          width: 120px;
          font-family: font3;
          font-size: 20px;
          margin: 20px auto;
          color: #01b4b9;
          text-align: center;
          /* font-size: 24px; */
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <div class="float">
      <h3><a href="home.php">返回</a></h3>
    </div>
    <div class="nav">
        <div class="logo"><a href='home.php' style="font-size:23px">天梦の小窝 <a></div>
        <ul class="in_nav">
            <li><a href="out_login.php">首页</a></li>
            <li><a href="gbook.php">留言板</a></li>
        </ul>
		<div class="search d7">
            <form name="go" action="searchresult.php" method="post">
              <input  type="text" value="" placeholder="搜搜看有啥..." name="search">
              <button type="submit">Go</button>
            </form>
		</div>
    </div>
    <div class="main">
      <?php foreach($rows as $values) {
      ?>
      <div class="article">
        <h2 class="left"> <a href="javascript:;"><?php echo str_replace($value,"<font color='red';>$value</font>",$values['title']); ?></a></h2>
        <div class="right">
          <p><?php echo str_replace($value,"<font color='red';>$value</font>",$values['content']); ?></p>
        </div>
      </div>
      <?php } ?>    
    </div>
</body>
<script>
  var img = document.querySelector('img');
  var h3 = document.querySelector('.float').querySelector('h3');
  var flat = 1;
  img.onmousemove = function() {
      this.src = 'img/x.jpg';
      h3.style.color = '#ec7398';
  }
  img.onmouseout = function() {
    this.src = 'img/t.jpg';
    h3.style.color = '#01b4b9';
  }
  
</script>
</html>