var pass_view = document.getElementById("pass-view");
var input_pass = document.getElementById("password");




pass_view.addEventListener("click",function(){

    if(input_pass.type == "text" )
    {
            input_pass.type ="password";
            pass_view.classList.remove("bi-eye-slash-fill")
            pass_view.classList.add("bi-eye-fill");
            

    }
    else
    {
        input_pass.type ="text";
        pass_view.classList.remove("bi-eye-fill")
        pass_view.classList.add("bi-eye-slash-fill");
    }
    input_pass.focus();
})
