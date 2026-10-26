<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">Stocks Available</h4>
                        </div><!--end col-->
                    </div> <!--end row-->
                </div><!--end card-header-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table datatable" id="datatable_2">
                            <thead class="">
                                <tr>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Qty Available</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Recent purchase date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Unity Pugh</td>
                                    <td>9958</td>
                                    <td>Curicó</td>
                                    <td>2005/02/11</td>
                                    <td>37%</td>
                                </tr>
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