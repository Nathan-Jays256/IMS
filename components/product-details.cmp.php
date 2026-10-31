<?php
$product_id = $_GET['id'];
$purchases = $sys->fetchProductPurchases($product_id);

?>
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">All Purchases</h4>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table datatable" id="datatable_2">
                        <thead class="text-center">
                            <tr class="text-center">
                                <th>Product Name</th>
                                <th>Supplier</th>
                                <th>Quantity Purchased</th>
                                <th>Price</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Purchase Date</th>
                                <th>Available Stock</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($purchases as $p): ?>
                                <tr class="text-center">
                                    <td><?php echo $p['product_name']; ?></td>
                                    <td><?php echo $p['supplier']; ?></td>
                                    <td><?php echo $p['quantity']; ?></td>
                                    <td><?php echo $p['price']; ?></td>
                                    <td><?php echo $p['purchase_date']; ?></td>
                                    <td><?php echo $p['product_quantity']; ?></td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-sm btn-primary csv">Export CSV</button>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Product Sales</h4>
                    </div><!--end col-->
                </div> <!--end row-->
            </div><!--end card-header-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table datatable" id="datatable_1">
                        <thead class="text-center">
                            <tr class="text-center">
                                <th>Supplier</th>
                                <th>Quantity Purchased</th>
                                <th>Price</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Purchase Date</th>
                                <th>Available Stock</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($purchases as $p): ?>
                                <tr class="text-center">
                                    <td><?php echo $p['supplier']; ?></td>
                                    <td><?php echo $p['quantity']; ?></td>
                                    <td><?php echo $p['price']; ?></td>
                                    <td><?php echo $p['purchase_date']; ?></td>
                                    <td><?php echo $p['product_quantity']; ?></td>
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