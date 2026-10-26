<script src="<?= BASE_URL ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>assets/libs/simplebar/simplebar.min.js"></script>

<script src="<?= BASE_URL ?>assets/libs/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?= BASE_URL ?>assets/js/pages/datatable.init.js"></script>
<script src="<?= BASE_URL ?>assets/js/app.js"></script>
<script>
    setTimeout(function() {
        let alertBox = document.getElementById('autoAlert');

        if (alertBox) {
            // Add slide + fade effect
            alertBox.classList.add('hide');

            // Remove after animation
            setTimeout(() => {
                alertBox.remove();
            }, 300);
        }
    }, 3000); // 3 seconds
</script>