<?php
//var_dump($formData);
//var_dump($pages);

?>
<div class="container mt-4">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">
                <?= isset($formData['pages_id']) ? 'Upravit stránku' : 'Vytvořit novou stránku' ?>
            </h1>
        </div>
        <div class="col-auto">
            <a class="btn app-btn-secondary" href="<?= htmlspecialchars($formData['back'] ?? 'pages'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
                zpět na stránku
            </a>
        </div>
    </div>
    <hr class="my-4">
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <?php if (!empty($pages)): ?>
                        <form method="post" action="<?= $this->url ?>/admin/createPage/">
                            <input type="hidden" name="pages_id"
                                value="<?= htmlspecialchars($formData['pages_id'] ?? ''); ?>">
                            <div class="mb-3">
                                <label for="title" class="form-label">Název stránky:</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="<?= htmlspecialchars($formData['title'] ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="uri" class="form-label">URI stránky:</label>
                                <input type="text" id="uri" name="uri" class="form-control"
                                    value="<?= htmlspecialchars($formData['uri'] ?? ''); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="menu_order" class="form-label">Pořadí v menu:</label>
                                <input type="number" id="menu_order" name="menu_order" class="form-control" min="0"
                                    value="<?= htmlspecialchars($formData['menu_order'] ?? ''); ?>" required>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="visible_in_menu" name="visible_in_menu"
                                    <?= !empty($formData['visible_in_menu']) ? 'checked' : ''; ?>>
                                <label for="visible_in_menu" class="form-check-label">Viditelné v menu</label>
                            </div>
                            <div class="mb-3">
                                <label for="parent_id" class="form-label">Nadřazená stránka (volitelné):</label>
                                <select id="parent_id" name="parent_id" class="form-select">
                                    <option value="">Žádná</option>
                                    <?php foreach ($pages as $page): ?>
                                        <option value="<?= htmlspecialchars($page['pages_id']); ?>"
                                            <?= isset($formData['parent_id']) && $formData['parent_id'] == $page['pages_id'] ? 'selected' : ''; ?>>
                                            <?= htmlspecialchars($page['title']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn app-btn-primary">
                                <?= isset($formData['pages_id']) ? 'Uložit změny' : 'Vytvořit stránku' ?>
                            </button>
                        </form>
                    <?php endif; ?>

                    <div class="mb-3">
                    <br>
                    <?php if (!empty($formData['pages_id'])): ?>
                        <form method="post" action="<?= $this->url ?>/admin/createPage/"
                            onsubmit="return confirm('Opravdu chcete tuto stránku smazat?');">
                            <input type="hidden" name="delete_pages_id"
                                value="<?= htmlspecialchars($formData['pages_id']); ?>">
                            <button type="submit" class="btn btn-danger">Smazat stránku</button>
                        </form>
                    <?php endif; ?>
</div>
                </div>

            </div>


        </div>

    </div>
</div>


