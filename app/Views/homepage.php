<?= $this->extend('_layout') ?>

<?= $this->section('content') ?>

<main class="py-5 my-auto">
    <div class="container">

        <?php if (!$products) : ?>
            <div class="text-center fs-3">
                There are no products to display yet
            </div>
        <?php endif ?>

        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">

            <?php foreach ($products as $product) : ?>
                <div class="col">
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

                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</main>

<?= $this->endSection() ?>