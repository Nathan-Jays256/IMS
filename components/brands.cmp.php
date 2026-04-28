<?php
$all = $sys->fetchBrandsAndCategories();
$brands = $all['brands'];
$categories = $all['categories'];
?>
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col d-flex align-items-center" style="justify-content: space-between;">
                        <h4 class="card-title">Product Brands</h4>
                        <a href="add-brand" class="btn btn-sm btn-outline-primary">Add Another Brand</a>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table datatable" id="datatable_1">
                        <thead class="table-light">
                            <tr>
                                <th>Brand Name</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($brands as $brand): ?>
                                <tr>
                                    <td><b class="text-uppercase"><?= htmlspecialchars($brand['name']) ?></b></td>
                                    <td><?= date("Y/m/d", strtotime($brand['date_updated'])) ?></td>
                                    <td><a href="edit-brand/<?= $brand['brand_id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary csv">Export PDF</button>

                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col d-flex align-items-center" style="justify-content: space-between;">
                        <h4 class="card-title">Product Categories</h4>
                        <a href="add-category" class="btn btn-sm btn-outline-primary">Add Another Category</a>
                    </div><!--end col--><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table datatable" id="datatable_2">
                        <thead class="">
                            <tr>
                                <th>Category Name</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><b class="text-uppercase"><?= htmlspecialchars($category['name']) ?></b></td>
                                    <td><?= date("Y/m/d", strtotime($category['date_updated'])) ?></td>
                                    <td><a href="edit-category/<?= $category['cat_id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary csv">Export CSV</button>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div><!--end row-->