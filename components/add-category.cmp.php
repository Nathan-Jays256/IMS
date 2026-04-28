<div class="container-fluid">
    <!-- Page Title -->
    <div class="row">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?= BASE_URL ?>config/form_handler.php">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <h4 class="card-title">Add New Category</h4>
                                <p class="text-muted">Fill in the details below to add a new category.</p>
                                <div class="row">
                                    <!-- Category Name -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Category Name</label>
                                        <input type="hidden" name="action" value="add_category">
                                        <input type="text" name="category_name" class="text-uppercase form-control" placeholder="Enter category name" required>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Save Category
                                    </button>
                                    </button>
                                    <a href="<?= BASE_URL ?>brands" class="btn btn-secondary">
                                        Edit Categories
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