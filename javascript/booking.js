/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
window.onload=function(){
    document.getElementById('firstdate').value = new Date().toDateInputValue();
    document.getElementById('firstdate').min = new Date().toDateInputValue();
    document.getElementById('lastdate').value = new Date().toDateInputValue();
    document.getElementById('lastdate').min = new Date().toDateInputValue();
}