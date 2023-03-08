          let mybutton = document.getElementById("btn-back-to-top");


          window.onscroll = function () {
            scrollFunction();
          };

function scrollFunction() {
  if (
    document.body.scrollTop > 400 ||
    document.documentElement.scrollTop > 400
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
  }

// dang ky 
pass=document.querySelectorAll('.password-input');
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
    function ShowPassword(input){
    if (input.type === "password") {
      input.type = "text";
    } else{
      input.type = "password";
    }
}
// cong tru san pham
$(document).ready(function() {
  // Attach the click event to a parent element
  $(".minus-and-plus").on("click", ".minus-sp, .plus-sp", function(event) {
      event.preventDefault();
      quantity = parseInt($(this).siblings("input").val());
      if ($(this).hasClass("minus-sp")) {
          if (quantity > 1) {
              quantity--;
          }
      } else if ($(this).hasClass("plus-sp")) {
          quantity++;
      }
     
      $(this).siblings("input").val(quantity);
  });
});


