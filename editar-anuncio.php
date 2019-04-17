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

   if(isset($_FILES['fotos'])) {
    $fotos = $_FILES['fotos'];
} else {
	$fotos = array();
}

$a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, $_GET['id']);

?>
<div class="alert alert-success">
 Produto alterado com sucesso!
</div>
<?php


}
if(isset($_GET['id']) && !empty($_GET['id'])) {

    $info = $a->getAnuncio($_GET['id']);

} else {
	?>
	<script type="text/javascript">window.location.href="meus-anuncios.php";</script>
<?php
exit;
}
?>

<div class="container">
	<h1>Meus Anúncios - Editar Anúncios</h1>

	<form method="POST" enctype="multipart/form-data">

	  <div class="col-lg-6">	
		<div class="form-group">
			<label for="categoria">Categoria</label>
			<select name="categoria" id="categoria" class="form-control">
				<?php
				require "classes/categorias.class.php";
                   $c = new Categorias();
                   $cats = $c->getLista();
                   foreach($cats as $cat):
                ?>
                <option value="<?php echo $cat['id']; ?>" <?php echo ($info['id_categoria'] ==$cat['id'])?'selected="selected"':''; ?>><?php echo $cat['nome']; ?></option>
                <?php
                   endforeach;
                ?>
                 
								

			</select>
		</div>
	  </div>	

	
      
      <div class="col-lg-6">
		<div class="form-group">
			<label for="titulo">Titulo</label>
              <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>">     
			</select>
		</div>
	  </div>
	  
	  <div class="col-lg-6">	
		<div class="form-group">
			<label for="valor">Valor</label>
              <input type="text" name="valor" id="valor" class="form-control money" value="<?php echo $info['valor']; ?>">     
		</div>
	   </div>	

	   
	   <div class="col-lg-6">	
		<div class="form-group">
			<label for="estado">Conservação</label>
              <select type="text" name="estado" id="estado" class="form-control">
              	<option value="0" <?php echo ($info['estado'] =='0')?'selected="selected"':'';?>>Batido</option>
              	<option value="1" <?php echo ($info['estado'] =='1')?'selected="selected"':'';?>>Amassado</option>
              	<option value="2" <?php echo ($info['estado'] =='2')?'selected="selected"':'';?>>Zero</option>
              </select>  
		</div>
	   </div>	

	   <div class="col-lg-12">
		<div class="form-group">
			<label for="descricao">Descrição</label>
              <textarea type="text" name="descricao" class="form-control" maxlength="50" rows="3"><?php echo $info['descricao']; ?>	
          </textarea>  
		</div>
	   </div>

      <div class="col-lg-12">
	   <div class="form-group">
			<label for="fotos">Fotos do anúncio:</label>
			<input type="file" name="fotos[]" id="fotos" multiple> 
			                                       <br>

			<div class="panel panel-default">
				<div class="panel-heading">Fotos</div>
				<div class="panel-body">
					<?php foreach($info['fotos'] as $foto): ?>
                      <div class="foto_item">
                      	<img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail"/><br>
                      	<a href="excluir-foto.php?id=<?php echo $foto['id']; ?>" class="btn btn-default btn-sm">Excluir Imagem</a>
                      </div>
					<?php endforeach ?>
				</div>
			</div>

	   </div>		
	  </div>

	  <div class="col-lg-2">
		<input type="submit" value="Salvar" class="btn btn-success">
      </div>
    
       	
	</form>

	
   </div>
		





<?php require 'pages/footer.php'; ?>
