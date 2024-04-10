<?php if (!isset($_GET["clanek"])) {
?>
    <main>
        <div class="container px-4 py-2" id="featured-3">
           <!-- <h2 class="pb-2 "></h2>-->
            <a class="btn btn-secondary mx-1 mb-2" href="page.php?page=<?php if (isset($_GET["page"])) {
                                                                    echo $_GET['page'];
                                                                } ?>">Všechny kategorie</a>


            <?php foreach ($arr_tags as $tags) { ?>
                <a class="btn btn-primary mx-1 mb-2" href="page.php?page=<?php if (isset($_GET["page"])) {
                                                                    echo $_GET['page'];
                                                                } ?>&rubric=<?php echo $tags["id"] ?>"> <?php echo $tags["title"] ?> </a>
            <?php
            }
            ?>


            <div class="row g-4 py-5 row-cols-1 row-cols-lg-<?php echo $page["href1"]; ?>">


                <?php
                //Potřebné parametry před vypsáním galerie, pokud nejsou v GET else = přenastavené parametry


                foreach ($arr_galerie as $galerie) {
                    $pocet_vypsanych += 1;
                ?>
                    <div class="feature col">
                        <p><img src="<?php echo $galerie["img"]; ?>" alt="" class="img-fluid"></p>
                        <h3 class="fs-5"><?php echo $galerie["title"]; ?></h3>
                        <p class="fw-light lh-base" style="text-align: justify; text-justify: inter-character;"><?php echo $galerie["perex"]; ?></p>

                        <a class=" btn btn-outline-secondary" href="<?php echo $galerie["href"]; ?>" role="button">Zobrazit</a>
                    </div>

                <?php
                    // poslední vypsané id 
                    $posledniId = $galerie["id"];
                } ?>
            </div>
        </div>

    </main>


    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            if (isset($_GET["posledniId"])) {

                echo '<li class="page-item">';
            } else {
                echo '<li class="page-item disabled">';
            }
            ?>
            <a class="page-link" href="<?php echo BASE_URL_WEB . $pageName ?>.php?page=<?php if (isset($_GET["page"])) {
                                                                                            echo $_GET['page'];
                                                                                        }
                                                                                        ?>
        ">První stránka</a>
            </li>

            <?php if ($pocet_vypsanych == $limit) {
            ?>
                <li class="page-item">
                <?php } else { ?>
                <li class="page-item disabled">

                <?php } ?>




                <a class="page-link" href="<?php echo BASE_URL_WEB . $pageName; ?>.php?page=<?php if (isset($_GET["page"])) {
                                                                                                echo $_GET['page'];
                                                                                            }
                                                                                            ?>&rubric=<?php echo $id_rubriky; ?>&posledniId=<?php echo $posledniId ?>">Zobrazit další</a>
                </li>
        </ul>
    </nav>
<?php

} ?>