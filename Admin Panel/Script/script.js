function togglesidebar(){
    if(document.getElementById("sidebar").classList == "sidebar"){
        document.getElementById("sidebar").classList.remove("sidebar");
        document.getElementById("sidebar").classList.add("msidebar");
        document.getElementById("pageMaterial").style.paddingLeft="120px";

        document.getElementById("navbar").style.paddingLeft="120px";

        document.getElementById("pageMaterial").style.transition="0.4s";
        document.getElementById("navbar").style.transition="0.4s";
        document.getElementById("sidebar").style.transition="0.4s";
        document.getElementById("logo").style.transition="0.4s";
        
        document.getElementById("logo").classList.remove("Logo");
        document.getElementById("logo").classList.add("SmallLogo");
        document.getElementById("logo").src="Assets/Logo/SmallLogo.png";
    }
    else{
        document.getElementById("sidebar").classList.remove("msidebar");
        document.getElementById("sidebar").classList.add("sidebar");
        document.getElementById("pageMaterial").style.paddingLeft="270px";

        document.getElementById("navbar").style.paddingLeft="270px";

        document.getElementById("pageMaterial").style.transition="0.4s";
        document.getElementById("navbar").style.transition="0.4s";
        document.getElementById("sidebar").style.transition="0.4s";
        document.getElementById("logo").style.transition="0.4s";
        
        document.getElementById("logo").classList.remove("SmallLogo");
        document.getElementById("logo").classList.add("Logo");
        document.getElementById("logo").src="Assets/Logo/Logo.png";
    }
}
window.onresize=function()
{
    if (window.innerWidth < 720) {
        document.getElementById("sidebar").classList.remove("sidebar");
        document.getElementById("sidebar").classList.add("msidebar");
        document.getElementById("pageMaterial").style.paddingLeft="140px";

        document.getElementById("navbar").style.paddingLeft="100px";

        document.getElementById("pageMaterial").style.transition="0.4s";
        document.getElementById("navbar").style.transition="0.4s";
        document.getElementById("sidebar").style.transition="0.4s";
        document.getElementById("logo").style.transition="0s";
        
        document.getElementById("logo").classList.remove("Logo");
        document.getElementById("logo").classList.add("SmallLogo");
        document.getElementById("logo").src="Assets/Logo/SmallLogo.png";
    }
    if (window.innerWidth > 720) {
        document.getElementById("sidebar").classList.remove("msidebar");
        document.getElementById("sidebar").classList.add("sidebar");
        document.getElementById("pageMaterial").style.paddingLeft="270px";

        document.getElementById("navbar").style.paddingLeft="270px";

        document.getElementById("pageMaterial").style.transition="0.4s";
        document.getElementById("navbar").style.transition="0.4s";
        document.getElementById("sidebar").style.transition="0.4s";
        document.getElementById("logo").style.transition="0.4s";
        
        document.getElementById("logo").classList.remove("SmallLogo");
        document.getElementById("logo").classList.add("Logo");
        document.getElementById("logo").src="Assets/Logo/Logo.png";
    }
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

function openupdatecat(){
    var modal = document.getElementById("UpdatecategoryModal");
    var background = document.getElementById("bgblur");
     
    modal.style.display="";
    background.style.display="";
}

function CloseupdateCategoryModal(){
    var modal = document.getElementById("UpdatecategoryModal");
    var background = document.getElementById("bgblur");
     
    modal.style.display="none";
    background.style.display="none";
 
    loginform();
 }

 const dateInput = document.getElementById('currentdate');

dateInput.value = formatDate();

function padTo2Digits(num) {
  return num.toString().padStart(2, '0');
}

function formatDate(date = new Date()) {
  return [
    date.getFullYear(),
    padTo2Digits(date.getMonth() + 1),
    padTo2Digits(date.getDate()),
  ].join('-');
}
function showmodal(){
    if(document.getElementById("profilemodal").style.display=="none"){
        document.getElementById("profilemodal").style.display="";
    }
    else{
        document.getElementById("profilemodal").style.display="none"; 
    }
}
var $window = $(window)

/* Restore scroll position */
window.scroll(0, localStorage.getItem('scrollPosition')|0)

/* Save scroll position */
$window.scroll(function () {
	localStorage.setItem('scrollPosition', $window.scrollTop())
})