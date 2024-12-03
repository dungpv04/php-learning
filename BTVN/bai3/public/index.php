<?php
require_once '../controllers/UserController.php';

$controller = new UserController();

if (isset($_GET['controller']) && $_GET['controller'] === 'User' && isset($_GET['action']) && $_GET['action'] === 'Create') {
    $controller->create();
} elseif (isset($_GET['controller']) && $_GET['controller'] === 'User' && isset($_GET['action']) && $_GET['action'] === 'Update') {
    $controller->edit();
} elseif (isset($_GET['controller']) && $_GET['controller'] === 'User' && isset($_GET['action']) && $_GET['action'] === 'submitUpdate') {
    $controller->submitEdit($_GET['id']);
}
 elseif (isset($_GET['controller']) && $_GET['controller'] === 'User' && isset($_GET['action']) && $_GET['action'] === 'Delete') {
    $controller->delete($_GET['id']);
} else {
    $controller->index();
}
?>
