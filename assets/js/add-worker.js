var pass_view = document.getElementById("pass-view");
var input_pass = document.getElementById("password");
var pass_view2 = document.getElementById("pass-view2");
var input_pass2 = document.getElementById("password2");




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

pass_view2.addEventListener("click",function(){

    if(input_pass2.type == "text" )
    {
            input_pass2.type ="password";
            pass_view2.classList.remove("bi-eye-slash-fill")
            pass_view2.classList.add("bi-eye-fill");
            

    }
    else
    {
        input_pass2.type ="text";
        pass_view2.classList.remove("bi-eye-fill")
        pass_view2.classList.add("bi-eye-slash-fill");
    }
    input_pass2.focus();
})
