   <header id="header" class="clearfix" data-current-skin="blue">
            <ul class="header-inner">
                <li id="menu-trigger" data-trigger="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="logo hidden-xs">
                    <a href="index.html">ADMINISTRACIÓN</a>
                </li>

                <li class="pull-right">
                    <ul class="top-menu">
                        <li id="toggle-width">
                            <div class="toggle-switch">
                                <input id="tw-switch" type="checkbox" hidden="hidden">
                                <label for="tw-switch" class="ts-helper"></label>
                            </div>
                        </li>

                    </ul>
                </li>
            </ul>


            <!-- Top Search Content -->
            <div id="top-search-wrap">
                <div class="tsw-inner">
                    <i id="top-search-close" class="zmdi zmdi-arrow-left"></i>
                    <input type="text">
                </div>
            </div>
        </header>
        
        <section id="main" data-layout="layout-1">
            <aside id="sidebar" class="sidebar c-overflow">
                <div class="profile-menu">
                    <a href="">
                        <div class="profile-pic">
                            <img src="../../../../img/usuarios/<?=$_SESSION['imagen'] ?>" alt="">
                        </div>

                        <div class="profile-info">
                            <?= $_SESSION['nick'] ?>

                            <i class="zmdi zmdi-caret-down"></i>
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a href="<?= base_url()?>usuario/perfiladmin"><i class="zmdi zmdi-account"></i> Ver Perfil</a>
                        </li>
                         <li>
                            <a href="<?= base_url()?>home/index"><i class="zmdi zmdi-arrow-left"></i> Ir a página web</a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>usuario/logout"><i class="zmdi zmdi-power"></i> Logout</a>
                        </li>
                    </ul>
                </div>

                <ul class="main-menu">
                    <li class="active">
                        <a href="<?=base_url() ?>home/indexAdmin"><i class="zmdi zmdi-home"></i> Inicio</a>
                    </li>
                      <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-accounts"></i>Usuarios</a>

                        <ul>
                            <li><a href="<?= base_url()?>usuario/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>usuario/listar">Listado y Gestión</a></li>
                        </ul>
                    </li>
                      <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-book"></i> Artículos</a>

                        <ul>
                            <li><a href="<?= base_url()?>articulo/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>articulo/listar">Listado y Gestión</a></li>
                            <li><a href="<?= base_url()?>articulo/borrar">Baja</a></li>
                        </ul>
                    </li>
                     <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-collection-image-o"></i> Imágenes</a>

                        <ul>
                            <li><a href="<?= base_url()?>imagen/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>imagen/listar">Listado y Gestión</a></li>
                            <li><a href="<?= base_url()?>imagen/borrar">Baja</a></li>
                        </ul>
                    </li>
                     <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-palette"></i> Colores</a>

                        <ul>
                            <li><a href="<?= base_url()?>color/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>color/listar">Listado y Gestión</a></li>
                            <li><a href="<?= base_url()?>color/borrar">Baja</a></li>
                        </ul>
                    </li>
                     <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-collection-item"></i> Tallas</a>

                        <ul>
                            <li><a href="<?= base_url()?>talla/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>talla/listar">Listado y Gestión</a></li>
                            <li><a href="<?= base_url()?>talla/borrar">Baja</a></li>
                        </ul>
                    </li>
                     <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-card-membership"></i> Categoría</a>

                        <ul>
                            <li><a href="<?= base_url()?>categoria/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>categoria/listar">Listado y Gestión</a></li>
                            <li><a href="<?= base_url()?>categoria/borrar">Baja</a></li>
                        </ul>
                    </li>
                   
                    <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-font"></i> Fuente</a>

                        <ul>
                            <li><a href="<?= base_url()?>fuente/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>fuente/listar">Listado y Gestión</a></li>
                            <li><a href="<?= base_url()?>fuente/borrar">Baja</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-format-size"></i> Tamaño</a>

                        <ul>
                            <li><a href="<?= base_url()?>tamano/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>tamano/listar">Listado y Gestión</a></li>
                            <li><a href="<?= base_url()?>tamano/borrar">Baja</a></li>
                        </ul>
                    </li>
                    <!-- 
                    <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-gradient"></i> Producto</a>

                        <ul>
                            <li><a href="<?= base_url()?>producto/crear">Alta</a></li>
                            <li><a href="<?= base_url()?>producto/listar">Listado</a></li>
                            <li><a href="<?= base_url()?>producto/modificar">Modificación</a></li>
                            <li><a href="<?= base_url()?>producto/borrar">Baja</a></li>
                        </ul>
                    </li>
                     -->
                     <li class="sub-menu">
                        <a href=""><i class="zmdi zmdi-shopping-basket"></i> Pedidos</a>

                        <ul>
                            <li><a href="<?= base_url()?>pedido/listar">Listado y Gestión</a></li>
                        </ul>
                    </li>

                </ul>
            </aside>
            
           
            <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Gestión de Personalízame</h2>
                        
                       
                        
                    </div>
                    