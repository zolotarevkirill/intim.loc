$(document).ready(function() { 
    var options = { 
        success:  showResponse,
        //target: '.header svg .quantity'
    }; 
 
    $('#FormCart').ajaxForm(options); 
}); 

function showResponse(data){
    if(data === "OK"){
        UpdateHeaderCart();
        UpdateRightCart();
    }else{
        alert("Сообщите администратору код ошибки:" + data);
    }
}