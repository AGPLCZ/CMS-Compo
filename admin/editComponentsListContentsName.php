<div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Editovat název obsahu</h1>
                    </div>
                </div>
                <hr class="my-4">
                <div class="tab-content" id="edit-content-tab-content">
                    <div class="tab-pane fade show active" id="edit-content" role="tabpanel">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form method="post" action="editComponentsListContentsName">
                                    <input type="hidden" name="contents_id" value="<?= htmlspecialchars($formData['contents_id'] ?? ''); ?>">
                                    <input type="hidden" name="back_url" value="<?= htmlspecialchars($formData['back_url'] ?? ''); ?>">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nový název obsahu:</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            value="<?= htmlspecialchars($formData['name'] ?? ''); ?>" required>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" name="akce" value="update" class="btn app-btn-primary">Uložit změny</button>
                                        <a href="<?= htmlspecialchars($formData['back_url'] ?? 'index.php'); ?>" class="btn btn-secondary">Zpět</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>