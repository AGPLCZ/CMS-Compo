<?php

/**
 * Word Limiter
 * Omezovač slov
 *
 * Limits a string to X number of words.
 *
 * @param	string
 * @param	int
 * @param	string	the end character. Usually an ellipsis
 * @return	string
 */
function limit($str, $limit = 35, $end_char = '&#8230;')
{
    if (trim($str) === '') {
        return $str;
    }

    preg_match('/^\s*+(?:\S++\s*+){1,' . (int) $limit . '}/', $str, $matches);

    if (strlen($str) === strlen($matches[0])) {
        $end_char = '';
    }

    return rtrim($matches[0]) . $end_char;
}



?>


<?php if (!isset($_GET["clanek"])) {
?>
    <main>
        <div class="container px-4 py-2" id="featured-3">
            <!--<h2 class="pb-2 "></h2>-->
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


                foreach ($arr_articles as $clanek) {
                    $pocet_vypsanych += 1;
                ?>
                    <div class="feature col">
                       <!-- <p><img src="<#?php echo $clanek["picture"]; ?>" alt="" class="img-fluid"></p>-->
                        <h2 class="fs-5"><?php echo $clanek["title"]; ?></h2>
                        <p class="fw-light lh-base" style="text-align: justify; text-justify: inter-character;"><?php echo limit($clanek["perex"]); ?></p>

                        <a class=" btn btn-outline-secondary" href="page.php?page=<?php if (isset($_GET["page"])) {
                                                                                        echo $_GET['page'];
                                                                                    } ?>&clanek=clanek&id=<?php echo $clanek["id"]; ?>" role="button">Zobrazit</a>
                    </div>

                <?php
                    // poslední vypsané id 
                    $lastId = $clanek["id"];
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
                                                                                            ?>&rubric=<?php echo $rubric; ?>&posledniId=<?php echo $lastId ?>">Zobrazit další</a>
                </li>
        </ul>
    </nav>
<?php

} ?>