<?php require 'pages/header.php'; ?>

<div class="container">
	<h1>Cadastra-se</h1>
	<?php
	  require 'classes/usuarios.class.php';
	$u = new Usuarios();
	  if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = $_POST['senha'];
		$telefone = addslashes($_POST['telefone']);

      if(!empty($nome) && !empty($email) && !empty($senha)) {	
		if($u->cadastrar($nome, $email, $senha, $telefone)) {          
          ?>
        <div class="alert alert-success">
             <strong>Parabéns </strong>Cadastro com sucesso!! <a href="login.php" class="alert-link">Faça o login agora</a>
        </div>

		<?php
		} else {
			 ?>
        <div class="alert alert-warning">
             Este usúario ja existe! <a href="login.php" class="alert-link">Faça o login agora</a>
        </div>
		<?php
		}   	

	   } else {
        ?>
        <div class="alert alert-danger">
        	Prencha todos os campos!
        </div>
        <?php
	   }
	}
	?>


	<form method="POST">
		<div class="container">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" id="nome" name="nome">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email">
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" class="form-control" id="senha" name="senha">
		</div>
		<div class="form-group">
			<label for="telefone">Telefone</label>
			<input type="text" class="form-control telephone" id="telefone" name="telefone" data-mask="(00) 0000-0000" data-mask-selectonfocus="true">
		</div>
		
		
		<input type="submit" value="Cadastrar" class="btn btn-default"> 
	

	</form>
</div>






<?php require 'pages/footer.php'; ?>
