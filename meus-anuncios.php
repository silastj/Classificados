<?php require 'pages/header.php'; ?>
<?php
if(empty($_SESSION['cLogin'])) {
	?>
	<script type="text/javascript">window.location.href="login.php";</script>

	<?php
	exit;
}
?>
<div class="container">
<h1>Meus Anúncios</h1>

<a href="add-anuncio.php" class="btn btn-success">Adicionar</a>

  <table class="table table-striped">
  	<thead>
       <tr>
       	<td>Fotos</td>
       	<td>Modelo</td>
       	<td>Valor</td>
       	<td>Açôes</td>
       </tr>
  	</thead>

  	<?php
      require 'classes/anuncios.class.php';
      $a = new Anuncios();
      $anuncios = $a->getMeusAnuncios();

      foreach($anuncios as $anuncio):
      ?>
      <tr>
          <td>
           <?php if(!empty($anuncio['url'])): ?>
          <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="30" border="0">
           <?php else: ?>
               <img src="assets/images/default.png" height="30" border="0">
           <?php endif; ?>

        </td>
       	<td><?php echo $anuncio['titulo']; ?></td>
       	<td><strong>R$</strong> <?php echo number_format($anuncio['valor'], 2); ?></td>
       	<td>
          <a href="editar-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-default btn-sm">Editar</a>
          <a href="excluir-anuncio.php?id=<?php echo $anuncio['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
        </td>

      </tr>
  <?php endforeach; ?>
  	


  </table>
</div>
<?php require 'pages/footer.php' ?>
