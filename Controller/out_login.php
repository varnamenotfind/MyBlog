<?php
setcookie('islogin',null,time()-1,'/');
setcookie('user_email',null,time()-1,'/');
echo "<script>alert('返回首页就要重新登陆了you~'); location='./index.html'; </script>";
?>