<?php
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);

use Compo\Admin\Auth\FlashManager;
use Compo\Admin\Auth\Auth;

$pages = DB::query("SELECT pages_id, title, uri, menu_order, visible_in_menu, parent_id FROM `pages` ORDER BY menu_order ASC");
?>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-2">Správa stránek</h1>
                </div>
            </div>
            <div class="tab-content" id="pages-table-tab-content">
                <?= FlashManager::showFlashMessage(); ?>
                <div class="tab-pane fade show active" id="pages-all" role="tabpanel">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">

                               <table class="table app-table-hover mb-0 text-left">
                                    <thead>

                                        <tr>
                                            <td colspan="7">

                                                <div class="col-auto">
                                                    <a class="btn app-btn-secondary" href="createPage">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-person-plus"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                            <path fill-rule="evenodd"
                                                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                                        </svg>
                                                        Vytvořit nový odkaz v menu
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th class="cell">ID</th>
                                            <th class="cell">Název stránky</th>
                                            <th class="cell">URI</th>
                                            <th class="cell">Pořadí</th>
                                            <th class="cell">Viditelnost</th>
                                            <th class="cell">Nadřazená stránka</th>
                                            <th class="cell">Akce</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pages as $page): ?>
                                            <tr>
                                                <td class="cell">#<?= htmlspecialchars($page['pages_id']) ?></td>
                                                <td class="cell"><?= htmlspecialchars($page['title']) ?></td>
                                                <td class="cell"><?= htmlspecialchars($page['uri']) ?></td>
                                                <td class="cell"><?= htmlspecialchars($page['menu_order']) ?></td>
                                                <td class="cell"><?= $page['visible_in_menu'] ? 'Ano' : 'Ne' ?></td>
                                                <td class="cell">
                                                    <?= $page['parent_id'] ? htmlspecialchars($page['parent_id']) : 'Žádná' ?>
                                                </td>
                                                <td class="cell">
                                                    <form method="POST" action="createPage">
                                                        <input type="hidden" name="pages_id"
                                                            value="<?= htmlspecialchars($page['pages_id']); ?>">
                                                        <button type="submit" class="btn-sm app-btn-secondary">
                                                            <i class="bi bi-pencil-square text-info"></i> Change
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

