<?= $this->extend('_layout') ?>

<?= $this->section('content') ?>

<main class="py-2">
    <?php
    if (session()->getFlashdata('pesan')) {
        echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . session()->getFlashdata('pesan') . '
                </div>';
    }
    ?>
    <div class="container">
        <div class="invoice">

            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-shopping-cart"></i> Keranjang Belanja.
                        <br>
                    </h4>
                </div>
                <div class="col-8"></div>
                <div class="col-4">
                    <p class="d-flex text-right">Date: <?= date("d, M Y"); ?></small>
                </div>
            </div>

            <?php
        echo form_open('cart/update');
        ?>

            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">Qty</th>
                                <th>Product Code</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($cart->contents() as $key => $value) { ?>
                                <tr>

                                    <td>
                                        <input type="hidden" value="<?= $value['rowid']; ?>">
                                        <input type="number" class="form-control" name="qty<?= $i++ ?>" min="1" style="width: 50px;" value="<?= $value['qty']; ?>">
                                    </td>
                                    <td><?= $value['kode']; ?></td>
                                    <td><?= $value['name']; ?></td>
                                    <td><?= number_to_currency($value['price'], 'IDR'); ?></td>
                                    <td><?= number_to_currency($value['subtotal'], 'IDR'); ?></td>
                                    <td>
                                        <a href="<?= base_url('cart/delete/' . $value['rowid']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php    }
                            ?>

                        </tbody>

                    </table>
                </div>
                    <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</a>

                    </div>


                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Total Belanja:</th>
                                <td>
                                    <?= number_to_currency($cart->total(), 'IDR'); ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-check"></i> Buy
                            </button>
                </div>

            </div>
        </div>
        <?php
        echo form_close();
        ?>

    </div>
</main>

<?= $this->endSection() ?>