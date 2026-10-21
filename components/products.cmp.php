<?php
$prod = $sys->fetchProducts();

?>

<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">All Products</h4>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table datatable" id="datatable_2">
                        <thead class="">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Purchase Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prod as $product): ?>
                                <tr>
                                    <td><?= htmlspecialchars($product['product_id']) ?></td>
                                    <td><b class="text-uppercase"><?= htmlspecialchars($product['name']) ?></b></td>
                                    <td><?= htmlspecialchars($product['cat_name']) ?></td>
                                    <td><?= htmlspecialchars($product['brand_name']) ?></td>
                                    <td><?= htmlspecialchars($product['quantity']) ? htmlspecialchars($product['quantity']) : 0 ?></td>
                                    <td><?= date("Y/m/d", strtotime($product['date_created'])) ?></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary csv">Export PDF</button>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
</div><!--end row-->