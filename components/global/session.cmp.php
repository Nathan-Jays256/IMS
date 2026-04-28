<?php

session_start();

include_once BASE_PATH . "sysfiles/sysfile.inc.php";

// ⏱️ Inactivity timeout (in seconds)
$timeout_duration = 3400; // 15 minutes

// Check if user is logged in
if (empty($_SESSION['user_id']) || $_SESSION['isLoggedin'] !== true) {
    header("Location: " . BASE_URL . "auth/auth-login");
    exit;
}

// Check for inactivity
if (isset($_SESSION['LAST_ACTIVITY'])) {

    if (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration) {

        // Session expired
        session_unset();
        session_destroy();

        header("Location: " . BASE_URL . "auth/auth-login?timeout=1");
        exit;
    }
}

// Update last activity time
$_SESSION['LAST_ACTIVITY'] = time();
