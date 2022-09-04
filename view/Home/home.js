function init(){
   
}

$(document).ready(function(){

    var usu_id = $('#user_idx').val();
    $('#NewPass_').val("");

    $('.chpassw').click(function(){
    var Usu=$('#IdUsuCambPass').val();
    var NewPassword=$('#NewPass_').val();
    var ConfNewPassword=$('#ConfirmNewPass_').val();

    if(NewPassword.length<8){
    
    $('#valcambiopass').html("<p class='alert alert-danger py-2'> La clave debe contener mínimo 8 caracteres!!</p>");
    }else{
      
        if(ConfNewPassword === ""){
            $('#valcambiopass').html("<p class='alert alert-danger py-2'> Debe confirmar la nueva clave!!</p>");  
        }else{

            if(ConfNewPassword !== NewPassword){
                $('#valcambiopass').html("<p class='alert alert-danger py-2'> Las claves no coinciden!!</p>"); 
            }else{
                //$('#valcambiopass').html("<p class='alert alert-success py-2'> Buena bobols !!</p>"); 
                $.post("../../controller/usuario.php?op=cambiarpassword", {usu_id:Usu,NuevoPass:NewPassword}, function (data) {
                   
                    $('#valcambiopass').html("<p class='alert alert-success py-2'> Cambio realizado con éxito!!</p>");

                    //esta funcion hace que se esconda el modal en 3 segundos
                    setTimeout(function() { 
                        $('#CClavePrimeraVez').modal('hide');
                    }, 3000);
                });
            }

        }

    }

    });   

    
    if ( $('#rol_idx').val() == 1){  
        $.post("../../controller/usuario.php?op=total", {usu_id:usu_id}, function (data) {
            data = JSON.parse(data);
            $('#lbltotal').html(data.TOTAL);
        }); 
    
        $.post("../../controller/usuario.php?op=totalabierto", {usu_id:usu_id}, function (data) {
            data = JSON.parse(data);
            $('#lbltotalabierto').html(data.TOTAL);
        });
    
        $.post("../../controller/usuario.php?op=totalcerrado", {usu_id:usu_id}, function (data) {
            data = JSON.parse(data);
            $('#lbltotalcerrado').html(data.TOTAL);
        });

        $.post("../../controller/usuario.php?op=mostrar", {usu_id:usu_id}, function (data) {
            data = JSON.parse(data);
            cambioContraseña=data.primera_vez;
            console.log("data es:", cambioContraseña);
            if(cambioContraseña ==  0){
                // alert("Amigo debe cambiar la clave por primera vez");
                $('#CClavePrimeraVez').modal('show'); 
                $('.debe-cambiar-clave').html(data.primera_vez);
                $("#IdUsuCambPass").val(data.usu_id);
            }else{
                //alert("Insecto puede seguir mirando los ticket...");
            }
            
        });
        
        $.post("../../controller/usuario.php?op=grafico", {usu_id:usu_id},function (data) {
            data = JSON.parse(data);
    
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'nom',
                ykeys: ['total'],
                labels: ['Value'],
                barColors: ["#1AB244"], 
                
            });
        }); 

    }else{
        $.post("../../controller/ticket.php?op=total",function (data) {
            data = JSON.parse(data);
            $('#lbltotal').html(data.TOTAL);
        }); 
    
        $.post("../../controller/ticket.php?op=totalabierto",function (data) {
            data = JSON.parse(data);
            $('#lbltotalabierto').html(data.TOTAL);
        });
    
        $.post("../../controller/ticket.php?op=totalcerrado", function (data) {
            data = JSON.parse(data);
            $('#lbltotalcerrado').html(data.TOTAL);
        });  

        $.post("../../controller/ticket.php?op=grafico",function (data) {
            data = JSON.parse(data);
    
            new Morris.Bar({
                element: 'divgrafico',
                data: data,
                xkey: 'nom',
                ykeys: ['total'],
                labels: ['Value']
            });
        }); 

    }

 
});

init();