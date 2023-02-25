function ShowPassword(input){
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}