<?php
require_once '../db.meekro.php';
require_once "../config.php";
require_once '../vendor/autoload.php';

use Compo\Admin\CreateContent;


if (isset($_POST["submitPageRender"])) {
	$pages_id = $_POST['pages_id'];
	$order = $_POST['order'];

	$order +=1;
	$back = $_SERVER['HTTP_REFERER'];
}

$createContent = new CreateContent();
$components = $createContent->selectListComponents();  // Načtení seznamu komponent

if (isset($_POST["submitCreateContent"])) {
	$back = $_POST['back'];
	$pages_id = $_POST['pages_id'];
	$order = $_POST['order'];
	$list_components_id = $_POST['list_components_id'];  // Získání ID vybrané komponenty z formuláře

	$contents_id = $createContent->insertContent($pages_id);
	$createContent->insertComponents($pages_id, $list_components_id, $contents_id, $order);

	// Přesměrování zpět na stránku, odkud uživatel přišel
	header("Location: {$back}");
	exit;
}


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
						<a class="btn app-btn-secondary" href="">
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

												<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
												<input type="hidden" name="back" value="<?php echo htmlspecialchars($back); ?>">	
												<input type="hidden" name="pages_id" value="<?php echo htmlspecialchars($pages_id); ?>">
													<input type="hidden" name="order" value="<?php echo htmlspecialchars($order); ?>">

													<div class="form-group">
														<label for="componentSelect">Vyber šablonu pro komponentu:</label>
														<select id="componentSelect" name="list_components_id" class="form-control">
															<?php foreach ($components as $component) : ?>
																<option value="<?= htmlspecialchars($component['list_components_id']); ?>"><?= htmlspecialchars($component['name']); ?></option>
															<?php endforeach; ?>
														</select>
													</div>

													<button type="submit" name="submitCreateContent" class="btn btn-primary">Vytvořit komponent</button>
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









<?php require_once "footer.php"; ?>