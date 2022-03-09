<?php
include('connect.php');
// var_dump($_COOKIE['user_email']); // 当前用户的email
// exit;
if(isset($_COOKIE['islogin']) && $_COOKIE['islogin']==true) {
  echo ( "<script> alert('欢迎你的到来~');</script>");
} else {
  echo ("<script> alert('请先登陆一下~'); location='./login.html'</script>");
}
$sech = "SELECT * FROM article ORDER BY id DESC";
if( $db->query($sech) === false) {
    echo 'sql查询语句错误';
    exit;
};
$mysqli_result = $db->query($sech);
$rows = [];
while( $row = $mysqli_result->fetch_array(MYSQLI_ASSOC)) {
    $rows[] = $row;
};
// var_dump($rows);
// exit;
// 得到全部用户
$mysqli_result1 = $db->query("SELECT * FROM users ORDER BY id DESC");
while( $row1 = $mysqli_result1->fetch_array(MYSQLI_ASSOC)) {
    $row1s[] = $row1;
};
// var_dump($row1s);
// exit;
// 查询当前用户的用户名
// 回头卡呢一下,其实可以给提交按钮当前的id值,只要在form表单中的value都可以提交.
foreach($row1s as $values ) {
  if($values['email'] == $_COOKIE['user_email'] ) {
    $username = $values['username'];
  };
};
// var_dump($username); // $username存储的就是当前用慕名
// 设置时区
date_default_timezone_set("Asia/Shanghai"); // CSND上的解决方法 CSDN YYDS!!!
// 是设置time()函数的时区，因为time()函数返回的时间戳是会受到时区限制的，默认是0时区。
// 如果不进行任何修改的话，输出的time()对于我们来说会相差8个小时。


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
          position: relative;
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
        .time {
          position: absolute;
          bottom:8px;
          right:8px
        }
    </style>
</head>
<body>
    <div class="float">
      <img src="img/t.jpg" alt="">
      <h3><?php echo $username ?></h3>
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
      <?php foreach($rows as $value) {
        
      ?>
      <div class="article">
        <h2 class="left"> <a href="javascript:;"><?php echo $value["title"]?></a></h2>
        <div class="right">
          <p><?php echo $value["content"]?></p>
        </div>
        <div class="time"><?php echo date("Y-m-d H:i", $value['intime']);?></div>
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