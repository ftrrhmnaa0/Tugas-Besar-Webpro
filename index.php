<?php
// Set session cookie lifetime ke 0 (session berakhir saat browser ditutup)
ini_set('session.cookie_lifetime', 0);
session_start();

// Helper: ambil parameter controller dan action dari URL
$controller = $_GET['c'] ?? 'home';
$action     = $_GET['a'] ?? 'index';

// Routing utama
switch ($controller) {
    case 'home':
        require_once 'controllers/HomeController.php';
        $ctrl = new HomeController();
        $ctrl->index();
        break;

    case 'auth':
        require_once 'controllers/AuthController.php';
        $ctrl = new AuthController();
        if ($action === 'login') $ctrl->login();
        elseif ($action === 'register') $ctrl->register();
        elseif ($action === 'logout') $ctrl->logout();
        else $ctrl->login();
        break;

    case 'cart':
        require_once 'controllers/CartController.php';
        $ctrl = new CartController();
        if ($action === 'add') $ctrl->add();
        elseif ($action === 'update') $ctrl->updateQuantity();
        elseif ($action === 'remove') $ctrl->remove();
        else $ctrl->index();
        break;

    case 'checkout':
        require_once 'controllers/CheckoutController.php';
        $ctrl = new CheckoutController();
        $ctrl->index();
        break;

     case 'dashboard':
        require_once 'controllers/SellerDashboardController.php';
        $ctrl = new SellerDashboardController();
        if ($action === 'add_products') $ctrl->addProduct();
        elseif ($action === 'products') $ctrl->products();
        elseif ($action === 'edit_product') $ctrl->edit_product();
        elseif ($action === 'delete_product') $ctrl->delete_product();
        else $ctrl->index();
        exit;

    case 'products':
        require_once 'controllers/SellerProductController.php';
        $ctrl = new SellerProductController();
        if ($action === 'add') $ctrl->add();
        elseif ($action === 'delete') $ctrl->delete();
        else $ctrl->index();
        break;

    case 'profile':
        require_once 'controllers/ProfileController.php';
        $ctrl = new ProfileController();
        if ($action === 'history') $ctrl->history();
        else $ctrl->index();
        break;

      case 'sellerauth':
        require_once 'controllers/SellerAuthController.php';
        $ctrl = new SellerAuthController();
        if ($action === 'login') $ctrl->login();
        elseif ($action === 'register') $ctrl->register();
        elseif ($action === 'logout') $ctrl->logout();
        else $ctrl->login();
        break;

    default:
        // 404 Not Found
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        break;
}
?>