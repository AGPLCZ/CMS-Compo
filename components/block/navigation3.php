<header>
  <nav class="navbar navbar-expand-lg  navbar-light w-100">
    <div class="container px-3">
      <a class="navbar-brand" href="../index.html"><img src="../assets/images/logo/logo.svg" alt /></a>
      <button class="navbar-toggler offcanvas-nav-btn" type="button">
        <i class="bi bi-list"></i>
      </button>
      <div class="offcanvas offcanvas-start offcanvas-nav" style="width: 20rem">
        <div class="offcanvas-header">
          <a href="../index.html" class="text-inverse"><img src="../assets/images/logo/logo.svg" alt /></a>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body pt-0 align-items-center">
          <ul class="navbar-nav mx-auto align-items-lg-center">
          <?php
          echo $this->menu;
          ?>
          </ul>
          </li>

          </ul>
          <div class="mt-3 mt-lg-0 d-flex align-items-center">
            <a href="../signin.html" class="btn btn-light mx-2">Login</a>
            <a href="../signup.html" class="btn btn-primary">Create account</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>