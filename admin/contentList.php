<?php
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);

use Compo\Admin\Auth\FlashManager;
use Compo\Admin\Auth\Auth;

// FlashManager::setFlashMessage("Nějaká zpráva", 'success');

// Získáme všechny obsahové bloky, které nejsou přiřazeny k žádné stránce v `components`


// Získáme všechny obsahové bloky, které nejsou přiřazeny k žádné stránce v `components`
$query = "
SELECT c.contents_id, c.page_id, c.name 
FROM contents c
LEFT JOIN components cmp ON c.contents_id = cmp.contents_id
WHERE cmp.contents_id IS NULL
ORDER BY c.contents_id ASC
";

$freeContents = DB::query($query);
?>

<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
				<div class="tab-content" id="orders-table-tab-content">
					<?= FlashManager::showFlashMessage(); ?>
					<div class="tab-pane fade show active" id="orders-all" role="tabpanel"
						aria-labelledby="orders-all-tab">
						<div class="col-auto">
							<h1 class="app-page-title mb-2">Nepřiřazené obsahové bloky</h1>
						</div>
						<div class="app-card app-card-orders-table shadow-sm mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<table class="table app-table-hover mb-0 text-left">
										<tr>
											<th class="cell">ID</th>
											<th class="cell">Page ID</th>
											<th class="cell">Name</th>
											<th class="cell">Detail</th>
											<th class="cell">Akce</th>
											<th class="cell">Akce</th>
										</tr>
										<?php foreach ($freeContents as $content): ?>
											<tr class="p-2">
												<td class="cell text-danger">
													#<?= htmlspecialchars($content['contents_id']) ?></td>
												<td class="cell text-info"> <?= htmlspecialchars($content['page_id']) ?>
												</td>
												<td class="cell text-success"> <?= htmlspecialchars($content['name']) ?>
												</td>

												<td class="cell">
													<form method="POST" action="viewContentDetails">
														<input type="hidden" name="contents_id"
															value="<?= htmlspecialchars($content['contents_id']); ?>">
														<button type="submit" class="btn-sm app-btn-secondary">
															<i class="bi bi-eye"></i> Detail
														</button>
													</form>
												</td>

												<td class="cell">
													<form method="POST" action="assignContent">
														<input type="hidden" name="contents_id"
															value="<?= htmlspecialchars($content['contents_id']); ?>">
														<input type="hidden" name="current_list_components_id"
															value="<?= htmlspecialchars($content['list_components_id'] ?? ''); ?>">
														<input type="hidden" name="current_order"
															value="<?= htmlspecialchars($content['order'] ?? 0); ?>">
														<button type="submit" class="btn-sm app-btn-secondary"
															name="assignContent">
															<i class="bi bi-link-45deg text-success"></i> Přiřadit
														</button>
													</form>
												</td>
												<td class="cell">
													<form method="POST" action="deleteContent.php"
														style="display:inline-block;"
														onsubmit="return confirm('Opravdu chcete tento obsah smazat?');">
														<input type="hidden" name="contents_id"
															value="<?= htmlspecialchars($content['contents_id']); ?>">
														<button type="submit" class="btn-sm app-btn-secondary"
															name="deleteContent">
															<i class="bi bi-trash text-danger"></i> Smazat
														</button>
													</form>
												</td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>