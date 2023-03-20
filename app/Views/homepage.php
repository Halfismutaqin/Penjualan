<?= $this->extend('_layout') ?>

<?= $this->section('content') ?>

<main class="py-5 my-auto">
    <div class="container">

        <?php if (!$products) : ?>
            <div class="text-center fs-3">
                There are no products to display yet
            </div>
        <?php endif ?>
        <?php
            if (session()->getFlashdata('pesan')){
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.session()->getFlashdata('pesan').'
                </div>';
            }
        ?>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">

            <?php foreach ($products as $product) : ?>
                <div class="col">
                    <?php
                    echo form_open('cart/add');
                    echo form_hidden('id', $product['id']);
                    echo form_hidden('name', $product['name']);
                    echo form_hidden('price', $product['harga']);
                    
                    echo form_hidden('kode', $product['product_code']);
                    ?>
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title text-center">
                                <a class="text-decoration-none" href="#">
                                    <?= $product['name'] ?>
                                </a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3><small class="text-muted"><?= $product['price'] ?></small></h3>
                                <span class="badge bg-danger">
                                    <?= $product['discount'] ?>%
                                </span>
                            </div>
                            <div class="align-items-left">
                                <p>Dimensi Produk : <?= $product['dimension'] ?></p>
                                <p>Satuan Produk : <?= $product['unit'] ?></p>
                            </div>

                            <button type="subm
                            " class="btn btn-success"> Add</button>

                        </div>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</main>

<?= $this->endSection() ?>