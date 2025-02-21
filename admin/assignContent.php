<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Přiřadit obsah ke stránce</h1>
                </div>
            </div>
            <hr class="my-4">
            <div class="tab-content" id="assign-content-tab">
                <div class="tab-pane fade show active" id="assign-content" role="tabpanel">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">
                            <?php if (!empty($formData)) : ?>
                                <form method="post" action="assignContent">
                                    <input type="hidden" name="contents_id" value="<?= htmlspecialchars($formData['contents_id'] ?? ''); ?>">

                                    <!-- Název obsahu -->
                                    <div class="mb-3">
                                        <label for="content_name" class="form-label">Název obsahu:</label>
                                        <input type="text" id="content_name" class="form-control bg-light" 
                                               value="<?= htmlspecialchars($formData['name'] ?? ''); ?>" disabled>
                                    </div>

                                    <!-- Výběr stránky -->
                                    <div class="mb-3">
                                        <label for="pages_id" class="form-label">Vyber stránku:</label>
                                        <select id="pages_id" name="pages_id" class="form-select" required>
                                            <?php foreach ($formData['pages'] as $page) : ?>
                                                <option value="<?= htmlspecialchars($page['pages_id']); ?>">
                                                    <?= htmlspecialchars($page['title']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Výběr komponenty -->
                                    <div class="mb-3">
                                        <label for="list_components_id" class="form-label">Vyber blok:</label>
                                        <select id="list_components_id" name="list_components_id" class="form-select" required>
                                            <?php foreach ($formData['components'] as $component) : ?>
                                                <option value="<?= htmlspecialchars($component['list_components_id']); ?>"
                                                    <?= ($formData['current_list_components_id'] ?? '') == $component['list_components_id'] ? 'selected' : ''; ?>>
                                                    <?= htmlspecialchars($component['name']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Pořadí -->
                                    <div class="mb-3">
                                        <label for="order" class="form-label">Pořadí:</label>
                                        <input type="number" id="order" name="order" class="form-control bg-light" min="0" 
                                               value="<?= htmlspecialchars($formData['current_order'] ?? 0); ?>" required>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button type="submit" name="assignContent" class="btn btn-primary">
                                            <i class="bi bi-link-45deg"></i> Přiřadit obsah
                                        </button>
                                        <a href="components.php" class="btn btn-secondary">
                                            <i class="bi bi-arrow-left"></i> Zpět
                                        </a>
                                    </div>
                                </form>
                            <?php else : ?>
                                <p class="text-danger">❌ Chyba: Obsah nebyl nalezen.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
