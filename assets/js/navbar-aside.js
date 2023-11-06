var burger_button = document.getElementById("burger-button");
var aside_menu = document.getElementById("aside-menu");
var aside_overlay = document.getElementById("aside-overlay");
var aside_menu_state = false;
var aside_dropdown = document.getElementsByClassName("aside-dropdown-container");
var aside_dropdown_content = document.getElementsByClassName("aside-dropdown-content");
burger_button.addEventListener("click",function() {

console.log("click");

aside_menu.style.visibility = "visible";
aside_overlay.style.visibility = "visible";
aside_menu_state = true;

})


// When the user clicks anywhere outside of the modal, close it
aside_overlay.onclick = function(event) {
    if (event.target == aside_overlay) {
        aside_menu.style.visibility = "hidden";
        aside_overlay.style.visibility = "hidden";
        aside_menu_state = false;
    }
  }

// When the window is resized change the state of the aside and overlay
window.addEventListener("resize",function(){

    if(this.window.screen.width >768)
    {
        aside_menu.style.visibility = "visible";
        aside_overlay.style.visibility = "hidden";
    }else{
        aside_menu.style.visibility = "hidden";
        aside_overlay.style.visibility = "hidden";
    }
})

// Dropdown menu of the aside menu


// add event listerner to all the dropdown
for (let index = 0; index < aside_dropdown.length; index++) {
    aside_dropdown[index].addEventListener("click",function(){

        // if display is flex get it to none otherwise change it to none
        if (aside_dropdown_content[index].style.display == "flex") {
           aside_dropdown_content[index].style.display = "none"; 
        }else
        {
            // change the all the other display to none for all the dropwdown content
            for (let index2 = 0; index2 < aside_dropdown.length; index2++) {
                if (index2 == index)
                {
                  aside_dropdown_content[index2].style.display = "flex";   
                }
                else{
                    aside_dropdown_content[index2].style.display = "none";   
                }
               
                
            }
        }
        
    })
    
}