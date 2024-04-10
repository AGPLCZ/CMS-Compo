<!-- navigation -->
<header class="navigation fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="https://eshop.dobrodruzi.cz/">


        <i class="fa-light fa-campfire  text-dark" style="font-size: 17px"></i> <span class="text-dark"></span><span class="text-primary">dobrodruzi</span><span class=" text-dark">.cz</span>

      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto">


          <?php
          echo $this->menu;
          ?>


        </ul>
      </div>

      <div class="order-2 order-lg-3 d-flex align-items-center">
        <select class="m-2 border-0 bg-transparent" id="select-language">
          <option id="cs" value="" selected>Cs</option>
          <option id="en" value="">En</option>
        </select>

        <button class="navbar-toggler border-0 order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
          <i class="ti-menu"></i>
        </button>

      </div>

    </nav>
  </div>
</header>
<!-- /navigation -->