<?php 
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);



use Compo\Admin\Auth\FlashManager; // ponecháme jen relevantní use


// Zkontrolujeme, zda byl formulář odeslán metodou POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contents_id'])) {
    $contents_id = (int)$_POST['contents_id'];
} else {
    die("Neplatný požadavek.");
}

// Načteme detaily obsahu podle ID
$content = DB::queryFirstRow("SELECT * FROM contents WHERE contents_id=%i", $contents_id);

if (!$content) {
    die("Obsah nenalezen.");
}
?>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center mt-4 justify-content-between">
                <div class="tab-content" id="orders-table-tab-content">
                    <?= FlashManager::showFlashMessage(); ?>
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel">
                        <div class="col-auto">
                            <h1 class="app-page-title mb-2">Detail obsahu ID #<?= htmlspecialchars($content['contents_id']) ?></h1>
                        </div>
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <tr><th class="cell">ID</th><td class="cell text-danger">#<?= htmlspecialchars($content['contents_id']) ?></td></tr>
                                        <tr><th class="cell">Page ID</th><td class="cell text-info"> <?= htmlspecialchars($content['page_id']) ?></td></tr>
                                        <tr><th class="cell">Name</th><td class="cell text-success"> <?= htmlspecialchars($content['name']) ?></td></tr>
                                       
                                        <?php for ($i = 1; $i <= 20; $i++): ?>
                                            <?php $field = "content" . $i; ?>
                                            <?php if (!empty($content[$field])): ?>
                                                <tr><th class="cell">Obsah <?= $i ?></th><td class="cell"> <?= nl2br(htmlspecialchars($content[$field])) ?></td></tr>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </table>
                                </div>
                                <form method="POST" action="contentList">
                                    <button type="submit" class="btn btn-secondary mt-3">Zpět</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>