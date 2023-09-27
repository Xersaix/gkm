var choice1 = document.getElementById("choice1");
var choice2 = document.getElementById("choice2");
var number = document.getElementById("number");
var result = document.getElementById('result');
var count = document.getElementById("count");


var plus_or_minus = "+";
var event = new Event('change');

// Dispatch it.


choice1.addEventListener("click",function(){
    if(choice2.checked == false)
    {
        plus_or_minus = "+";
        number.dispatchEvent(event);
    }

})


choice2.addEventListener("click",function(){
    if(choice1.checked == false)
    {
        plus_or_minus = "-"; 
        number.dispatchEvent(event);
    }

})

number.addEventListener("change",function(){

    if(plus_or_minus == "+")
    {
       var show_result = +count.innerHTML + +number.value;
    }else
    {
        var show_result = +count.innerHTML - +number.value;
    }
    result.innerHTML =  `${+count.innerHTML} ${plus_or_minus} ${number.value} = ${show_result}`;
})
