

<section class="pt-0">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="container px-4 py-0" id="featured-3">
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    <div class="feature col">
                        <p><?php $this->getEditButton('content7'); ?><i class="<?php $this->getContentOnly('content7'); ?> text-primary" style="font-size: 45px"></i></p>
                        <h5 class="mb-3"><?php $this->getContent('content1'); ?></h5>
                        <p class="mb-0"><?php $this->getContent('content2'); ?></p>
                    </div>
                    <div class="feature col">
                        <p><?php $this->getEditButton('content8'); ?><i class="<?php $this->getContentOnly('content8'); ?> text-primary" style="font-size: 45px"></i></p>
                        <h5 class="mb-3"><?php $this->getContent('content3'); ?></h5>
                        <p class="mb-0"><?php $this->getContent('content4'); ?></p>
                    </div>
                    <div class="feature col">
                        <p><?php $this->getEditButton('content9'); ?><i class="<?php $this->getContentOnly('content9'); ?> text-primary" style="font-size: 45px"></i></p>
                        <h5 class="mb-3"><?php $this->getContent('content5'); ?></h5>
                        <p class="mb-0"><?php $this->getContent('content6'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<?php echo $this->CreateContentButon($data['pageId'],$data['componentOrder']); ?>