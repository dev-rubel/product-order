<?php
$listOfPros = $product->getProducts();
?>
<div class="col-md-10 col-lg-10 col-xl-10 mx-auto">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Add Product To Cart</h5>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                    <div class="cart-container">
                        <form action="addtocart.php" method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <select name="product_id" id="" class="form-control" required>
                                        <option value="">Select</option>
                                        <?php if ($listOfPros['count'] > 0) { ?>
                                            <?php foreach ($listOfPros['result'] as $key => $each) { ?>
                                                <?php if (!isset($_SESSION['cart'][$each['id']])) { ?>
                                                    <option value="<?= $each['id'] ?>"><?= $each['name'] ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="input-group mt-3">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
