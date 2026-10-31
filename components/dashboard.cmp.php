<div class="container-fluid">
    <?php
    $products = $sys->fetchProducts();
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
                            <thead class="text-center">
                                <tr class="text-center">
                                    <th>Product Name</th>
                                    <th>Desc</th>
                                    <th>Brand</th>
                                    <th>Total Stock</th>
                                    <th>Price</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Last Purchase Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $p): ?>
                                    <tr class="text-left">
                                        <td><a href="pages/product/<?= $p['product_id']; ?>" class="prdt_link"><?php echo $p['name']; ?></a></td>
                                        <td><?php echo $p['description']; ?></td>
                                        <td><?php echo $p['brand_name']; ?></td>
                                        <td><?php echo $p['quantity']; ?></td>
                                        <td><?php echo $p['price']; ?></td>
                                        <td><?php echo $p['date_restocked']; ?></td>
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
</div><!-- container -->

<!--Start Rightbar-->
<!--Start Rightbar/offcanvas-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
    <div class="offcanvas-header border-bottom justify-content-between">
        <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
        <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h6>Account Settings</h6>
        <div class="p-2 text-start mt-3">
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="settings-switch1">
                <label class="form-check-label" for="settings-switch1">Auto updates</label>
            </div><!--end form-switch-->
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                <label class="form-check-label" for="settings-switch2">Location Permission</label>
            </div><!--end form-switch-->
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="settings-switch3">
                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
            </div><!--end form-switch-->
        </div><!--end /div-->
        <h6>General Settings</h6>
        <div class="p-2 text-start mt-3">
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="settings-switch4">
                <label class="form-check-label" for="settings-switch4">Show me Online</label>
            </div><!--end form-switch-->
            <div class="form-check form-switch mb-2">
                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
            </div><!--end form-switch-->
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="settings-switch6">
                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
            </div><!--end form-switch-->
        </div><!--end /div-->
    </div><!--end offcanvas-body-->
</div>
<!--end Rightbar/offcanvas-->
<!--end Rightbar-->