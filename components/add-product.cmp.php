<div class="container-fluid">
    <?php
    $res = $sys->fetchBrandsAndCategories();
    $brands = $res['brands'];
    $categories = $res['categories'];

    ?>
    <!-- Page Title -->
    <div class="row">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-body">


                    <form method="POST" action="<?= BASE_URL ?>config/form_handler.php">

                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <h4 class="card-title">Add New Product</h4>
                                <p class="text-muted">Fill in the details below to add a new product.</p>

                                <div class="row">
                                    <!-- Product Name -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Product Name / Model</label>
                                        <input type="text" name="product_name" class="text-uppercase form-control" placeholder="Enter product name" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Select product Brand</label>
                                        <select class="form-control  text-uppercase" aria-hidden="true" name="brand_id" required>
                                            <option selected>Select product brand</option>
                                            <?php foreach ($brands as $brand): ?>
                                                <option value="<?= $brand['brand_id'] ?>"><?= $brand['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Product Category</label>
                                        <select class="form-control  text-uppercase" aria-hidden="true" name="cat_id" required>
                                            <option selected>Select product category</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category['cat_id'] ?>"><?= $category['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- Unit Price -->
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Unit Price</label>
                                        <input type="number" step="0.01" name="unit_price" class="form-control  text-uppercase" placeholder="0.00" required>
                                    </div>

                                    <!-- Dimensions -->
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Dimensions</label>
                                        <input type="text" name="dimensions" class="form-control text-uppercase" placeholder="e.g. 10x20x30 cm">
                                    </div>
                                    <!-- Description -->
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control" rows="8" placeholder="Enter product description"></textarea>
                                    </div>

                                </div>

                                <!-- Buttons -->
                                <div class="mt-3">
                                    <input type="hidden" name="action" value="add_product">
                                    <button type="submit" class="btn btn-primary">
                                        Save Product
                                    </button>
                                    <a href="<?= BASE_URL ?>products" class="btn btn-secondary">
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