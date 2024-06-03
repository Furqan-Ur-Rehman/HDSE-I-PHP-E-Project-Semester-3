function opensnavbar(){
    var sidebar = document.getElementById("mobilesidebar").style.display;
    if(sidebar == "none"){
        document.getElementById("mobilesidebar").style.display = "";
        document.getElementById("onsidebar").style.display = "";
        document.getElementById("offsidebar").style.display = "none";
        
    }
    else{
        document.getElementById("mobilesidebar").style.display = "none";
        document.getElementById("onsidebar").style.display = "none";
        document.getElementById("offsidebar").style.display = "";
    }
}
function openLoginModal(){
    var modal = document.getElementById("loginmodal");
    var background = document.getElementById("bgblur");
     
    modal.style.opacity="1";
    modal.style.display="";
    modal.style.width="auto";
    modal.style.height="auto";
    modal.style.transition="1s";
    background.style.display="";
}
function closemodal(){
   var modal = document.getElementById("loginmodal");
   var background = document.getElementById("bgblur");
    
   modal.style.opacity="0";
   modal.style.width="0px";
   modal.style.display="none";
   modal.style.height="0px";
   modal.style.transition="0s";
   background.style.display="none";

   loginform();
}
function loginform(){
    var Login = document.getElementById("LoginForm");
    var Register = document.getElementById("RegisterForm");

    Login.style.opacity="1";
    Login.style.width="auto";
    Login.style.height="auto";
    Login.style.transition="1s";

    Register.style.opacity="0";
    Register.style.width="0px";
    Register.style.height="0px";
    Register.style.zIndex="-999";
    Register.style.transition="0s";
}

function Registerform(){
    var Login = document.getElementById("LoginForm");
    var Register = document.getElementById("RegisterForm");

    Login.style.opacity="0";
    Login.style.width="0px";
    Login.style.height="0px";
    Login.style.zIndex="-999";
    Login.style.transition="0s";

    Register.style.opacity="1";
    Register.style.width="auto";
    Register.style.height="auto";
    Register.style.transition="1s";
}
function showmodal(){
    if(document.getElementById("profilemodal").style.display=="none"){
        document.getElementById("profilemodal").style.display="";
    }
    else{
        document.getElementById("profilemodal").style.display="none"; 
    }
}
function opencartbox(){
    if(document.getElementById("cartBox").style.marginRight == "-650px"){
        document.getElementById("cartBox").style.marginRight="0px";
        document.getElementById("cartBox").style.transition="1s";
        document.getElementById("cartboxbackblur").style.opacity="1";
        document.getElementById("cartboxbackblur").style.width="100%";
    }
    else{
        document.getElementById("cartBox").style.marginRight="-650px";
        document.getElementById("cartboxbackblur").style.opacity="0";
        document.getElementById("cartboxbackblur").style.width="0";
    }
 }
 function  closecartbox(){
        document.getElementById("cartBox").style.marginRight="-650px";
        document.getElementById("cartboxbackblur").style.opacity="0";
        document.getElementById("cartboxbackblur").style.width="0";
 }
 function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
  }
  
  function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;
  }

  
function openAddModal(){
    var modal = document.getElementById("AddcategoryModal");
    var background = document.getElementById("bgblur");
     
    modal.style.display="";
    background.style.display="";
}
function CloseAddModal(){
   var modal = document.getElementById("AddcategoryModal");
   var background = document.getElementById("bgblur");
    
   modal.style.display="none";
   background.style.display="none";

   loginform();
}