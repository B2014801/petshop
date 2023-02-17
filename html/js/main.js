function quantitychange(){
    let amountElement = document.getElementById('amount');
    let amount = amountElement.value;

    document.getElementById('btn-plus').addEventListener("click", function(){
        amount++; 
        amountElement.value=amount;
    })

    document.getElementById('btn-minus').addEventListener("click", function(){
        if(amount >1){
            amount--;
            amountElement.value=amount;
        }
    })

    amountElement.addEventListener("input", function(){
        amount = amountElement.value;
    })
}
quantitychange();