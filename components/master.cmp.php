<?php
include_once(BASE_PATH . "/components/global/session.cmp.php");
$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;
$user = $sys->fetchUser($user_id);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">
<?php include(BASE_PATH . "/components/global/head.cmp.php"); ?>

<body>
    <?php include(BASE_PATH . "/components/global/navigation.cmp.php"); ?>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                            <h4 class="page-title">
                            </h4>
                            <div class="">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">IMS</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item"><a>Pages</a>
                                    </li><!--end nav-item-->
                                    <li class="breadcrumb-item active"><?= $page_title ?? "Dashboard" ?></li>
                                </ol>
                            </div>
                        </div><!--end page-title-box-->

                        <!-- Alert Messages -->
                        <?php
                        // print_r($_SESSION['isLoggedIn']);

                        $type = null;
                        $message = null;

                        if (!empty($_SESSION['message'])) {
                            $type = "success";
                            $message = $_SESSION['message'];
                            unset($_SESSION['message']);
                        } elseif (!empty($_SESSION['error'])) {
                            $type = "danger";
                            $message = $_SESSION['error'];
                            unset($_SESSION['error']);
                        }

                        if ($message):
                        ?>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {

                                    let type = "<?= $type ?>";
                                    let message = "<?= htmlspecialchars($message, ENT_QUOTES) ?>";

                                    let bgClass = type === "success" ? "bg-success" : "bg-danger";
                                    let icon = type === "success" ?
                                        '<i class="fas fa-check text-white"></i>' :
                                        '<i class="fas fa-times text-white"></i>';

                                    let toastHTML = `
                                                <div class="toast align-items-center text-white ${bgClass} border-0 mb-2 shadow"
                                                    role="alert" data-bs-delay="5000">

                                                    <div class="d-flex">
                                                        <div class="toast-body d-flex align-items-center gap-2">
                                                            ${icon}
                                                            <span>${message}</span>
                                                        </div>
                                                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                                                data-bs-dismiss="toast"></button>
                                                    </div>
                                                </div>
                                            `;

                                    let wrapper = document.getElementById("toastWrapper");
                                    wrapper.insertAdjacentHTML("beforeend", toastHTML);

                                    let toastEl = wrapper.lastElementChild;
                                    let toast = new bootstrap.Toast(toastEl);

                                    toast.show();

                                });
                            </script>

                        <?php endif; ?>
                        <!-- Alert Messages -->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <?php
            if (isset($page_details)) {
                include(BASE_PATH . "/" . $page_details);
            } else {
                echo "Page not found";
            }
            ?>
            <?php include(BASE_PATH . "/components/global/footer.cmp.php"); ?>
        </div>
    </div>
    <?php include(BASE_PATH . "/components/global/scripts.cmp.php"); ?>
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1080;">
        <div id="toastWrapper"></div>
    </div>
</body>

</html>