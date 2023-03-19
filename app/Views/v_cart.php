<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.20.2/bootstrap-table.min.css" integrity="sha512-HIPiLbxNKmx+x+VFnDHICgl1nbRzW3tzBPvoeX0mq9dWP9H1ZGMRPXfYsHhcJS1na58bzUpbbfpQ/n4SIL7Tlw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css" integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-sm"><br />
        <h2>Shopping Cart Dengan Ajax dan Codeigniter</h2>
        <hr />
        <div class="row">
            <div class="col-md-8">
                <h4>Produk</h4>
                <div class="row">
                    <?php foreach ($data as $product) : ?>
                        <div class="col-md-4">
                            <div class="card">

                                <div class="card-header">
                                    <h4><?php echo $product['name']; ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h4><?php echo ($product['price']); ?></h4>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="number" name="quantity" id="<?php echo $product['id']; ?>" value="1" class="quantity form-control">
                                        </div>
                                    </div>
                                    <button id="add_cart" class="add_cart btn btn-success btn-block" data-produkid="<?php echo $product['id']; ?>" data-produknama="<?php echo $product['name']; ?>" data-produkharga="<?php echo $product['price']; ?>">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
            <div class="col-md-4">
                <h4>Shopping Cart</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="detail_cart">

                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <?= $this->include('_layout/js') ?>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.add_cart').click(function() {
            var produk_id    = $(this).data("produkid");
            var produk_nama  = $(this).data("produknama");
            var produk_harga = $(this).data("produkharga");
            var quantity     = $('#' + produk_id).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>/cart/add_to_cart",
                    method: "POST",
                    data: {
                        produk_id: produk_id,
                        produk_nama: produk_nama,
                        produk_harga: produk_harga,
                        quantity: quantity
                    },
                    success: function(data) {
                        $('#detail_cart').html(data);
                    }
                });
            });

            // Load shopping cart
            $('#detail_cart').load("<?php echo base_url(); ?>index.php/cart/load_cart");

            //Hapus Item Cart
            $(document).on('click', '.hapus_cart', function() {
                var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
                $.ajax({
                    url: "<?php echo base_url(); ?>cart/hapus_cart",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        $('#detail_cart').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>