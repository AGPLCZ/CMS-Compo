<div class="container">
  <nav class="navbar navbar-expand-lg" style="background-color: #fff;">
    <div class="container-fluid mt-3">
      <a class="navbar-brand" href="#"><i class="fa-light fa-campfire  text-dark" style="font-size: 17px"></i> <span class="text-dark"></span><span class="text-primary">dobrodruzi</span><span class=" text-dark">.cz</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
        <?php
          echo $this->menu;
          ?>
        </ul>
      </div>
    </div>
  </nav>
</div>