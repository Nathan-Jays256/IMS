<?php
$prod = $sys->fetchProducts();

?>
<div class="container-fluid">

    <!-- Page Title -->
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">


                    <form method="POST" action="<?= BASE_URL ?>add-purchase" id="addPurchaseForm">

                        <div class="row">
                            <div class="col-md-10 align-start">
                                <h4 class="card-title">Add New Purchase</h4>
                                <p class="text-muted">Fill in the details below to add a new purchase.</p>

                                <div class="row">
                                    <!-- Product Name -->

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Select Product Purchased</label>
                                        <input
                                            type="text" name="product_name" class="form-control  text-uppercase" placeholder="Enter supplier name" id="product"
                                            list="products"
                                            placeholder="Type or select a product"
                                            autocomplete="off"
                                            required>

                                        <input type="hidden" name="product_id" id="product_id">

                                        <datalist id="products">
                                            <?php foreach ($prod as $product): ?>
                                                <option
                                                    value="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>"
                                                    data-id="<?= htmlspecialchars((string) $product['product_id'], ENT_QUOTES, 'UTF-8') ?>"></option>
                                            <?php endforeach; ?>
                                        </datalist>

                                        <script>
                                            const productInput = document.getElementById('product');
                                            const productIdInput = document.getElementById('product_id');
                                            const productOptions = document.querySelectorAll('#products option');

                                            productInput.addEventListener('input', function() {
                                                productIdInput.value = '';

                                                for (const option of productOptions) {
                                                    if (option.value === this.value) {
                                                        productIdInput.value = option.dataset.id;
                                                        break;
                                                    }
                                                }
                                            });

                                            productInput.form.addEventListener('submit', function(event) {
                                                if (!productIdInput.value) {
                                                    event.preventDefault();
                                                    alert('Please select a valid product from the suggestions.');
                                                }
                                            });
                                        </script>
                                    </div>
                                    <!-- Unit Price -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Supplier</label>
                                        <input type="text" name="supplier" class="form-control  text-uppercase" placeholder="Enter supplier name" required>
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
                                    <input type="hidden" name="action" value="addPurchase">
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