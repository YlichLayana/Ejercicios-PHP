<!--<h1>Crear nueva categoria</h1>-->
<div class="container my-4 ">
	<div class=".col-auto p-5">

		<?php if (isset($edit) && isset($cate) && is_object($cate)) : ?>
			<h1 class="text-center text-success">Editar producto: <?= $cate->nombre ?></h1>

			<?php $url_action = base_url . "categoria/saveEditado&id=" . $cate->id; ?>
		<?php else : ?>
			<h1 class="text-center text-success">Crear nueva categoria</h1>
			<?php $url_action = base_url . "categoria/save"; ?>
		<?php endif; ?>

		<div class="card border-success mb-3 mx-3">
			<div class="card-body text-success">
				<!--<form action="<?= base_url ?>categoria/save" method="POST">-->
				<form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">
					<label for="nombre">Nombre</label>
					<!--	<input type="text" name="nombre" required/>-->
					<input type="text" name="nombre" value="<?= isset($cate) && is_object($cate) ? $cate->nombre : ''; ?>" />

					<input type="submit" value="Guardar" />
				</form>
			</div>
		</div>
	</div>
</div>