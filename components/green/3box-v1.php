<conteiner>
    <div class="container px-4 mt-4 my-3 py-0" id="hanging-icons">


        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div class="icon-square text-dark flex-shrink-0 me-3">
                    <i class="fad fa-hiking  rounded text-primary" style="font-size: 45px; padding: 0px;"> </i>


                </div>
                <div>
    
                    <h2><?php echo $page_content["content1"]; ?><?php echo $this->renderComponentEditButton("content1"); ?></h2>
                    <p><?php echo $page_content["content2"]; ?><?php echo $this->renderComponentEditButton("content2"); ?></p>

                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-dark flex-shrink-0 me-3">
                    <i class="fad fa-campground  rounded text-primary" style="font-size: 45px; padding: 0px;"> </i>
                </div>
                <div>
                    <h2><?php echo $page_content["content3"]; ?></h2>
                    <p><?php echo $page_content["content4"]; ?></p>

                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square text-dark flex-shrink-0 me-3">
                    <i class="fad fa-axe rounded text-primary" style="font-size: 45px; padding: 0px;"> </i>
                </div>
                <div>
                    <h2><?php echo $page_content["content5"]; ?></h2>
                    <p><?php echo $page_content["content6"]; ?></p>
                </div>
            </div>
        </div>
    </div>
</conteiner>