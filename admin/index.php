<?php
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);
require_once "header.php";


$query = "
SELECT
    components.components_id,
    pages.pages_id,
    pages.title,
    list_components.list_components_id,
    list_components.name AS list_components_name,
    contents.contents_id,
    contents.name AS contents_name,
    components.order
FROM
    components
JOIN pages ON components.pages_id = pages.pages_id
JOIN list_components ON components.list_components_id = list_components.list_components_id
JOIN contents ON components.contents_id = contents.contents_id
ORDER BY pages.pages_id, components.order
";

$results = DB::query($query);



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

$results2 = DB::query($query2);



?>

<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Menu</h1>
					<?php

					// GET ODESLÁNO - polozkyNew
					if (isset($_GET["odeslano"])) {

						// Hláška z GET - účet vytvořen
						if ($_GET["odeslano"] == "vytvorena") {

							echo '<span class="btn btn-warning">
							
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
							<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
						  </svg>

							Položka byla vytvořena</span>';
						}


						// Hláška z GET 
						if ($_GET["odeslano"] == "upravena") {
							echo '<p class="btn btn-warning">
														
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg>
																
						Položka byla upravena</p>';
						}
					}
					?>
				</div>


				<div class=" tab-content" id="orders-table-tab-content">
					<div class=" tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
							<div class="app-card-body">
								<div class="table-responsive">
									<form action="<?php echo "page name" ?>.php" method="post">


										<table class=" table app-table-hover mb-0 text-left">

											<thead>
												<tr>
												<tr>
													<td colspan="7">

														<div class="col-auto">
															<a class="btn app-btn-secondary" href="menu_new.php">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
																	<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
																	<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
																</svg>
																Vytvořit novou položku
															</a>
														</div>
													</td>

												</tr>


												<tr>

													<th class="cell" colspan="7"> </th>



												</tr>



											</thead>
											<tbody>

												<?php
												$lastPageId = null;

												foreach ($results2 as $row2) :
													// Kontrola, zda je aktuální pages_id odlišné od posledního uloženého pages_id
													if ($lastPageId !== $row2['pages_id']) {
														// Pokud ano, vytiskneme hlavičku stránky
														echo '<tr><td colspan="7" class="page-header">' . htmlspecialchars($row2['page_title']) . '</td></tr>';
														$lastPageId = $row2['pages_id']; // Aktualizace posledního pages_id

												?>
														<tr>

															<th class="cell">Components ID</th>
															<th class="cell">Pages ID</th>
															<th class="cell">Title</th>
															<th class="cell">List Components ID</th>
															<th class="cell">List Components Name</th>
															<th class="cell">Contents ID</th>
															<th class="cell">Contents Name</th>
															<th class="cell">Order</th>


														</tr>

													<?php }

													// Vytiskneme řádek pro komponentu
													echo '<tr>';
													echo '<td class="cell">' . htmlspecialchars($row2['components_id']) . '</td>';
													?>
													<td class="cell"><?php echo htmlspecialchars($row2['pages_id']); ?></td>
													<td class="cell"><?php echo htmlspecialchars($row2['page_title']); ?></td>
													<td class="cell"><?php echo htmlspecialchars($row2['list_components_id']); ?></td>
													<td class="cell"><?php echo htmlspecialchars($row2['list_components_name']); ?></td>
													<td class="cell"><?php echo htmlspecialchars($row2['contents_id']); // opakování, pokud je to zamýšleno 
																		?></td>
													<td class="cell"><?php echo htmlspecialchars($row2['contents_name']); ?></td>
													<td class="cell"><?php echo htmlspecialchars($row2['order']); ?></td>

												<?php
													echo '</tr>';

												endforeach; ?>






												<!--	<td class="cell"><a class="btn btn-outline-secondary" href="menu_update.php?updateId=<?php echo "1"; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
																	<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
																	<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
																</svg> Upravit položku </a></td>-->




												<tr>
													<td class="cell" colspan="8"><button type="submit" class="btn app-btn-primary theme-btn mx-auto" name="SubmitDel">Smazat položku</button></td>
												<tr>


											</tbody>

										</table>
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

<?php require_once "footer.php"; ?>