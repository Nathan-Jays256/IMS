<div class="container-fluid">

    <!-- Page Title -->
    <div class="row">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-body">


                    <form method="POST" action="<?= BASE_URL ?>save-product">

                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <h4 class="card-title">Edit Product</h4>
                                <p class="text-muted">Fill in the details below to edit the product.</p>

                                <div class="row">
                                    <!-- Product Name -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="product_name" class="text-uppercase form-control" placeholder="Enter product name" required>
                                    </div>

                                    <!-- Dimensions -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Brand</label>
                                        <select class="form-control  text-uppercase" aria-hidden="true" name="brand_id" required>
                                            <option selected>Select product brand</option>
                                            <option value="Samsung">Samsung</option>
                                            <option value="Engage">Engage</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Product Category</label>
                                        <select class="form-control  text-uppercase" aria-hidden="true" name="category_id" required>
                                            <option selected>Select product category</option>
                                            <option value="Samsung">Tvs</option>
                                            <option value="Engage">Party Speakers</option>
                                            <option value="Engage">Headsets</option>
                                            <option value="Engage">Earbuds</option>
                                            <option value="Engage">Signages</option>
                                        </select>
                                    </div>

                                    <!-- Unit Price -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Unit Price</label>
                                        <input type="number" step="0.01" name="unit_price" class="form-control  text-uppercase" placeholder="0.00" required>
                                    </div>

                                    <!-- Dimensions -->
                                    <div class="col-md-6 mb-3">
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