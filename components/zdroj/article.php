<?php if (isset($_GET["clanek"])) {
?>
    <div class="container">
        <!-- page#content -->
        <section class="page my-5">

            <div class="row">


                <div class="col-xs-12 col-sm-12 col-md-2 col-lg2">



                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 px-4" style="text-align: justify; text-justify: inter-character";>



                    <h2 id="list-item-5"><?php echo $pageR["title"]; ?>​</h2>

                    <p class="lead mb-4" style="text-align: justify; text-justify: inter-character;"><?php echo $pageR["perex"]; ?></p>
                    <span class="fw-light lh-base" style=""><p style="text-align: justify; text-justify: inter-character;"><?php echo $pageR["content"]; ?></p></span>


                </div>


                <div class="col-xs-12 col-sm-12 col-md-1 col-lg1">



                </div>



                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">


                    <div id="list" class="list-group">
                        <a class="list-group-item list-group-item-primary" href="index.php?page=<?php if (isset($_GET["page"])) {
                                                                                                    echo $_GET['page'];
                                                                                                } ?>"> <i class="bi bi-tags" aria-hidden="true"></i> Všechny témata</a>



                        <?php
                        foreach ($arr as $page2) {
                        ?>

                            <a class="list-group-item list-group-item-action" href="page.php?page=<?php if (isset($_GET["page"])) {
                                                                                                        echo $_GET['page'];
                                                                                                    } ?>&rubric=<?php echo $page2["id"] ?>">
                                <i class="bi bi-tag" aria-hidden="true"></i> <?php echo $page2["title"] ?> </a>


                        <?php
                        }
                        ?>


                    </div>


                    <div class="page" style="margin-left: 5px; text-align: justify; text-justify: inter-character;">
                        <p class="mt-5">PROPAGACE A ZMĚNA</p>
                        
                        <span class="fw-light lh-base">
                        
                        <p style=" text-align: justify; text-justify: inter-character;">Mím cílem je šíření povědomí o sebeřízeném vzdělávání, propaguji cesty jak obcházet diktát většiny, nabízím prostředky a příležitosti ke svobodnému vzdělávání.
                        </p>
                    </span>
                       
                    </div>

<!--

                    <div class="page my-4">
                        <h5>Tři hlavní hodnoty</h5>
                        <ul class="icon-list">
                            <li class="text-muted">Svoboda</li>
                            <li class="text-muted">Respekt</li>
                            <li class="text-muted">Zodpovědnost</li>
                        </ul>
                    </div>






                    -->



                    





                </div>
            </div>
        </section>

    </div>

<?php

} ?>