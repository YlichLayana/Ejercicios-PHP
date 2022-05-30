<div class="container my-4">
	<div class="card border-success mb-3">
		<div class="card-header text-center">
			<h3>Gestionar categorias <a href="<?= base_url ?>categoria/crear" class="btn btn-outline-success">
					<i class="bi bi-plus-circle"> Agregar</i>
				</a></h3>
		</div>
		<div class="card-body">
			<!--agregue esto para mesaje de editar user-->

			<?php if (isset($_SESSION['creaCate']) && $_SESSION['creaCate'] == 'complete') : ?>
				<!--<strong class="alert_green">La categoria se ha modificado correctamente</strong> </br>-->
				<div class="alert alert-success" role="alert">
					<strong>Correcto!</strong> Se ha creado la categoria.
				</div>
			<?php elseif (isset($_SESSION['creaCate']) && $_SESSION['creaCate'] != 'complete') : ?>
				<!--<strong class="alert_red">La categoria NO se Modifico correctamente</strong>-->
				<div class="alert alert-danger" role="alert">
					<strong>Error!</strong> La categoria No se ha creado, ingrese datos correctos.
				</div>
			<?php endif; ?>
			<?php Utils::deleteSession('creaCate'); ?>

			<?php if (isset($_SESSION['editeCate']) && $_SESSION['editeCate'] == 'complete') : ?>
				<!--<strong class="alert_green">La categoria se ha modificado correctamente</strong> </br>-->
				<div class="alert alert-success" role="alert">
					<strong>Correcto!</strong> Se ha modificado la categoria.
				</div>
			<?php elseif (isset($_SESSION['editeCate']) && $_SESSION['editeCate'] != 'complete') : ?>
				<!--<strong class="alert_red">La categoria NO se Modifico correctamente</strong>-->
				<div class="alert alert-danger" role="alert">
					<strong>Error!</strong> La categoria No se Modifico.
				</div>
			<?php endif; ?>
			<?php Utils::deleteSession('editeCate'); ?>

			<?php if (isset($_SESSION['deleteCate']) && $_SESSION['deleteCate'] == 'complete') : ?>
				<!--<strong class="alert_green">La categoria se ha borrado correctamente</strong>-->
				<div class="alert alert-success" role="alert">
					<strong>Correcto!</strong> Se ha eliminado la Categoria.
				</div>
			<?php elseif (isset($_SESSION['deleteCate']) && $_SESSION['deleteCate'] != 'complete') : ?>
				<!--<strong class="alert_red">La categoria NO se ha borrado correctamente, tiene productos agregados</strong>-->
				<div class="alert alert-danger" role="alert">
					<strong>Error!</strong> La categoria NO se ha borrado, tiene productos agregados.
				</div>
			<?php endif; ?>
			<?php Utils::deleteSession('deleteCate'); ?>


			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead class="table-success">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Stock</th>
							<th scope="col">Total</th>
							<th scope="col" colspan="2">Acciones</th>

						</tr>
					</thead>
					<tbody>
						<?php while ($cat = $categorias->fetch_object()) : ?>
							<tr>
								<td><?= $cat->id; ?></td>
								<td><?= $cat->nombre; ?></td>
								<td><?= $cat->stock; ?></td>
								<td><?= $cat->total ?> €</td>
								<td>
									<a href="<?= base_url ?>categoria/editar&id=<?= $cat->id ?>" class="btn btn-outline-success">
										<i class="bi bi-pencil-square"></i>
									</a>
								</td>

								<td>
									<a href="<?= base_url ?>categoria/eliminar&id=<?= $cat->id ?>" class="btn btn-outline-danger">
										<i class="bi bi-trash"></i>
									</a>
								</td>

							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>