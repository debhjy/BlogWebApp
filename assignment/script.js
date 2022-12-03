


window.onload=function(){
    let signupbutton=document.querySelector('.gosignup');
    let   loginbutton=document.querySelector('.gologin');
    let loginblock=document.querySelector(".loginblock");
     let  signupblock=document.querySelector(".registerblock");
  
       signupbutton.addEventListener("click", function () {
        
          signupblock.classList.toggle("visible");
          signupblock.classList.toggle("hidden");
          loginblock.classList.toggle("visible");
          loginblock.classList.toggle("hidden");


         
       });

       loginbutton.addEventListener("click", function () {
        signupblock.classList.toggle("visible");
        signupblock.classList.toggle("hidden");
        loginblock.classList.toggle("visible");
        loginblock.classList.toggle("hidden");


    });



  }



