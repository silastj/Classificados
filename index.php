<?php require 'config.php'; ?>
<?php require 'pages/header.php'; ?>

<?php
require 'classes/anuncios.class.php';
require 'classes/usuarios.class.php';

$a = new Anuncios();
$u = new Usuarios();

$total_anuncios = $a->getTotalAnuncios();
$total_usuarios = $a->getTotalUsuarios();

$p = 1;
if(isset($_GET['p']) && !empty($_GET['p'])) {
	$p = addslashes($_GET['p']);
}

$por_pagina = 5;
$total_paginas = ceil($total_anuncios / $por_pagina);



$anuncios = $a->getUltimosAnuncios($p, $por_pagina);

?>

<div class="container">

<!-- 	<img src="assets/images/cidauto.jpg" width="100%" height="30%" alt="cidauto" style="opacity: 0.5">
 -->
	<div class="jumbotron jumbotron-fluid">

		<!--  <img src="assets/images/cidauto.jpg" width="50%" height="50%" alt="cidauto"> -->
		<h1 style="color:red; text-align: center">Carros há venda no momento <strong><?php echo $total_anuncios; ?></strong> carros.</h1>
		<p style="color:black; text-align: center">Anuncie o seu carro aqui temos <strong> <?php echo $total_usuarios; ?> </strong> usuarios!</p>
	</div>
	
	<div class="row">
		<div class="col-sm-3">
			<h4><strong>Pesquisa Avançada</strong></h4>
		</div>
		<div class="col-sm-9">
			<h4> <strong>Últimos anúncios</strong></h4>
			<table class="table table-striped">
				 <tbody>
				  <?php foreach($anuncios as $anuncio): ?>
				  	<tr>
				  		<td>
				           <?php if(!empty($anuncio['url'])): ?>
				          <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" height="30" border="0">
				           <?php else: ?>
				               <img src="assets/images/default.png" height="30" border="0">
				           <?php endif; ?>
        				</td>
				  		<td>
				  			<a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo $anuncio['titulo']; ?></a>
				  			<br>
				  			<?php echo $anuncio['categoria']; ?>
				  		</td>
				  		<td>
				  			<strong>R$</strong> <?php echo number_format($anuncio['valor'], 2); ?>
				  		</td>
				  	</tr>
				  <?php endforeach; ?>
				 </tbody>
			</table>
			<ul class="pagination pagination-sm pull-right">
				<?php for($q=1;$q<=$total_paginas;$q++): ?>
                  <li class="<?php echo ($p==$q)?'active':''; ?>"><a href="index.php?p=<?php echo $q; ?>"><?php echo $q; ?></a></li>
				<?php endfor; ?>	
			</ul>
		</div>
	</div>
</div>

<?php require 'pages/footer.php'; ?>
	