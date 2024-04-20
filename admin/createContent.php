<?php
require_once '../db.meekro.php';
require_once "../config.php";
require_once '../vendor/autoload.php';

use Compo\Admin\CreateContent;

$createContent = new CreateContent();
$data = $createContent->handleRequest();
$components = $createContent->selectListComponents();
if (!empty($data)) :

	require_once "header.php";
?>
	<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">

				<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
					<div class="col-auto">
						<h1 class="app-page-title mb-0">Úprava bloku</h1>

					</div>
					<div class="col-auto">
						TEXT
						</form>

					</div>

					<div class="col-auto">
						<a class="btn app-btn-secondary" href="<?= htmlspecialchars($data['back']); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
							</svg>
							zpět na stránku
						</a>
					</div>

					<!--//col-auto-->
				</div>
				<!--//row-->

				<hr class="my-4">
				<div class=" tab-content" id="orders-table-tab-content">
					<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

						<div class="app-content pt-3 p-md-3 p-lg-4">
							<div class="container-xl">
								<div class="row g-4 settings-section">
									<div class="col-12 col-md-12">
										<div class="app-card app-card-settings shadow-sm p-4">

											<div class="app-card-body">

												<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
													<div class="form-group">

														<div class="mb-3">
															<input type="hidden" name="back" value="<?= htmlspecialchars($data['back']); ?>">
															<input type="hidden" name="pages_id" value="<?= htmlspecialchars($data['pages_id']); ?>">
															<input type="hidden" name="order" value="<?= htmlspecialchars($data['order']); ?>">

															<div class="form-group">
																<div class="mb-3">
																	<label for="componentSelect" class="form-label">Vyber šablonu pro komponentu:</label>

																	<select id="componentSelect" name="list_components_id" class="form-control">
																		<?php foreach ($components as $component) : ?>
																			<option value="<?= htmlspecialchars($component['list_components_id']); ?>"><?= htmlspecialchars($component['name']); ?></option>
																		<?php endforeach; ?>
																	</select>
																</div>
															</div>

														</div>
														<div class="mb-3">
															<button type="submit" name="submitCreateContent" class="btn app-btn-primary">Vytvořit komponent</button>
														</div>

													</div>
												</form>
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



<?php endif ?>


<?php require_once "footer.php"; ?>