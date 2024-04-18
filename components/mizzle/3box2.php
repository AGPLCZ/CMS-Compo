
<section class="pt-0">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="container px-4 mt-4 my-3 py-0" id="hanging-icons">


                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    <div class="col d-flex align-items-start">
                        <div class="icon-square text-dark flex-shrink-0 me-3">
                            <i class="fad fa-hiking  rounded text-primary" style="font-size: 45px; padding: 0px;"> </i>


                        </div>
                        <div>
                        
                            <h5 class="mb-3"><?php $this->getContent('content1'); ?> </h5>
                            <p class="mb-0"><?php $this->getContent('content2'); ?></p>

                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="icon-square text-dark flex-shrink-0 me-3">
                            <i class="fad fa-campground  rounded text-primary" style="font-size: 45px; padding: 0px;"> </i>
                        </div>
                        <div>
                            <h5 class="mb-3"><?php $this->getContent('content3'); ?></h5>
                            <p class="mb-0"><?php $this->getContent('content4'); ?></p>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="icon-square text-dark flex-shrink-0 me-3">
                            <i class="fad fa-axe rounded text-primary" style="font-size: 45px; padding: 0px;"> </i>
                        </div>
                        <div>
                            <h5 class="mb-3"><?php $this->getContent('content5'); ?></h5>
                            <p class="mb-0"><?php $this->getContent('content6'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $this->CreateContentButon($data['pageId'],$data['componentOrder']); ?>