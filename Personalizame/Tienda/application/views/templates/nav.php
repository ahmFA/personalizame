

<nav class="container navbar navbar-inverse">
  <div class="navbar-header">
    <a class="navbar-brand" href="<?=base_url()?>">CRUD Tienda</a>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Usuario<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <li><a href="<?=base_url()?>usuario/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>usuario/listar">Listar</a></li>
	     </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Producto<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <li><a href="<?=base_url()?>producto/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>producto/modificar">Modificar</a></li>
		  <li><a href="<?=base_url()?>producto/listar">Listar</a></li>
		  <li><a href="<?=base_url()?>producto/borrar">Borrar</a></li>
	     </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Pedido<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <li><a href="<?=base_url()?>pedido/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>pedido/modificar">Modificar</a></li>
		  <li><a href="<?=base_url()?>pedido/listar">Listar</a></li>
		  <li><a href="<?=base_url()?>pedido/borrar">Borrar</a></li>
	     </ul>
      </li>

	  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Forma de Pago<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <li><a href="<?=base_url()?>fpago/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>fpago/listar">Gestionar</a></li>
	     </ul>
      </li>
      
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Artículo<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <li><a href="<?=base_url()?>articulo/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>articulo/listar">Listar</a></li>
		  <li><a href="<?=base_url()?>articulo/borrar">Borrar</a></li>
	     </ul>
      </li>
      
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Color<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <li><a href="<?=base_url()?>color/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>color/listar">Listar</a></li>
		  <li><a href="<?=base_url()?>color/borrar">Borrar</a></li>
	     </ul>
      </li>
      
       <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Talla<span class="caret"></span>
        </a>
		<ul class="dropdown-menu">
		  <li><a href="<?=base_url()?>talla/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>talla/listar">Listar</a></li>
		  <li><a href="<?=base_url()?>talla/borrar">Borrar</a></li>
	     </ul>
      </li>
    </ul>
    
    <!-- para poner el menu a la derecha usariamos class="nav navbar-nav navbar-right" -->
    
    <ul class="nav navbar-nav">
     <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
           Tipo Prod.<span class="caret"></span>
        </a>
		<ul class="dropdown-menu ">
		  <li><a href="<?=base_url()?>tipo/crear">Crear</a></li>
		  <li><a href="<?=base_url()?>tipo/listar">Gestionar</a></li>
	     </ul>
      </li>
     </ul>
     
  </div>
</nav>


