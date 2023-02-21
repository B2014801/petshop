let scroll_button = document.getElementById("btn-back-to-top");
// When the user scrolls down 20px from the top of the document, show the button
function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    scroll_button.style.display = "block";
  } else {
    scroll_button.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
scroll_button.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
  }
window.onscroll = function () {
    scrollFunction();
};
// dang ky 
pass=document.querySelector('#password-input');
hoten=document.querySelector('#hoten');
function checkdk(){
    if(hoten.value==""){
        alert('Họ tên không được bỏ trống ');
        return false;
        }
    if(pass.value==""){
        alert('Mật khẩu không được bỏ trống ')
        return false
        }
    if(pass.value.length<6){
        alert('Mật khẩu tối thiểu 6 ký tự')
        return false
    }

    else{
        let flag1=0,flag2=0;//kiem tra ky tu: flag1 so,flag2 là ky tu
        for(let i=0;i<pass.value.length;i++){
        if(isFinite(pass.value[i])==true){// kiem tra co phai la so huu han hay khong
            flag1=1;}// danh dau co mot ky tu la so
        else{
            flag2=1;
        }
        }
        if(flag1==0||flag2==0){
            alert('Mật khẩu phải có các ký tự và chữ số');
            return false
        }
        else
            alert('thành công')
    }

    }
    function ShowPassword(){
    if (pass.type === "password") {
        pass.type = "text";
    } else{
        pass.type = "password";
    }
}
function quantitychange(){
    let amountElement = document.getElementById('amount');
    let amount = amountElement.value;
    amountElement.addEventListener("input", function(){
        amount = amountElement.value;
    })
    document.getElementById('plus-sp').addEventListener("click", function(){
        amount++; 
        amountElement.value=amount;
    })

    document.getElementById('minus-sp').addEventListener("click", function(){
        if(amount >1){
            amount--;
            amountElement.value=amount;
        }
    })

    
}
quantitychange();