"use strict";


let changeCar = () =>{
	let car = document.getElementById("select_car");
	car.addEventListener('change',function(){
    	$.ajax({
            data:  {valor:this.value},
            url:   'controller/modeloController.php',
            type:  'post',
            success:  function (response) {
                $('#modelo').html(response);
                changeModel();
            },
            error : function(jqXHR, textStatus, errorThrown){
            	console.log(textStatus);
			}
        });
	});
};

changeCar();

let changeModel = () =>{
	let model = document.getElementById("select_model");
	model.addEventListener('change',function(){
		$.ajax({
            data:  {valor:this.value},
            url:   'controller/lineaController.php',
            type:  'post',
            success:  function (response) {
                $('#linea').html(response);
            },
            error : function(jqXHR, textStatus, errorThrown){
            	console.log(textStatus);
			}
        });
	});
};

$('.btn').on('click', function () {
  $(this).removeAttr('checked');
  $(this).removeClass('active');
});



