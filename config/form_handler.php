<?php
require_once __DIR__ . '/../sysfiles/sysfile.inc.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';
    switch ($action) {
        case 'logout':
            $sys->logoutAction();
            break;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    switch ($action) {
        // Auth Handlers
        case 'login':
            $sys->loginAction();
            break;

        case 'register':
            $sys->registerAction();
            break;

        case 'logout':
            $sys->logoutAction();
            break;

        case 'add_brand':
            $sys->addBrandAction();
            break;

        case 'add_category':
            $sys->addCategoryAction();
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
}
