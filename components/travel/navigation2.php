<nav class="navbar navbar-expand-md navbar-light bg-white absolute-top">
  <div class="container">

    <button class="navbar-toggler order-2 order-md-1" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbar-left navbar-right" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3 order-md-2" id="navbar-left">
      <ul class="navbar-nav me-auto">

      <?php
          echo $this->menu;
          ?>
      </ul>


    </div>

    <a class="navbar-brand mx-auto order-1 order-md-3" href="index.html">Milø</a>


    <div class="collapse navbar-collapse order-4 order-md-4" id="navbar-right">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="page-about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="page-contact.html">Contact</a>
        </li>
      </ul>
      <form class="form-inline" role="search">
        <input class="search js-search form-control form-control-rounded me-sm-2" type="text" title="Enter search query here.." placeholder="Search.." aria-label="Search">
      </form>
    </div>
  </div>
</nav>