<conteiner>
    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <h3 class="display-6 fw-bold lh-2"><?php echo $page["tittle1"]; ?></h3>
                <p class="lead">
                    <?php echo $page["tittle2"]; ?>
                </p>
                <p class="lead fw-bold">
                    <?php echo $page["tittle3"]; ?>
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <p class="px-4 text-primary"><i class="fa fa-leaf text-primary" aria-hidden="true"></i> <?php echo $page["perex1"]; ?></p>
                    <p href="info@dobrodruzi.cz" class="px-4 text-primary me-md-2"><i class="fa fa-leaf text-primary" aria-hidden="true"></i> <?php echo $page["perex2"]; ?></a>
                    <p class="px-4 text-primary"><i class="fa fa-leaf text-primary" aria-hidden="true"></i> <?php echo $page["perex3"]; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a class="text-decoration-none link-dark"><i class="fa fa-leaf" aria-hidden="true"></i> <?php echo $page["perex4"]; ?></li>
                    <li class="list-group-item"><a class="text-decoration-none link-dark"><i class="fa fa-leaf" aria-hidden="true"></i> <?php echo $page["perex5"]; ?></a></li>
                    <li class="list-group-item"><a class="text-decoration-none link-dark"><i class="fa fa-leaf" aria-hidden="true"></i> <?php echo $page["perex6"]; ?></a></li>
                </ul>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="<?php echo $page["icon1"]; ?>" alt="">
            </div>
        </div>
    </div>
</conteiner>