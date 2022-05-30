<div class="container ">
	<div class="card my-5">

		<div class="card-body text-success bg-light">

			<?php if (isset($categoria)) : ?>
				<h1 class="card-title text-center text-uppercase"><?= $categoria->nombre ?></h1>
				<?php if ($productos->num_rows == 0) : ?>
					<div class="alert alert-warning" role="alert">
						<strong>No</strong> existen productos en esta categoria.

					</div>
				<?php else : ?>
					<div class="container-fluid">
						<div class="row row-cols-1 row-cols-md-3 g-4">
							<?php while ($product = $productos->fetch_object()) : ?>
								<div class="col">
									<div class="card text-success bg-light border-success mb-3 ">

										<div class="card-header justify-content">
											<div class="contenedor d-flex justify-content-center">

												<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
													<?php if ($product->imagen != null) : ?>
														<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="card-img-top imagen" />

														<!-- validacion de oferta -->
														<?php if ($product->oferta == 'si' && $product->stock > 0) : ?>
															<div class="centrado">
																<h3>OFERTA</h3>
																<p><del><?= $product->precio ?> €</del></p>
															</div>
														<?php endif; ?>

													<?php else : ?>
														<img src="<?= base_url ?>assets/img/camiseta.png" class="card-img-top imagen" />
														<!-- validacion de oferta -->
														<?php if ($product->oferta == 'si' && $product->stock > 0) : ?>
															<div class="centrado">
																<h3>OFERTA</h3>
																<p class="card-text"><del><?= $product->precio ?> €</del></p>
															</div>
														<?php endif; ?>
													<?php endif; ?>
												</a>

											</div>
										</div>
										<div class="card-body text-center">
											<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>" style="text-decoration: none;">
												<h5 class="card-title text-uppercase"><?= $product->nombre ?></h5>
											</a>
											<p><?= $product->precio ?> €</p>
											<!--se agrego estas condiciones php para cuando no haya stock-->
											<?php if ($product->stock > 0) : ?>
												<a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="btn btn-outline-success">Comprar</a>
											<?php else : ?>
												<a href="#" class="btn btn-danger">No Disponible</a>
											<?php endif ?>
										</div>

									</div>
								</div>
							<?php endwhile; ?>

						</div>
					</div>
				<?php endif; ?>


			<?php endif; ?>
		</div>
	</div>
</div>