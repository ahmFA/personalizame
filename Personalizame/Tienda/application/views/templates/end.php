 <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>
        <!-- <script src="https://code.jquery.com/jquery-2.1.0.min.js" integrity="sha256-8oQ1OnzE2X9v4gpRVRMb1DWHoPHJilbur1LP9ykQ9H0=" crossorigin="anonymous"></script>-->
      <script src="<?=base_url()?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>  
     <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="<?=base_url()?>assets/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        
        <script src="<?=base_url()?>assets/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
		 <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        

        <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
      
     
        <script src="<?=base_url()?>assets/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/summernote/dist/summernote-updated.min.js"></script>
		 <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/nouislider/distribute/jquery.nouislider.all.min.js"></script>        
        <script src="<?=base_url()?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		
  
        <script src="<?=base_url()?>assets/vendors/bower_components/chosen/chosen.jquery.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/fileinput/fileinput.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/input-mask/input-mask.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/farbtastic/farbtastic.min.js"></script>
        <script src="<?=base_url()?>assets/js/flot-charts/curved-line-chart.js"></script>
        <script src="<?=base_url()?>assets/js/flot-charts/line-chart.js"></script>
        
        <script src="<?=base_url()?>assets/js/charts.js"></script>
        <script src="<?=base_url()?>assets/js/functions.js"></script>
        <script src="<?=base_url()?>assets/js/demo.js"></script>
        <script src="<?=base_url()?>assets/js/personalizame.js"></script>
        
        

        <script type="text/javascript">
        var conexion;

    	function accionAJAX() {
    		document.getElementById("idBanner").innerHTML = conexion.responseText;

    		//comprobacion para ver si borro o no los campos tras una insercion
    		var str = conexion.responseText;
    		var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
    		if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
    			document.getElementById("idForm1").reset();
    		}
    		
    	}

    	function crearTalla() {
    		conexion = new XMLHttpRequest();

    		//var datosSerializados = serialize(document.getElementById("idForm1"));
    		var datos = 'nombre='+document.getElementById('nombre').value;
    		conexion.open('POST', '<?=base_url() ?>talla/crearPost', true);
    		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    		conexion.send(datos);
    		conexion.onreadystatechange = function() {
    			if (conexion.readyState==4 && conexion.status==200) {
    				accionAJAX();
    			}
    		}
    	}

    	function modificarTalla() {
    		conexion = new XMLHttpRequest();

    		//var datosSerializados = serialize(document.getElementById("idForm1"));
    		var datos = 'nombre='+document.getElementById('nombre').value+'&id='+document.getElementById('id').value;
    		conexion.open('POST', '<?=base_url() ?>talla/editarPost', true);
    		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    		conexion.send(datos);
    		conexion.onreadystatechange = function() {
    			if (conexion.readyState==4 && conexion.status==200) {
    				accionAJAX();
    			}
    		}
    	}

			function comprobarTalla(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					crearTalla();
				}else{
					document.getElementById('nombre-form').classList.add('has-error');	
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos y que éstos no sean números</div>';
				}
			}

			function comprobarModTalla(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					modificarTalla();
				}else{
					document.getElementById('nombre-form').classList.add('has-error');	
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Rellena todos los campos y que éstos no sean números</div>';
				}
			}
		</script>
		
		<script type="text/javascript">
		function crearColor() {
    		conexion = new XMLHttpRequest();

    		//var datosSerializados = serialize(document.getElementById("idForm1"));
    		var datos = 'nombre='+document.getElementById('nombre').value+'&valor='+document.getElementById('valor').value;
    		conexion.open('POST', '<?=base_url() ?>color/crearPost', true);
    		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    		conexion.send(datos);
    		conexion.onreadystatechange = function() {
    			if (conexion.readyState==4 && conexion.status==200) {
    				accionAJAX();
    			}
    		}
    	}

		function modificarColor() {
    		conexion = new XMLHttpRequest();

    		//var datosSerializados = serialize(document.getElementById("idForm1"));
    		var datos = 'nombre='+document.getElementById('nombre').value+'&valor='+document.getElementById('valor').value+'&id='+document.getElementById('id').value;
    		conexion.open('POST', '<?=base_url() ?>color/editarPost', true);
    		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    		conexion.send(datos);
    		conexion.onreadystatechange = function() {
    			if (conexion.readyState==4 && conexion.status==200) {
    				accionAJAX();
    			}
    		}
    	}
     		

			function comprobarColor(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					crearColor();
				}else{
					document.getElementById('nombre-form').classList.add('has-error');
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Rellena todos los campos y que éstos no sean números</div>';					
				}
			}

			function comprobarModColor(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					modificarColor();
				}else{
					document.getElementById('nombre-form').classList.add('has-error');
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Rellena todos los campos y que éstos no sean números</div>';					
				}
			}
		</script>
		
		 <script type="text/javascript">
            /*
             * Notifications
             */
            function notify(from, align, icon, type, animIn, animOut){
                $.growl({
                    icon: icon,
                    title: ' Bootstrap Growl ',
                    message: 'Turning standard Bootstrap alerts into awesome notifications',
                    url: ''
                },{
                        element: 'body',
                        type: type,
                        allow_dismiss: true,
                        placement: {
                                from: from,
                                align: align
                        },
                        offset: {
                            x: 20,
                            y: 85
                        },
                        spacing: 10,
                        z_index: 1031,
                        delay: 2500,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: false,
                        animate: {
                                enter: animIn,
                                exit: animOut
                        },
                        icon_type: 'class',
                        template: '<div data-growl="container" class="alert" role="alert">' +
                                        '<button type="button" class="close" data-growl="dismiss">' +
                                            '<span aria-hidden="true">&times;</span>' +
                                            '<span class="sr-only">Close</span>' +
                                        '</button>' +
                                        '<span data-growl="icon"></span>' +
                                        '<span data-growl="title"></span>' +
                                        '<span data-growl="message"></span>' +
                                        '<a href="#" data-growl="url"></a>' +
                                    '</div>'
                });
            };
            
            $('.notifications > div > .btn').click(function(e){
                e.preventDefault();
                var nFrom = $(this).attr('data-from');
                var nAlign = $(this).attr('data-align');
                var nIcons = $(this).attr('data-icon');
                var nType = $(this).attr('data-type');
                var nAnimIn = $(this).attr('data-animation-in');
                var nAnimOut = $(this).attr('data-animation-out');
                
                notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut);
            });


            /*
             * Dialogs
             */

            //Basic
            $('#sa-basic').click(function(){
                swal("Here's a message!");
            });

            //A title with a text under
            $('#sa-title').click(function(){
                swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis")
            });

            //Success Message
            $('#sa-success').click(function(){
                swal("Good job!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis", "success")
            });

            //Warning Message
            $('#sa-warning').click(function(){
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this imaginary file!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    closeOnConfirm: false 
                }, function(){   
                    swal("Deleted!", "Your imaginary file has been deleted.", "success"); 
                });
            });
            
            //Parameter
            $('#sa-params').click(function(){
                swal({   
                    title: "Are you sure?",   
                    text: "You will not be able to recover this imaginary file!",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "Yes, delete it!",   
                    cancelButtonText: "No, cancel plx!",   
                    closeOnConfirm: false,   
                    closeOnCancel: false 
                }, function(isConfirm){   
                    if (isConfirm) {     
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");   
                    } else {     
                        swal("Cancelled", "Your imaginary file is safe :)", "error");   
                    } 
                });
            });

            //Custom Image
            $('#sa-image').click(function(){
                swal({   
                    title: "Sweet!",   
                    text: "Here's a custom image.",   
                    imageUrl: "img/thumbs-up.png" 
                });
            });

            //Auto Close Timer
            $('#sa-close').click(function(){
                 swal({   
                    title: "Auto close alert!",   
                    text: "I will close in 2 seconds.",   
                    timer: 2000,   
                    showConfirmButton: false 
                });
            });

        </script>
    </body>

    
  </html>