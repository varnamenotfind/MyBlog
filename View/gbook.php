<?php
include('connect.php');



if(isset($_COOKIE['islogin']) && $_COOKIE['islogin']==true) {
} else {
  echo ("<script> alert('留言板不对外人开放~'); location='./login.html'</script>");
}



$mysqli_result1 = $db->query("SELECT * FROM users ORDER BY id DESC");
while( $row1 = $mysqli_result1->fetch_array(MYSQLI_ASSOC)) {
    $row1s[] = $row1;
};
// var_dump($row1s);
// exit;
// 查询当前用户的用户名
foreach($row1s as $values ) {
  if($values['email'] == $_COOKIE['user_email'] ) {
    $username = $values['username'];
  };
};



// $page 就是拿到的当前的页数.
$page = $_GET["page"]??1;
$sql = "SELECT COUNT(*) FROM massage";
$totalresult = mysqli_query($db, $sql);
// 得到一共几条
$total = mysqli_fetch_row($totalresult)[0];
// var_dump($total);
// die();
// 每一页显示多少条数据
$num = 10;
// 得到一共几页
$totalpage = ceil($total/$num);
// var_dump($totalpage);
// die();
// 要做个判断,不可为负且不可大于totalpage;
if($page > $totalpage) {
    $page = $totalpage;
};
if($page < 1) {
    $page = 1;
};
// 得到每一页显示对应数据
$start = ($page - 1) * 10;
// var_dump($start);
// die();


$sech = "SELECT * FROM massage ORDER BY id DESC LIMIT $start, 10";
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
// 设置时区
date_default_timezone_set("Asia/Shanghai");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
        background: #f2f2f2;
        background-image: url(img/mass/wallhaven-3zgz2y.png);
        }
        .message-board{
        margin: 0 0 0 25%
        }
        .profile{
        background-image: center;
        background-position: fixed;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        margin: 2% 2% 3% 2%;
        z-index:2;
        position: relative;
        }
        .load-more{
        background: #363636;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        z-index:2;
        position:relative;
        margin: 2% 2% 0 4.95%;
        }
        .indicator{
        display:inline-block;
        margin: 0 0 0 50px;
        font-family:helvetica;
        font-size: 14px;
        width:100px;
        }
        .line{
        border-left: 1px solid grey;
        z-index:1;
        height: 650px;
        margin-top: 3.2%;
        margin-left: 4.5%;
        position: fixed;
        }
        .comment-box{
        height: 110px;
        width: 600px;
        background: white;
        margin: 5% 0 0 95px;
        display: inline-block;
        border-radius: 2%;
        box-shadow: 2px 2px 10px #e3e3e3;
        }
        textarea {
            resize:none;
            width: 595px;
            height: 80px;
            color: #6d757a;

        }
        .content {
            width: 600px;
            margin: 0 470px;
            margin-top: 133px;
        }
        .go {
            float: right;
            width: 80px;
            height: 36px;
        }
        .user {
            font-size: 13px;
            font-weight: 700;
            color: #6d757a;
            margin-top: 10px;
            margin-left: 5px; 
        }
        .time {
            float: right; 
            margin-right: 10px;
            margin-top: 10px;
            color: #6d757a;
            font-size: 12px;
        }
        .img {
            border-radius: 20px;
            width: 605px;
            height: 385px;
            margin: 105px 465px;
            overflow: hidden;
        }
        .img img {
            width: 100%;
            height: 100%;
        }
        h4 {
            padding-top: 50px;
            text-align: center;
            font-size: 24px;
            color: whitesmoke;
        }
        a {
            text-decoration: none;
            color: white;
        }
        a:hover {
            color: wheat;
        }
        .home {
            position: fixed;
            bottom: 100px;
            right: 25px;
            width: 55px;
            height: 55px;
            background-color: white;
            text-align: center;
            line-height: 55px; 
            overflow: hidden;
            border-radius: 5px;
        }
        .home a {
            display: block;
            width: 100%;
            height: 100%;
            color: black;
            font-size: 12px;
        }
        .home a:hover {
            background-color: orange;
            color: #f2f2f2;
        }
        .content form input:first-of-type{
            height: 30px;
            /* color: #6d757a; */
            font-size: 12px;
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
    <div class="home">
        <a href="home.php">返回主页</a>
    </div>
    <h4>天梦の留言板</h4>
    <div class="img">
        <img src="img/mass/QQ图片20220213133447.jpg" alt="">
    </div>
    <div class="content">
        <form action="formsave.php" method="post">
            <textarea maxlength="250" name="content" cols="30" rows="10" class="text" >有事没事说两句...</textarea>
            <input name="msg_user" type="text" style="width: 90px;" maxlength="15" value="<?php echo $username ?>" id="username">
            <input type="submit" class="go" value="发送">
        </form>
    </div>
    <div class="message-board">
        <?php
        // 有多少数据循环多少条
        foreach($rows as $row) {
            // var_dump($row);
        ?>
        <div>
            <div class="comment-box">
                <div class="user"><?php echo $row['username'];?></div>
                <p style="margin-left: 5px;"><?php echo $row['content'];?></p>
                <div class="time"><?php echo date("Y-m-d H:i", $row['intime']);?></div>
            </div>
        </div>
        <?php
        };
        ?>
    </div>
    <div class="footer">
        <ul style="background-color: pink;">
            <li style="margin-left:520px"><a href='?page1'>首页</a></li>
            <li><a href='?page=<?php echo $page - 1;?>'>上一页</a></li>  <!-- ?page1 在网址末端加上这个不就跳到相应页数了 -->
            <li><a href='?page=<?php echo $page + 1;?>'>下一页</a></li>
            <li><a href='?page=<?php echo $totalpage;?>'>尾页</a></li>
        </ul>
    </div>
</body>
<script>
    var text = document.querySelector('textarea');
    text.addEventListener('focus', function() {
        this.innerHTML = '';
        this.style.color = 'black';
    });
    text.addEventListener('blur', function() {
        if(this.innerHTML == '') {
            this.innerHTML = '有事没事说两句...'
            this.style.color = '#6d757a';            
        }
    });
    var username = document.querySelector('#username');
    username.addEventListener('focus', function() {
        // console.log('okok')
        this.value = '';
        this.style.color = 'black';
    });
    username.addEventListener('blur', function() {
        if(this.value == '') {
            this.value = '<?php echo $username ?>';
            // this.style.color = '#6d757a';            
        }
    });
    // var go = document.querySelector('#gogo');
    // go.onclick = function() {
    //     username.value = <?php $username ?>;
    // };
    
    // username.disabled = "disabled";
    // var sub = document.querySelector('.go');
    // sub.addEventListener('click', function() {
    //     if(text.innerHTML == '' || text.innerHTML == '你想留下什么？') {
    //         alert('说句话吧，求求你了~')
    //     } else {
    //         if(username.value == '' || username.value == '你叫啥？') {
    //             alert('留下你的尊姓大名吧！！！');
    //         }            
    //     }
    // });
</script>
</html>