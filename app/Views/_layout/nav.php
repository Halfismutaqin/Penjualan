<nav class="navbar navbar-dark bg-primary navbar-expand-md mb-4">
  <div class="container">
    <span class="navbar-brand">Penjualan</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= base_url()  ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('product')  ?>">Product</a>
        </li>
      </ul>


      <ul class="navbar-nav mb-2 mb-md-0 d-flex">
        <?php if (!session()->auth) : ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= base_url('login')  ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('register')  ?>">Register</a>
          </li>
        <?php else : ?>

          
      <div class="dropdown">
        <?php
        $keranjang = $cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $key => $value) {
          $jml_item = $jml_item + $value['qty'];
        }
        ?>
        <button class="btn btn-succss dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-shopping-cart"></i>
          <span class="badge badge-light ">(<?= $jml_item; ?> Items)</span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php
          if (empty($keranjang)) {
          ?>
            <a href="#" class="dropdown-item">Keranjang Kosong</a> <?php
        } else {
        ?>
            <div class="dropdown-item" href="#">
              <?php foreach ($keranjang as $key => $value) { ?>
                <h6><?= $value['name']; ?></h6>
                <p class="text-sm text-muted"><?= $value['price']; ?></p>

              <?php  }
              ?>
              <hr>
              </div>
            <a class="dropdown-item" href="#"><button class="btn btn-primary"> Cek Out</button></a>
          <?php
                                                                  }
          ?>
        </div>
      </div>
      <span>&nbsp;</span>
      
          <li class="nav-item">
            <a class="nav-link btn btn-outline-warning me-2" aria-current="page" href="<?= base_url('logout')  ?>">Logout</a>
          </li>
        <?php endif ?>
      </ul>

    </div>
  </div>
</nav>