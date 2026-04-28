<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

<?php
include("../config/app.php");
include(BASE_PATH . "/components/global/head.cmp.php");
?>


<!-- Top Bar Start -->

<body>
    <div class="container-xxl">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                    <div class="text-center p-3">
                                        <a href="<?= BASE_URL ?>" class="logo logo-admin">
                                            <img src="<?= BASE_URL ?>assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Oops! Sorry page does not found</h4>
                                        <p class="text-muted fw-medium mb-0">Back to dashboard of Mifty</p>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="ex-page-content text-center">
                                        <img src="<?= BASE_URL ?>assets/images/extra/error.svg" alt="0" class="" height="170">
                                        <h1 class="my-2">404!</h1>
                                        <h5 class="fs-16 text-muted mb-3">Somthing went wrong</h5>
                                    </div>
                                    <a class="btn btn-primary w-100" href="<?= BASE_URL ?>">Back to Dashboard <i class="fas fa-redo ms-1"></i></a>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
</body>
<!--end body-->

<!-- Mirrored from mannatthemes.com/mifty/default/auth-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Mar 2026 14:01:37 GMT -->

</html>