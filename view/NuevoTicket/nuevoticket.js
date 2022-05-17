
function init(){
    $("#ticket_form").on("submit",function(e){
        guardaryeditar(e);
    });
}

$(document).ready(function() {

$('#tick_descrip').summernote({
        height: 150,
        lang: "es-ES",
            popover: {
                image: [],
                link: [],
                air: [],
            },
        callbacks: {
            onImageUpload: function(image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        },
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    $.post("../../controller/categoria.php?op=combo",function(data, status){
        $('#cat_id').html(data);
    });

    $("#cat_id").change(function(){
        cat_id = $(this).val();
      

        $.post("../../controller/subcategoria.php?op=combo",{cat_id : cat_id},function(data, status){
            console.log(data);
            $('#subcat_id').html(data);
        });

        $.post("../../controller/prioridad.php?op=combo",function(data, status){
            console.log(data);
            $('#pri_id').html(data);

        });  $.post("../../controller/sede.php?op=combo",function(data, status){
            console.log(data);
            $('#sedcat_id').html(data);
        });
      $.post("../../controller/impacto.php?op=combo",function(data, status){
        console.log(data);
        $('#impa_id').html(data);
    });
    });

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);
    if ($('#tick_titulo').val()==''){
        swal("Atención!", "Ingrese titulo...", "error");
    }else{

        //alert($('#tick_descrip').val());

        if($('#cat_id').val() === ""){
            swal("Atención!", "Seleccione categoria...", "error");
        } else{

            if($('#subcat_id').val() === ""){
                swal("Atención!", "Seleccione servicio afectado...", "error");
            }else{

                if($('#sedcat_id').val() === ""){
                    swal("Atención!", "Seleccione sede...", "error");  
                }  else{ 

            if($('#pri_id').val() === ""){
                swal("Atención!", "Seleccione prioridad...", "error");  
            }  else{ 
 
                            if($('#impa_id').val() === ""){
                                swal("Atención!", "Seleccione impacto...", "error");
                            } else{

                                if($('#tick_descrip').val().length <= 5){
          
                                    swal("Atención!", "Ingrese por lo menos 5 caracteres en la descripcion", "error");
                        
                                }else{

                                //swal("Eso es todo!", "success");

                                //aqui ya va el ingreso del ticket y el envio de correo

                                //ahora que ya se valido campo por campo vamos a pegar el ingreso del ticket y el ciclo para contar
                                //cuantos archivos van a subirse
                               
                                var totalfiles = $('#fileElem').val().length;
                                for (var i = 0; i < totalfiles; i++) {
                                    formData.append("files[]", $('#fileElem')[0].files[i]);
                                }
                        
                                $.ajax({
                                    url: "../../controller/ticket.php?op=insert",
                                    type: "POST",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(data){
                                        console.log(data);
                                        data = JSON.parse(data);
                                        console.log(data[0].tick_id);
                        
                                        $.post("../../controller/email.php?op=ticket_abierto", {tick_id : data[0].tick_id}, function (data) {
                        
                                        });
                                        
                                        $('#ticket_form').trigger("reset");
                                        $('#tick_titulo').val('');
                                        $('#fileElem').val('');
                                        $('#tick_descrip').summernote('reset');
                                        $("#tick_descrip").val();
                                        $('#pri_id').val('');
                                        $('#tick_cel').val('');
                                        $('#tick_anydesk').val('');

                                        swal("Ticket Registrado Correctamente");
                        
                                        }
                                });




                            }

                            
                        }

                        }     

            
               }

        } 
 
       
      }
    }
}

init();