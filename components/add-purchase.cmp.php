<?php
$prod = $sys->fetchProducts();

?>
<div class="container-fluid">

    <!-- Page Title -->
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">


                    <form method="POST" action="<?= BASE_URL ?>save-product">

                        <div class="row">
                            <div class="col-md-10 align-start">
                                <h4 class="card-title">Add New Purchase</h4>
                                <p class="text-muted">Fill in the details below to add a new purchase.</p>

                                <div class="row">
                                    <!-- Product Name -->

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Select Product Purchased</label>
                                        <input
                                            type="text" class="form-control  text-uppercase" name="product" id="product" list="products" placeholder="Type or select a product" required>

                                        <datalist id="products">
                                            <?php foreach ($prod as $product): ?>
                                                <option value="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>">
                                                </option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                    <!-- Unit Price -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Unit Price</label>
                                        <input type="number" step="0.01" name="unit_price" class="form-control  text-uppercase" placeholder="0.00" required>
                                    </div>
                                    <!-- Quantity Purchased -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Quantity Purchased</label>
                                        <input type="number" name="quantity_purchased" class="form-control  text-uppercase" placeholder="0.00" required>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Save Purchase
                                    </button>
                                    <a href="<?= BASE_URL ?>purchases" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>
                            </div>

                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>

</div>