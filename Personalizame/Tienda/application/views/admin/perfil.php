
                    <div class="card" id="profile-main">
                        <div class="pm-overview c-overflow">
                            <div class="pmo-pic">
                                <div class="p-relative">
                                        <img class="img-responsive" src="<?= base_url()?>../../../../img/usuarios/<?=$usuario->imagen ?>" alt=""> 
                                   
                                   
                                </div>
                                
                                
                                <div class="pmo-stat">
                                   <h3><?= $usuario->nick ?></h3>
                                </div>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contacto</h2>
                                
                                <ul>
                                    <li><i class="zmdi zmdi-phone"></i> <?= $usuario->telefono1 ?></li>
                                    <li><i class="zmdi zmdi-email"></i> <?= $usuario->mail1 ?></li>
                                     <li>
                                        <i class="zmdi zmdi-pin"></i>
                                        <address class="m-b-0 ng-binding">
                                          <?= $usuario->direccion ?> - <?= $usuario->cp ?><br>
                                            <?= $usuario->localidad ?>(<?= $usuario->provincia ?>),<br>
                                            <?= $usuario->pais ?>
                                        </address>
                                       </li> 
                               </ul>     
                            </div>
                            
                        </div>
                        
                        <div class="pm-body clearfix">
                        
                        <div class="pmb-block">
                                <div class="pmbb-header">
                                   <h3>Perfil de Administrador</h3>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Editar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                             
                        		 <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                     <h4><i class="zmdi zmdi-account m-r-5"></i> Información básica</h4>
                                        <dl class="dl-horizontal">
                                            <dt>Nombre</dt>
                                            <dd><?= $usuario->nombre ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Apellido 1</dt>
                                            <dd><?= $usuario->apellido1 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Apellido 2</dt>
                                            <dd><?= $usuario->apellido2 ?></dd>
                                        </dl>
                                        <br>
                                        <h4><i class="zmdi zmdi-phone m-r-5"></i>Información de contacto</h4>
                                         <dl class="dl-horizontal">
                                            <dt>Teléfono 1</dt>
                                            <dd><?= $usuario->telefono1 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Teléfono 2</dt>
                                            <dd><?= $usuario->telefono2 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email 1</dt>
                                            <dd>@<?= $usuario->mail1 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email 2</dt>
                                            <dd><?= $usuario->mail2 ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Comentario contacto</dt>
                                            <dd><?= $usuario->comentario_contacto ?></dd>
                                        </dl> 
                                        <br>
                                        <h4><i class="zmdi zmdi-home m-r-5"></i>Información de dirección</h4>
                                         <dl class="dl-horizontal">
                                            <dt>Dirección</dt>
                                            <dd><?= $usuario->direccion ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Código Postal</dt>
                                            <dd><?= $usuario->cp ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Localidad</dt>
                                            <dd><?= $usuario->localidad ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Provincia</dt>
                                            <dd><?= $usuario->provincia ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>País</dt>
                                            <dd><?= $usuario->pais ?></dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt>Comentario dirección</dt>
                                            <dd><?= $usuario->comentario_direccion ?></dd>
                                        </dl> 
                                    </div>
                                    	
                                    <div class="pmbb-edit">
                                    	<h4><i class="zmdi zmdi-account m-r-5"></i> Información básica</h4>
                                        <dl class="dl-horizontal">
                                       <form role="form" action="<?=base_url() ?>usuario/modificarPost2" method="post">
                                        <input type="hidden" name="idUsuario" value="<?=$usuario->id ?>">
                                        <input type="hidden" name="nick" value="<?=$usuario->nick ?>">
                                        <input type="hidden" name="perfilAdmin" value="1">
                                        <dt class="p-t-10">Imagen</dt>
                                        	<dd>
                                        	 	<div class="fg-line">
                                        		 <div class="fileinput fileinput-new" data-provides="fileinput">
						                                <div class="fileinput-preview thumbnail" data-trigger="fileinput">
						                                	<img src="../../../../img/usuarios/<?=$usuario->imagen ?>">
						                                </div>
						                               
						                                <div>
						                                    <span class="btn btn-info btn-file">
						                                        <span class="fileinput-new">Seleccionar imagen</span>
						                                        <span class="fileinput-exists">Cambiar</span>
						                                        <input type="file" name="nueva" id="nueva">
						                                    </span>
						                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Quitar</a>
						                                </div>
						                         </div>
						                    	</div>
                                        	</dd>
                                         <dt class="p-t-10">Contraseña</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="password" class="form-control" name="pwd" value="<?= $usuario->pwd ?>">
                                                </div>
                                                
                                            </dd>
                                            <dt class="p-t-10">Nombre</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="nombre" placeholder="ej. Juan Carlos" value="<?= $usuario->nombre ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Apellido 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="apellido1" placeholder="ej. Pérez" value="<?= $usuario->apellido1 ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Apellido 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="apellido2" placeholder="ej. López" value="<?= $usuario->apellido2 ?>">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <br>
										<h4><i class="zmdi zmdi-phone m-r-5"></i>Información de contacto</h4>
										<dl class="dl-horizontal">
                                            <dt class="p-t-10">Teléfono 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="telefono1" placeholder="ej. 915550000" value="<?= $usuario->telefono1 ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Teléfono 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="telefono2" placeholder="ej. 915550000" value="<?= $usuario->telefono2 ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" name="mail1" placeholder="ej. admin@admin.com" value="<?= $usuario->mail1 ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" name="mail2" placeholder="ej. admin@admin.com" value="<?= $usuario->mail2 ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="fg-line">
                                            <textarea class="form-control" rows="5" name="comentario_contacto" placeholder="Comentario de contacto..."><?= $usuario->comentario_contacto ?>
                                            </textarea>
                                        </div>
										<br>
										<h4><i class="zmdi zmdi-home m-r-5"></i>Información de dirección</h4>   
										 <dl class="dl-horizontal">
                                            <dt class="p-t-10">Dirección</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="direccion" placeholder="ej. C/Desengaño, 21" value="<?= $usuario->direccion ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Código Postal</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" maxlength="5" class="form-control" name="cp" placeholder="ej. 28001" value="<?= $usuario->cp ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Localidad</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="localidad" placeholder="ej. Pinto" value="<?= $usuario->localidad ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Provincia</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="provincia" placeholder="ej. Madrid" value="<?= $usuario->provincia ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt class="p-t-10">País</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="pais" placeholder="ej. España"  value="<?= $usuario->pais ?>">
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="fg-line">
                                            <textarea class="form-control" rows="5" name="comentario_direccion" placeholder="Comentario de dirección..."><?= $usuario->comentario_direccion ?>
                                            </textarea>
                                        </div>                          
                                        <div class="m-t-30">
                                            <button  type="submit" class="btn btn-primary btn-sm">Guardar</button>
                                         
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancelar</button>
                                        </div>
                                       </form> 
                                    </div>
                                    
                                    
                                    
                                </div>
              	
                    </div>           
                 </div>          
               </div>                     
                                   
                                    
                                    
                                    
                           
                            <!-- 
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-account m-r-5"></i> Información básica</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Editar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Nombre</dt>
                                            <dd>Mallinda Hollaway</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Apellido 1</dt>
                                            <dd>Female</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Apellido 2</dt>
                                            <dd>June 23, 1990</dd>
                                        </dl>
                                      
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Nombre</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="nombre placeholder="eg. Mallinda Hollaway">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Apellido 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="apellido1" placeholder="eg. Mallinda Hollaway">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Apellido 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="apellido2" placeholder="eg. Mallinda Hollaway">
                                                </div>
                                                
                                            </dd>
                                        </dl>
                                        
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm">Guardar</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-phone m-r-5"></i>Información de contacto</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Editar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Teléfono 1</dt>
                                            <dd>00971 12345678 9</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Teléfono 2</dt>
                                            <dd>malinda.h@gmail.com</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email 1</dt>
                                            <dd>@malinda</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email 2</dt>
                                            <dd>malinda.hollaway</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Comentario contacto</dt>
                                            <dd>Este es el comentariod e contactoEste es el comentariod e contactoEste es el comentariod e contacto
                                            Este es el comentariod e contactoEste es el comentariod e contactoEste es el comentariod e contacto
                                            Este es el comentariod e contactoEste es el comentariod e contactoEste es el comentariod e contacto
                                            Este es el comentariod e contactoEste es el comentariod e contacto</dd>
                                        </dl> 
                                       
                                    	
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Teléfono 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. 00971 12345678 9">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Teléfono 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" placeholder="eg. malinda.h@gmail.com">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email 1</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. @malinda">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Email 2</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. malinda.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="fg-line">
                                            <textarea class="form-control" rows="5" placeholder="Comentario de contacto...">Comentario de contacto.</textarea>
                                        </div>
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm">Guardar</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-home m-r-5"></i>Información de dirección</h2>
                                    
                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-toggle="dropdown">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                            
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a data-pmb-action="edit" href="">Editar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pmbb-body p-l-30">
                                    <div class="pmbb-view">
                                        <dl class="dl-horizontal">
                                            <dt>Dirección</dt>
                                            <dd>00971 12345678 9</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Código Postal</dt>
                                            <dd>malinda.h@gmail.com</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Localidad</dt>
                                            <dd>@malinda</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Provincia</dt>
                                            <dd>malinda.hollaway</dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>País</dt>
                                            <dd>malinda.hollaway</dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt>Comentario dirección</dt>
                                            <dd>Comentario de direcciónComentario de direcciónComentario de dirección
                                            Comentario de direcciónComentario de direcciónComentario de dirección
                                            Comentario de direcciónComentario de direcciónComentario de dirección</dd>
                                        </dl> 
                                    </div>
                                    
                                    <div class="pmbb-edit">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Dirección</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. 00971 12345678 9">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Código Postal</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="email" class="form-control" placeholder="eg. malinda.h@gmail.com">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Localidad</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. @malinda">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Provincia</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. malinda.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt class="p-t-10">País</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" placeholder="eg. malinda.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                         <div class="fg-line">
                                            <textarea class="form-control" rows="5" placeholder="Comentario de dirección...">Comentario de dirección.</textarea>
                                        </div>
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm">Guardar</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           -->