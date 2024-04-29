<?php
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



?>
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
				<div class="tab-content" id="orders-table-tab-content">
				<?= FlashManager::showFlashMessage(); ?>
					<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<?php
						$lastPageId = null;
						foreach ($results as $row) :
							// Kontrola, zda je aktuální pages_id odlišné od posledního uloženého pages_id
							if ($lastPageId !== $row['pages_id']) :
								if ($lastPageId !== null) :
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
						<td class="cell"><form method="POST" action="editComponentsListComponentsId.php"><input type="hidden" name="editComponentsListComponentsId" value="<?= htmlspecialchars($row['components_id']) ?>"><button type="submit" class="btn-sm app-btn-secondary" name="submitComponent"><i class="bi bi-pencil-square text-info"></i> Change</button></form></td>
						<td class="cell"></td>
						<td class="cell text-success"><span class="badge bg-success" style="min-width: 40px;"><?= htmlspecialchars($row['contents_id']) ?></span> <?= htmlspecialchars($row['contents_name']) ?></td>
						<td class="cell"><form method="POST" action="editComponentsListContentsId.php"><input type="hidden" name="editComponentsListContentsId" value="<?= htmlspecialchars($row['contents_id']) ?>"><button type="submit" class="btn-sm app-btn-secondary" name="submitContentId"><i class="bi bi-pencil-square text-success"></i> Change</button></form></td>

						<td class="cell"><form method="POST" action="editComponentsListContentsName.php"><input type="hidden" name="editComponentsListContentsName" value="<?= htmlspecialchars($row['contents_id']) ?>"><button type="submit" class="btn-sm app-btn-secondary" name="submitContentName"><i class="bi bi-pencil-square text-success"></i> Rename</button></form></td>

						<td class="cell"><?= htmlspecialchars($row['order']) ?></td>
						<td class="cell"><form method="POST	" action="editComponentsListContentsOrder.php"><input type="hidden" name="editComponentsListContentsOrdereditComponentsListContentsOrder" value="<?= htmlspecialchars($row['contents_id']) ?>"><button type="submit" class="btn-sm app-btn-secondary" name="submitContentOrder"><i class="bi bi-pencil-square"></i>Edit order</button></form></td>
						
						<td class="cell"><form method="POST" action="deleteComponets/"><input type="hidden" name="deleteComponents" value="<?= htmlspecialchars($row['components_id']) ?>"><button type="submit" class="btn-sm app-btn-secondary text-danger" name="submitComponentsDel">Drop item</button>
							</form>
						</td>
					</tr>
				<?php
							$lastPageId = $row['pages_id'];  // Aktualizace lastPageId pro další iteraci
						endforeach;
						if ($lastPageId !== null) :
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

