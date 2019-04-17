<?php require 'pages/header.php'; ?>

<div class="container">
	<h1>Login</h1>
	<?php
	  require 'classes/usuarios.class.php';
	$u = new Usuarios();
	  if(isset($_POST['email']) && !empty($_POST['senha'])) {
		
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];

		if($u->login($email, $senha)) {
	?>
			<script type="text/javascript">window.location.href="./";</script>


           <?php
		} else {
			?>
			<div class="alert alert-danger">
				Usúario e/ou Senha Errada!
			</div>
			<?php
		}
	   
         }        
          ?>
        
       
  

          <form method="POST">

          	<div class="form-group">
          		<label for="email">Email</label>
          		<input type="email" class="form-control" id="email" name="email">
          	</div>
          	<div class="form-group">
          		<label for="senha">Senha</label>
          		<input type="password" class="form-control" id="senha" name="senha">
          	</div>


          	<input type="submit" value="Fazer Login" class="btn btn-default"> 
          </form>
</div>

<?php require 'pages/footer.php'; ?>
