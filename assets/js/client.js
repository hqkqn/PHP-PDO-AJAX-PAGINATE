"use strict";

$(function(){
    listClient();
    searchClient();
    createPaginate();
});

let listClient = () =>{
    $.ajax({
        data:  {valor:true},
        url:   '../controller/clienteController.php',
        type:  'post',
        success:  function (response) {
            $('#table').html(response);
        },
        error : function(jqXHR, textStatus, errorThrown){
            console.log(textStatus);
        }
    });
};

let searchClient = () =>{
    let search = document.getElementById('buscar');
    search.addEventListener('keyup',function(){
        $.ajax({
            data:  {search:true,value:this.value},
            url:   '../controller/clienteController.php',
            type:  'post',
            success:  function (response) {
                $('#table').html(response);
                createPaginate(this.value);
            },
            error : function(jqXHR, textStatus, errorThrown){
                console.log(textStatus);
            }
        });
    });
   
};

let createPaginate = () =>{
    $.ajax({
        data:  {},
        url:   '../controller/paginationController.php',
        type:  'post',
        success:  function (response) {
            $('#pagination li').remove();
            for (var i = 1; i <= response; i++) {
                $('#pagination').append("<li class='page-item'><a class='page-link text-muted' 'href='#'>"+i+"</a></li>");
            }
            cambiarPagina();
        },
        error : function(jqXHR, textStatus, errorThrown){
            console.log(textStatus);
        }
    });
}

let cambiarPagina = () => {
    let page = document.getElementById('page-link');
    $('.page-item>.page-link').on('click', function() {
        $.ajax({
                url:   '../controller/clienteController.php',
                type: 'POST',
                data: {pagina: $(this).text(), valor:true},
            success:  function (response) {
                $('#table').html(response);
            },
            error : function(jqXHR, textStatus, errorThrown){
                console.log(textStatus);
            }
        });
    });
};