<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Změnit stránku komponenty</h1>
                </div>
            </div>
            <hr class="my-4">
            <div class="tab-content" id="edit-page-tab-content">
                <div class="tab-pane fade show active" id="edit-page" role="tabpanel">
                    <div class="app-card app-card-settings shadow-sm p-4">
                        <div class="app-card-body">


                            <form method="post" action="/admin/editPageId">
                                <!-- Skrytý input pro komponentu -->
                                <input type="hidden" name="components_id"
                                    value="<?= htmlspecialchars($_POST['components_id'] ?? $_GET['components_id'] ?? '') ?>">

                                <div class="mb-3">
                                    <label for="new_page_id" class="form-label">Vyber novou stránku:</label>
                                    <select id="new_page_id" name="new_page_id" class="form-select" required>
                                        <option value="" disabled selected>-- Vyber stránku --</option>
                                        <?php foreach ($pages as $page): ?>
                                            <option value="<?= htmlspecialchars($page['pages_id']); ?>">
                                                <?= htmlspecialchars($page['title']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn app-btn-primary">Změnit stránku</button>
                                    <a href="/admin/components" class="btn btn-secondary">Zpět</a>
                                </div>
                            </form>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>