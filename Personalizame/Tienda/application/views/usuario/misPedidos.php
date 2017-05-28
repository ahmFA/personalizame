	<header id="page-top">
		<div class="wrap-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="intro-text">
							<div class="intro-lead-in">Bienvenido a Personalízame!</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>
 
 <section class="box-content box-style">
			<div class="container-fluid">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Mis pedidos</h2>
						
	                </div>
				</div>
	<div class="row m-t-25">

<div id="user" class="col-md-12" >
  <div class="panel panel-primary panel-table animated slideInDown">
   <div class="panel-heading " style="padding:5px;">
        <div class="row">
       
        <div class="col col-xs-4 col-xs-offset-4 text-center">
            <h1 class="panel-title">Pedidos realizados por Parrita</h1>
        </div>
        <div class="col col-xs-2 well text-center" style="padding:1px;">    
            <span class="label label-danger">Filtro:</span>
            <button id="ok"  class="btn btn-primary" data-class="btn btn-primary" onclick="filter('ok')"><i class="fa fa-user" aria-hidden="true"></i></button>
            <button id="ban" class="btn btn-warning" data-class="btn btn-warning" onclick="filter('ban')"><i class="fa fa-ban" aria-hidden="true"></i></button>
            <button id="new" class="btn btn-success" data-class="btn btn-success" onclick="filter('new')"><i class="fa fa-check-square" aria-hidden="true"></i></button> 
        </div>
        
        </div>
    </div>
   <div class="panel-body">
     <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="list">
       <table class="table table-striped table-bordered table-list">
        <thead>
         <tr>
            <th class="avatar"></th>
            <th>Producto</th>
            <th>Unidades</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Estado</th>
          </tr> 
         </thead>
         <tbody>
          <tr class="ok">
             <td class="avatar"><img src="https://pbs.twimg.com/profile_images/746779035720683521/AyHWtpGY_400x400.jpg"></td>
             <td>Camiseta </td>
             <td>10 </td>
             <td>180€</td>
             <td>27/05/2017</td>
             <td><span class="label label-success">Entregado</span></td>
          </tr>
          <tr class="ban">
            <td class="avatar"><img src="https://pbs.twimg.com/profile_images/746779035720683521/AyHWtpGY_400x400.jpg"></td>
             <td>Camiseta </td>
             <td>10 </td>
             <td>180€</td>
             <td>27/05/2017</td>
             <td><span class="label label-success">Entregado</span></td>
          </tr>
          <tr class="new">
             <td class="avatar"><img src="https://pbs.twimg.com/profile_images/746779035720683521/AyHWtpGY_400x400.jpg"></td>
             <td>Camiseta </td>
             <td>10 </td>
             <td>180€</td>
             <td>27/05/2017</td>
             <td><span class="label label-warning">Pendiente</span></td>
            </tr>
          </tbody>
        </table>
      </div><!-- END id="list" -->

       
     </div><!-- END tab-content --> 
    </div>
   
   <div class="panel-footer text-center">
   	<!-- 
   		<ul class="pagination">
	 	  <li ><a>«</a></li>
		   <li class="active"><a href="#">1</a></li>
           <li ><a href="#">2</a></li>
           <li ><a href="#">3</a></li>
		   <li ><a>»</a></li>
         </ul> -->
         <a class="btn btn-info" href="<?=base_url() ?>usuario/perfil">Volver</a>
         
   </div>
  </div><!--END panel-table-->
</div>
</div>
</div>
</section>


<script type="text/javascript">
function filter($state){
	var x   = document.getElementsByClassName($state);
	var btn = document.getElementById($state);

	if (btn.className == "btn"){
	    btn.className = btn.dataset.class;
		for (i = 0; i < x.length; i++) {x[i].className = " animated fadeInLeft "+$state;}
		}
		else{ 
		for (i = 0; i < x.length; i++) {x[i].className = " animated fadeOutRight "+$state;}
		 btn.className = "btn";
		}

	}
</script>
