<div class="container">
  <nav class="navbar navbar-expand-lg" style="background-color: #fff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">dobrodruzi.cz</a>
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