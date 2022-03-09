document.querySelector('.img__btn').addEventListener('click', function() {
    document.querySelector('.enter').classList.toggle('s--signup')
})
var email = document.querySelector('.email');
var psd = document.querySelector('.psd');
var usn = document.querySelector('.username')
// submit.addEventListener('mousedown', function() {
//     console.log("ok")
//     if(email.value == '' || psd.value == '') {
//         alert('邮箱或密码不可为空');
//     }
// }
// )
// 做个判断
// function myFunction() {
//     if(email.value == '' || psd.value == '') {
//         alert('邮箱或密码不可为空');
//         location.href = 'login.html';
//     };
// };
// function myScript() {
//     if(email.value == '' || psd.value == '' || usn.value) {
//         alert('用户名或邮箱或密码不可为空');
//         location.href = 'login.html';
//     };
// };