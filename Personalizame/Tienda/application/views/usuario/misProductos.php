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
	                    <h2>Mis productos</h2>
						
	                </div>
				</div>
	<div class="row m-t-25">
	
<div id="user" class="col-md-12" >
  <div class="panel panel-primary panel-table animated slideInDown">
   <div class="panel-heading " style="padding:5px;">
        <div class="row">
       
        <div class="col col-xs-4 col-xs-offset-4 text-center">
            <h1 class="panel-title" style="padding: 10px;">Productos guardados por Parrita</h1>
        </div>
        </div>
    </div>
  <div role="tabpanel" class="tab-pane " id="thumb">
        <div class="row">
        <div class="col-md-12">
        
        <div class="ok">
         <div class="col-md-3">
         <div class="panel panel-default panel-thumb">
  			<div class="panel-heading">
    			<h3 class="panel-title">Camiseta</h3>
  			</div>
  			<div class="panel-body avatar-card">
   			 <img src="<?=base_url() ?>assets/images/animales.jpg">
 			</div>
            <div class="panel-footer">
               <a href="#" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
               <a href="#" class="btn btn-warning" title="ban"><i class="fa fa-shopping-cart"> Añadir al carrito</i></a>
               <a href="#" class="btn btn-danger"  title="delete"><i class="fa fa-trash" ></i></a>
            </div>
         </div>
		 </div>
       </div>
      	
        <div class="ban">
         <div class="col-md-3">
         <div class="panel panel-default panel-thumb">
  			<div class="panel-heading">
    			<h3 class="panel-title">Camiseta 3(unidades)</h3>
  			</div>
  			<div class="panel-body avatar-card">
   			 <img src="<?=base_url() ?>assets/images/ficcion.jpg">
 			</div>
            <div class="panel-footer">
               <a href="#" class="btn btn-info" title="Editar"><i class="fa fa-pencil"></i></a>
               <a href="#" class="btn btn-warning" title="Añadir" ><i class="fa fa-shopping-cart"> Añadir al carrito</i></a>
               <a href="#" class="btn btn-danger"  title="Borrar"><i class="fa fa-trash" ></i></a>
            </div>
         </div>
		 </div>
       </div>
        
        <div class="new">
         <div class="col-md-3">
         <div class="panel panel-default panel-thumb">
  			<div class="panel-heading">
    			<h3 class="panel-title">Taza 5(unidades)</h3>
  			</div>
  			<div class="panel-body avatar-card">
   			 <img src="<?=base_url() ?>assets/images/terror.jpg">
 			</div>
            <div class="panel-footer">
              <a href="#" class="btn btn-info" title="Edit" ><i class="fa fa-pencil"></i></a>
               <a href="#" class="btn btn-warning" title="ban"><i class="fa fa-shopping-cart"> Añadir al carrito</i></a>
               <a href="#" class="btn btn-danger"  title="delete"><i class="fa fa-trash" ></i></a>
            </div>
         </div>
		 </div>
       </div>
       <div class="new">
         <div class="col-md-3">
         <div class="panel panel-default panel-thumb">
  			<div class="panel-heading">
    			<h3 class="panel-title">Taza</h3>
  			</div>
  			<div class="panel-body avatar-card">
   			 <img src="<?=base_url() ?>assets/images/gaming.jpg">
 			</div>
            <div class="panel-footer">
              <a href="#" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
               <a href="#" class="btn btn-warning" title="ban"><i class="fa fa-shopping-cart"> Añadir al carrito</i></a>
               <a href="#" class="btn btn-danger"  title="delete"><i class="fa fa-trash" ></i></a>
            </div>
         </div>
		 </div>
       </div>
       
       </div>
      </div>
      </div><!-- END id="thumb" --></div>
      </div><!-- END tab-content --> 
    </div>
   
   <div class="panel-footer text-center">
   		<ul class="pagination">
	 	  <li ><a>«</a></li>
		   <li class="active"><a href="#">1</a></li>
           <li ><a href="#">2</a></li>
           <li ><a href="#">3</a></li>
		   <li ><a>»</a></li>
         </ul>
   </div>
  </div><!--END panel-table-->
  </div>
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
