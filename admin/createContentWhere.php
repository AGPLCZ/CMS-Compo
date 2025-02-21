<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Přidat obsah ke stránce</h1>
                </div>
            </div>
            <hr class="my-4">
            <div class="tab-content" id="edit-content-tab-content">
                <div class="tab-pane fade show active" id="edit-content" role="tabpanel">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <form method="post" action="createContentWhere">
                                <div class="mb-3">
                                    <label for="pages_id" class="form-label">Vyber stránku:</label>
                                    <select id="pages_id" name="pages_id" class="form-select">
                                        <?php foreach ($pages as $page) : ?>
                                            <option value="<?= htmlspecialchars($page['pages_id']); ?>">
                                                <?= htmlspecialchars($page['title']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="list_components_id" class="form-label">Vyber blok:</label>
                                    <select id="list_components_id" name="list_components_id" class="form-select">
                                        <?php foreach ($components as $component) : ?>
                                            <option value="<?= htmlspecialchars($component['list_components_id']); ?>">
                                                <?= htmlspecialchars($component['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="order" class="form-label">Pořadí:</label>
                                    <input type="number" id="order" name="order" class="form-control" min="0" value="0">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" name="submitCreateContentExecute" class="btn app-btn-primary">Přidat obsah</button>
                                    <a href="<?= htmlspecialchars($formData['back'] ?? 'index.php'); ?>" class="btn btn-secondary">Zpět</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
