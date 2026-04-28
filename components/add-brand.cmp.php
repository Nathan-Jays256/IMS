<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?= BASE_URL ?>config/form_handler.php">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <h4 class="card-title">Add New Brand</h4>
                                <p class="text-muted">Fill in the details below to add a new brand.</p>
                                <div class="row">
                                    <!-- Brand Name -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Brand Name</label>
                                        <input type="hidden" name="action" value="add_brand">
                                        <input type="text" name="brand_name" class="text-uppercase form-control" placeholder="Enter brand name" required>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Save Brand
                                    </button>
                                    <a href="<?= BASE_URL ?>pages/brands" class="btn btn-secondary">
                                        Edit Brands
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