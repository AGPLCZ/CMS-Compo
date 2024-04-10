<div class="container py-3">
    <main>
        <div class="table-responsive">
            <table class="table text-start fw-light">
                <tr>
                    <th>Služby</th>
                    <th>Započítáno v ceně</th>
                    <th>Cena</th>

                </tr>

                <?php foreach ($cenik as $data) {
                ?>
                    <tr>
                        <td class="cell"><?= $data["sluzby"]; ?></td>
                        <td class="cell"><?= $data["co"]; ?></td>
                        <td class="cell"><?= $data["cena"]; ?></td>
                    </tr>
                <?php } ?>


                <tr>
                    <td>Průvodcovské / lektorské služby</td>
                    <td></td>
                    <td><small class="text-muted fw-light">2 hodiny / </small><small class="text-success fw-light"><?php echo $cena_btc = $cena_hodina * 2 * $kurz_btc; ?> BTC</small>
                        <br>
                        <small class="text-muted fw-light">1 den / </small><small class="text-success fw-light"><?php echo $cena_btc = $cena_hodina * 8 * $kurz_btc; ?> BTC</small>
                        <br>
                        <small class="text-muted fw-light">24 hodin / </small><small class="text-success fw-light"><?php echo $cena_btc = $cena_hodina * 12 * $kurz_btc; ?> BTC</small>
                    </td>
                </tr>
            </table>
        </div>
    </main>
</div>