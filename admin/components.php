<?php

/*
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);

use Compo\Admin\Auth\FlashManager;
use Compo\Admin\Auth\Auth;
//FlashManager::setFlashMessage("Nějaká zpráva", 'success');

$pages = DB::query("SELECT pages_id, title FROM `pages` WHERE 1");


$query2 = "
SELECT
    pages.title AS page_title,
    components.components_id,
    pages.pages_id,
    pages.title,
    list_components.list_components_id,
    list_components.name AS list_components_name,
    contents.contents_id,
    contents.name AS contents_name,
    components.order
FROM
    pages
JOIN components ON pages.pages_id = components.pages_id
JOIN list_components ON components.list_components_id = list_components.list_components_id
JOIN contents ON components.contents_id = contents.contents_id
ORDER BY pages.pages_id, components.order
";

$results = DB::query($query2);
*/


?>
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
				<div class="tab-content" id="orders-table-tab-content">
					
				<?= $flashMessage; ?>
				
					<div class="tab-pane fade show active" id="orders-all" role="tabpanel"
						aria-labelledby="orders-all-tab">
						<?php
						$lastPageId = null;
						foreach ($results as $row):
							// Kontrola, zda je aktuální pages_id odlišné od posledního uloženého pages_id
							if ($lastPageId !== $row['pages_id']):
								if ($lastPageId !== null):
									// Ukončení předchozí tabulky a divu, pokud to není první iterace
									?>
									</table>
								</div>
							</div>
						</div>
						<?php
								endif;
								// Nový nadpis a začátek nové tabulky
								?>
					<div class="col-auto">
						<h1 class="app-page-title mb-2">
							<?= htmlspecialchars($row['page_title']) . " Id:" . $row['pages_id']; ?>
						</h1>
					</div>
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table app-table-hover mb-0 text-left">
									<tr>
										<td colspan="10">

											<div class="col-auto">
												<a class="btn app-btn-secondary" href="createContentWhere">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
														fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
														<path
															d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
														<path fill-rule="evenodd"
															d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
													</svg>
													Vytvořit nový content
												</a>
											</div>
										</td>
									</tr>

									<tr>
										<th class="cell">ID</th>
										<th class="cell">Components</th>
										<th class="cell"></th>
										<th class="cell"></th>
										<th class="cell">Contents</th>
										<th class="cell"></th>
										<th class="cell"></th>
										<th class="cell"></th>
										<th class="cell"></th>
										<th class="cell"></th>
									</tr>
									<?php
							endif;
							?>
								<tr class="p-2">
									<td class="cell text-danger">#<?= htmlspecialchars($row['components_id']) ?></td>
									<td class="cell text-info"><?= htmlspecialchars($row['list_components_name']) ?></td>
									<td class="cell">
										<form method="POST" action="editListComponentId.php"><input type="hidden"
												name="editListComponentId"
												value="<?= htmlspecialchars($row['components_id']) ?>"><button type="submit"
												class="btn-sm app-btn-secondary" name="submitComponent"><i
													class="bi bi-pencil-square text-info"></i> Change component</button>
										</form>
									</td>
									<td class="cell"></td>
									<td class="cell text-success"><span class="badge bg-success"
											style="min-width: 40px;">#<?= htmlspecialchars($row['contents_id']) ?></span>
										<?= htmlspecialchars($row['contents_name']) ?></td>


									<td class="cell">
										<form method="POST" action="editComponentsListContentsName"><input type="hidden"
												name="editComponentsListContentsName"
												value="<?= htmlspecialchars($row['contents_id']) ?>"><button type="submit"
												class="btn-sm app-btn-secondary" name="submitContentName"><i
													class="bi bi-pencil-square text-success"></i> Rename</button></form>
									</td>


									<td class="cell">

										<form method="GET" action="/admin/editPageId">
											<input type="hidden" name="components_id"
												value="<?= htmlspecialchars($row['components_id']) ?>">
											<button type="submit" class="btn-sm app-btn-secondary" name="submitContentId">
												<i class="bi bi-pencil-square text-success"></i> Change page
											</button>
										</form>



									</td>



									<td class="cell"><?= htmlspecialchars($row['order']) ?></td>
									<td class="cell">
										<form method="POST" action="EditComponentsOrder/">
											<input type="hidden" name="akce" value="edit">
											<input type="hidden" name="components_id"
												value="<?= htmlspecialchars($row['components_id']) ?>">
											<button type="submit" class="btn-sm app-btn-secondary"
												name="submitContentOrder">
												<i class="bi bi-pencil-square"></i>Edit order
											</button>
										</form>
									</td>

									<td class="cell">
										<form method="POST" action="deleteComponets/">
											<input type="hidden" name="deleteComponents"
												value="<?= htmlspecialchars($row['components_id']) ?>">
											<button type="submit" class="btn-sm app-btn-secondary text-danger"
												name="submitComponentsDel">
												Drop item
											</button>
										</form>
									</td>
								</tr>
								<?php
								$lastPageId = $row['pages_id'];  // Aktualizace lastPageId pro další iteraci
						endforeach;
						if ($lastPageId !== null):
							// Uzavření poslední tabulky a divu
							?>
							</table>
						</div>
					</div>
				</div>
				<?php
						endif;
						?>
		</div>
	</div>
</div>