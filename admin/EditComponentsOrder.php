<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
				<div class="col-auto">
					<?php
					?>
					<h1 class="app-page-title mb-0">Úprava bloku</h1>

				</div>
				<div class="col-auto">
					TEXT
					</form>

				</div>

				<div class="col-auto">
					<a class="btn app-btn-secondary" href="<?php echo $formData['back_url'] ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
							class="bi bi-list-ul" viewBox="0 0 16 16">
							<path fill-rule="evenodd"
								d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
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
											<?php if (is_array($formData)): ?>

												<form method="POST"
													action="<?php echo htmlspecialchars($formData['action_url']); ?>"
													method="post" class="form-signup">

													<div class="form-group">

														<div class="mb-3">
															<input type="hidden" name="akce" value="update">
															<input type="hidden" name="back_url"
																value="<?php echo htmlspecialchars($formData['back_url']); ?>">
															<input type="hidden" name="components_id"
																value="<?php echo htmlspecialchars($formData['components_id']); ?>">

															<div class="mb-3">
																<label for="setting-input-1"
																	class="form-label">tittle1</label>
																<textarea type="text" name="order" class="form-control"
																	rows="2"
																	placeholder=""><?php echo htmlspecialchars($formData['order']); ?></textarea>
															</div>
														</div>
														<div class="mb-3">

															<button type="submit" class="btn app-btn-primary"
																name="submit">Uložit změny</button>
														</div>
													</div>
												</form>
											<?php elseif (is_string($formData)): ?>
												<?php echo $formData . "Chyba!"; ?>

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

<?php endif; ?>