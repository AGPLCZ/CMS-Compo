<?php
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);
require_once "header.php";


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
							<th class="cell">Components ID</th>
							<th class="cell">List Components ID</th>
							<th class="cell">List Components Name</th>
							<th class="cell">Contents ID</th>
							<th class="cell">Contents Name</th>
							<th class="cell">Order</th>
						</tr>
					<?php
							endif;
					?>
					<tr>
						<td class="cell"><?= htmlspecialchars($row['components_id']) ?></td>
						<td class="cell"><?= htmlspecialchars($row['list_components_id']) ?></td>
						<td class="cell"><?= htmlspecialchars($row['list_components_name']) ?></td>
						<td class="cell"><?= htmlspecialchars($row['contents_id']) ?></td>
						<td class="cell"><?= htmlspecialchars($row['contents_name']) ?></td>
						<td class="cell"><?= htmlspecialchars($row['order']) ?></td>
						<td class="cell">
							<form action="page name.php" method="post">
								<button type="submit" class="btn-sm app-btn-secondary" name="submitComponentsDel">Smazat položku</button>
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

<?php require_once "footer.php"; ?>


