/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var loadedCss;
function Switch(css){
    var i, link;
    loadedCss = (css === "alternate")?true:false;
    localStorage.setItem("loadedCss",loadedCss);
    for(i = 0, link = document.getElementsByTagName("link"); i <link.length; i++){
        if((link[i].rel.indexOf("stylesheet") !== -1) && link[i].title){
            link[i].disabled = true;
            if(link[i].title === css){
                link[i].disabled = false;
            }
        }
    }
}
window.onload=function(){
    loadedCss = localStorage.getItem("loadedCss");
    if(loadedCss === null){
        loadedCss = false;
        localStorage.setItem("loadedCss",false);
    }
    if(loadedCss === "true"){
        Switch("alternate");
    }
    var btn = document.getElementById('switch')
    var nav = document.getElementById('btn-id')
    btn.onclick = function(e){
        if(nav.style.display === "block"){
            nav.style.display = "none";
        }else{
            nav.style.display = "block";
        }
    };
};