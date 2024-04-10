<div class="container">
  <nav class="navbar navbar-expand-lg" style="background-color: #fff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.html"><img src="./assets/images/logo/logo.svg" alt /></a> <a class="navbar-brand" href="#">dobrodruzi.cz</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <?php
          echo $this->menu;
          ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Docs</a>
            <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDropdown">
              <a class="dropdown-item mb-3 text-body" href="./docs/index.html">
                <div class="d-flex align-items-center">
                  <i class="bi bi-file-text fs-4 text-primary"></i>
                  <div class="ms-3 lh-1">
                    <h5 class="mb-1">Documentations</h5>
                    <p class="mb-0 fs-6">Browse the all documentation</p>
                  </div>
                </div>
              </a>

              <a class="dropdown-item text-body" href="./docs/changelog.html">
                <div class="d-flex align-items-center">
                  <i class="bi bi-clipboard fs-4 text-primary"></i>
                  <div class="ms-3 lh-1">
                    <h5 class="mb-1">
                      Changelog
                      <span class="text-primary ms-1" id="changelog"></span>
                    </h5>
                    <p class="mb-0 fs-6">See what's new</p>
                  </div>
                </div>
              </a>
            </div>
          </li>
        </ul>
        <div class="mt-3 mt-lg-0 d-flex align-items-center">
          <a href="./signin.html" class="btn btn-light mx-2">Login</a>
          <a href="./signup.html" class="btn btn-primary">Create account</a>
        </div>
        </ul>
      </div>
    </div>
  </nav>
</div>