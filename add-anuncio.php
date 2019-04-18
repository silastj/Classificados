<?php require "pages/header.php"; ?>

<?php
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>

	<?php
	exit;
}

require 'classes/anuncios.class.php';
$a = new Anuncios();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    $titulo = addslashes($_POST['titulo']);
    $categoria = addslashes($_POST['categoria']);
    $valor = addslashes($_POST['valor']);
    $descricao = addslashes($_POST['descricao']);
    $estado = addslashes($_POST['estado']);

$a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);

?>
<div class="alert alert-success">
 Produto adicionado com sucesso!
</div>
<?php


}
?>

<div class="container">
	<h1>Meus Anúncios - Adicionar Anúncios</h1>

	<form method="POST" enctype="multipart/form-data">
	<div class="col-lg-6">
		<div class="form-group">
			<label for="categoria">Categoria</label>
			<select name="categoria" id="categoria" class="form-control col-lg-6">
				<?php
				require "classes/categorias.class.php";
                   $c = new Categorias();
                   $cats = $c->getLista();
                   foreach($cats as $cat):
                ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?>
                </option>
                <?php
                   endforeach;
                ?>
                 
								

			</select>
		</div>
	</div>	
      
      <div class="col-lg-6">
		<div class="form-group">
			<label for="titulo">Titulo</label>
              <input type="text" name="titulo" id="titulo" class="form-control col-lg-6">     
			</select>
		</div>
	  </div>
	  
	  <div class="col-lg-6">	
		<div class="form-group">
			<label for="valor">Valor</label>
              <input type="number" name="valor" id="valor" class="form-control money">     
		</div>
	  </div>

	  <div class="col-lg-6">
		<div class="form-group">
			<label for="estado">Conservação</label>
              <select type="text" name="estado" id="estado" class="form-control">
              	<option value="0">Batido</option>
              	<option value="1">Amassado</option>
              	<option value="2">Zero</option>
              </select>  
		</div>
	   </div>		
      
        
       <div class="col-lg-12">
		<div class="form-group">
			<label for="descricao">Descrição</label>
              <textarea type="text" name="descricao" id="descricao" class="form-control" maxlength="50" rows="3"></textarea>  
		</div>
	   </div>	

	   

	   <div class="col-lg-2">
			<input type="submit" value="Adicionar" class="btn btn-success">
	</div>		
	   
	</form>
   
	

</div>





<?php require 'pages/footer.php'; ?>
