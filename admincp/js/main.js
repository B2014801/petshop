pass=document.querySelector('#password-input');
    function ShowPassword(){
    if (pass.type === "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}