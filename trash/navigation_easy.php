<!-- navigation -->
<header class="navigation fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-white">
      <a class="navbar-brand order-1" href="https://eshop.dobrodruzi.cz/">
        <!--<img class="img-fluid" width="100px" src="<?php echo $base_url; ?><?php echo $base_url; ?>images/logo.png" alt="">-->

        <!--<i class="fa-light fa-campfire  text-dark" style="font-size: 17px"></i>--><span class="text-dark">eshop.</span><span class="text-primary">dobrodruzi</span><span class=" text-dark">.cz</span>

      </a>
      <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
        <ul class="navbar-nav mx-auto">


        /*
$sql_pages = "SELECT title, uri FROM pages WHERE visible_in_menu = TRUE ORDER BY menu_order ASC";
$stmt_pages = $conn->prepare($sql_pages);
$stmt_pages->execute();
$pages = $stmt_pages->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_pages->close();
*/


          <?php

          buildMenu($pages);


          foreach ($pages as $page) :
          ?>


            <li class="nav-item">
              <?php if (strpos($page["uri"], "http") !== false) { ?>
                <!-- Externí odkaz bez lomítek -->
                <a class="nav-link" href="<?php echo $page["uri"]; ?>"><?php echo $page["title"]; ?></a>
              <?php } elseif (!empty($page["uri"])) { ?>
                <!-- Interní odkaz s lomítky -->
                <a class="nav-link" href="/<?php echo $page["uri"]; ?>/"><?php echo $page["title"]; ?></a>
              <?php } else { ?>
                <!-- Odkaz na úvodní stránku -->
                <a class="nav-link" href="/"><?php echo $page["title"]; ?></a>
              <?php } ?>
            </li>

          <?php endforeach ?>



          <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              About <i class="ti-angle-down ml-1"></i>
            </a>
            <div class="dropdown-menu">

              <a class="dropdown-item" href="about-me.html">About Me</a>

              <a class="dropdown-item" href="about-us.html">About Us</a>
            </div>
          </li>
        </ul>
      </div>

      <div class="order-2 order-lg-3 d-flex align-items-center">
        <select class="m-2 border-0 bg-transparent" id="select-language">
          <option id="cs" value="" selected>Cs</option>
          <option id="en" value="">En</option>
        </select>

        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
          <i class="ti-menu"></i>
        </button>
      </div>

    </nav>
  </div>
</header>
<!-- /navigation -->