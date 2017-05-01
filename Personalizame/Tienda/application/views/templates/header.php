<!-- 
<header class="container">
<img src="<?=base_url()?>assets/img/logtn1.jpg" class="img-rounded  center-block" alt="Tienda ejemplo" height="100">
</header>
<div class="container">
  <div class="col-xs-12 text-right">
  	<?= "Conectado como" //session_id() ?>
  	<?= isset($_SESSION['perfil']) ? $_SESSION['perfil'] : "Invitado" ?>
  	<?= isset($_SESSION['nick']) ?": ".$_SESSION['nick'] : null ?>
  	
  	<?php if(!isset($_SESSION['nick']) && !isset($_SESSION['perfil'])):?>
		<a data-toggle="modal" href="#myModal">LOGUÉATE</a>
	<?php else:?>
		<a href="<?=base_url()?>usuario/logout">LOGOUT</a>
	<?php endif;?>
  </div>
   -->
  <!-- Modal -->
  <!-- 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
 -->
      <!-- Modal content-->
  <!--     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="<?=base_url()?>usuario/loginPost" method="post">
            <div class="form-group">
              <label for="idMail"><span class="glyphicon glyphicon-user"></span> Usuario</label>
              <input type="text" class="form-control" id="idMail" name="mail" placeholder="Introduce email">
            </div>
            <div class="form-group">
              <label for="idPassword"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="idPassword" name="pwd" placeholder="Introduce password">
            </div>

            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>¿Aún no eres miembro? <a href="#">Registrate</a></p>
          <p>¿Olvidaste tu <a href="#">contraseña?</a></p>
        </div>
      </div>
    </div>
  </div> 
</div>
 -->