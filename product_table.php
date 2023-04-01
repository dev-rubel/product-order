<?php if (!empty($_SESSION['cart'])) { ?>
    <!-- Start col -->
    <div class="col-md-10 col-lg-10 col-xl-10 mx-auto mt-2">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">Cart</h5>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="cart-container">
                            <form id="cart_form" method="post" action="store_order.php">
                                <div class="cart-head">
                                    <div class="table-responsive">
                                        <table class="table table-borderless" id="product_table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Photo</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Tax</th>
                                                <th scope="col">Total</th>
                                                <th scope="col" class="text-right">Aciton</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($_SESSION['cart'] as $k => $each) { ?>
                                                <tr class="item">
                                                    <th scope="row"><?= $k ?></th>
                                                    <td>
                                                        <img src="https://themesbox.in/admin-templates/olian/html/light-vertical/assets/images/ecommerce/product_01.svg"
                                                             class="img-fluid" width="35" alt="product"></td>
                                                    <td>
                                                        <?= $each['name']; ?>
                                                    </td>
                                                    <td>
                                                        <div class="form-group mb-0">
                                                            <input type="number" class="form-control item_qty"
                                                                   name="item[<?=$each['id']?>][item_qty]" value="1" min="1" max="50">
                                                        </div>
                                                    </td>
                                                    <td class="p-price">
                                                        <div class="form-group mb-0">
                                                            <input type="number" class="form-control item_price"
                                                                   value="<?= $each['price'] ?>" name="item[<?=$each['id']?>][item_price]"
                                                                   readonly>
                                                        </div>
                                                    </td>
                                                    <td class="p-tax">
                                                        <div class="form-group mb-0">
                                                            <input type="number" class="form-control item_tax"
                                                                   value="<?= $each['tax'] != '' ? $each['tax'] : 0 ?>"
                                                                   name="item[<?=$each['id']?>][item_tax]" readonly>
                                                        </div>
                                                    </td>
                                                    <td class="text-right p-total">
                                                        <div class="form-group mb-0">
                                                            <input type="number" class="form-control item_sub" value="0"
                                                                   name="item[<?=$each['id']?>][item_sub]" readonly>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="removetocart.php?product_id=<?=$each['id']?>" class="text-danger"><i class="ri-delete-bin-3-line"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cart-body">
                                    <div class="row">
                                        <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                            <div class="order-note">

                                                <div class="form-group">
                                                    <label for="customerName">Name</label>
                                                    <input type="text" class="form-control" name="name" id="customerName"
                                                           placeholder="Customer name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="customerEmail">Email</label>
                                                    <input type="email" class="form-control" name="email" id="customerEmail"
                                                           placeholder="Customer email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="customerPhone">Phone</label>
                                                    <input type="text" class="form-control" name="phone" id="customerPhone"
                                                           placeholder="Customer phone">
                                                </div>
                                                <div class="form-group">
                                                    <label for="specialNotes">Address</label>
                                                    <textarea class="form-control" name="address" id="specialNotes"
                                                              rows="3" placeholder="Customer Address"></textarea>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                            <div class="order-total table-responsive ">
                                                <table class="table table-borderless text-right">
                                                    <tbody>
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td id="stotal">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tax:</td>
                                                        <td id="stax">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="f-w-7 font-18"><h4>Amount :</h4></td>
                                                        <td class="f-w-7 font-18"><h4 id="gtotal">0</h4></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-footer text-right">
                                    <button type="submit" class="btn btn-info my-1"><i class="ri-save-line mr-2"></i>Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
<?php } ?>

<script>
    $('.item_qty').on('change', function () {
        calculation()
    })
    calculation()

    function calculation() {
        var gtotal = 0
        var stotal = 0
        var stax = 0
        $("tr.item").each(function () {
            var qty = parseInt($(this).find(".item_qty").val());
            var price = parseInt($(this).find(".item_price").val());
            var tax = parseInt($(this).find(".item_tax").val());
            var total = (price * qty) + tax
            var sstotal = (price * qty)
            $(this).find(".item_sub").val(total);
            gtotal += total
            stotal += sstotal
            stax += tax
        });
        $('#stotal').text(stotal);
        $('#stax').text(stax);
        $('#gtotal').text(gtotal);
        console.log(gtotal, stotal, stax)
    }

    $("#cart_form").validate();

</script>
