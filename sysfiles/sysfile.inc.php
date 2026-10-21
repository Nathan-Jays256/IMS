<?php
require_once __DIR__ . '/../sysfiles/dbh.inc.php';
require_once __DIR__ . '/../sysfiles/auth.inc.php';
require_once __DIR__ . '/../sysfiles/imsModel.inc.php';
$sys = new SysFuncs($conn);


class SysFuncs
{
    public $conn;
    public const BASE_URL = '';

    public static function init()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $base = $_SERVER['BASE_URL'] ?? '/IMS/';

        return $protocol . $host . $base;
    }
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Funtion to handle getting values from the form
    public function getValues($key)
    {
        return isset($_POST[$key]) ? trim($_POST[$key]) : null;
    }
    function getGreeting()
    {
        $hour = date("H");

        if ($hour < 12) return "Good Morning";
        if ($hour < 17) return "Good Afternoon";
        if ($hour < 21) return "Good Evening";
        return "Good Night";
    }

    // Funtion to handle generating Custom Ids
    function generateId($unique, $length)
    {
        return $unique . strtoupper(substr(bin2hex(random_bytes(3)), 0, $length));
    }

    public function fetchUser($user_id)
    {
        $auth = new Auth($this->conn);
        $user = $auth->fetchUser($user_id);
        return $user;
    }

    function loginAction()
    {
        $data = [
            'email' => $this->getValues('email'),
            'password' => $this->getValues('password'),
        ];
        // print_r($data);
        $auth = new Auth($this->conn);
        if ($auth->authenticate($data)) {
            $_SESSION['success'] = true;
            $_SESSION['message'] = "Logged in successfully.";
            header("Location: "  . "../");
        } else {
            $_SESSION['success'] = false;
            $_SESSION['message'] = "Login failed.";
            header("Location: "  . "../");
        }
    }

    function registerAction()
    {
        // Verrify passwords
        if ($this->getValues('password') !== $this->getValues('c_password')) {
            $_SESSION['error'] = "Passwords do not match.";
            header("Location: " . "../auth/auth-register");
            exit();
        }
        $param_password = password_hash($this->getValues('password'), PASSWORD_BCRYPT);
        $param_token = bin2hex(random_bytes(50));

        $data = [
            'user_id' => $this->generateId("ADM", 6),
            'username' => $this->getValues('username'),
            'email' => $this->getValues('email'),
            'password' => $param_password,
            'userRole' => 'Admin',
            'reset_token' => $param_token
        ];
        $auth = new Auth($this->conn);
        $auth->registerAccount($data);
        // session_start();
        $_SESSION['success'] = true;
        $_SESSION['message'] = "Account created successfully. Please log in.";
        header("Location: "  . "../auth/auth-login");
    }

    function logoutAction()
    {
        $auth = new Auth($this->conn);
        if ($auth->logout()) {
            session_start();
            $_SESSION["success"] = true;
            $_SESSION["message"] = "Logged out successfully.";
            header("Location: "  . "../");
        }
    }

    function addBrandAction()
    {

        if (isset($_POST['brand_id']) && !empty($_POST['brand_id'])) {
            $id = $_POST['brand_id'];
            $data = [
                'brand_id' => $id,
                'name' => $this->getValues('brand_name'),
            ];
            $imsModel = new ImsModel($this->conn);
            if ($imsModel->updateBrand($data)) {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Brand updated successfully";
                header('Location: ../pages/brands');
            } else {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Error updating brand: " . $imsModel->conn->error;
                header('Location: ../pages/brands');
            }
        } else {
            $data = [
                'brand_id' => $this->generateId('BRD', 6),
                'name' => $this->getValues('brand_name'),
            ];
            $imsModel = new ImsModel($this->conn);
            if ($imsModel->addBrand($data)) {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Brand added successfully";
                header('Location: ../pages/add-brand');
            } else {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Error adding brand: " . $imsModel->conn->error;
                header('Location: ../pages/add-brand');
            }
        }
    }

    function addCategoryAction()
    {
        if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])) {
            $id = $_POST['cat_id'];
            $data = [
                'cat_id' => $id,
                'name' => $this->getValues('category_name'),
            ];
            $imsModel = new ImsModel($this->conn);
            if ($imsModel->updateCategory($data)) {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Category updated successfully";
                header('Location: ../pages/brands');
            } else {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Error updating brand: " . $imsModel->conn->error;
                header('Location: ../pages/brands');
            }
        }

        $data = [
            'cat_id' => $this->generateId('CAT', 6),
            'name' => $this->getValues('category_name'),
        ];
        $imsModel = new ImsModel($this->conn);
        if ($imsModel->addCategory($data)) {
            session_start();
            $_SESSION["success"] = true;
            $_SESSION["message"] = "Category added successfully";
            header('Location: ../pages/add-category');
        } else {
            session_start();
            $_SESSION["success"] = true;
            $_SESSION["message"] = "Error adding category: " . $imsModel->conn->error;
            header('Location: ../pages/add-category');
        }
    }
    function addProductAction()
    {
        if (isset($_POST['product_id']) && !empty($_POST['product_id'])) {
            $id = $_POST['product_id'];
            $data = [
                'product_id' => $id,
                'p_name' => $this->getValues('product_name'),
                'brand_id' => $this->getValues('brand_id'),
                'cat_id' => $this->getValues('category_id'),
                'unit_price' => $this->getValues('unit_price'),
                'dimensions' => $this->getValues('dimensions'),
                'description' => $this->getValues('description'),
            ];
            $imsModel = new ImsModel($this->conn);
            if ($imsModel->updateProduct($data)) {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Product updated successfully";
                header('Location: ../pages/products');
            } else {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Error updating product: " . $imsModel->conn->error;
                header('Location: ../pages/products');
            }
        } else {
            $data = [
                'product_id' => $this->generateId('PRD', 6),
                'p_name' => $this->getValues('product_name'),
                'brand_id' => $this->getValues('brand_id'),
                'cat_id' => $this->getValues('cat_id'),
                'unit_price' => $this->getValues('unit_price'),
                'dimensions' => $this->getValues('dimensions'),
                'description' => $this->getValues('description'),
                'quantity' => null,
            ];
            $imsModel = new ImsModel($this->conn);
            if ($imsModel->addProduct($data)) {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Product added successfully";
                header('Location: ../pages/add-product');
            } else {
                session_start();
                $_SESSION["success"] = true;
                $_SESSION["message"] = "Error adding product: " . $imsModel->conn->error;
                header('Location: ../pages/add-product');
            }
        }
    }



    // Fetch Functions here 
    function fetchBrandsAndCategories()
    {
        $data = [];
        $imsModel = new ImsModel($this->conn);
        $brands = $imsModel->getAllBrands();
        $categories = $imsModel->getAllCategories();
        $data['brands'] = $brands;
        $data['categories'] = $categories;
        return $data;
    }

    function fetchBrandbyId($id)
    {
        $imsModel = new ImsModel($this->conn);
        return $imsModel->getBrandById($id);
    }
    function fetchCategorybyId($id)
    {
        $imsModel = new ImsModel($this->conn);
        return $imsModel->getCategoryById($id);
    }

    function fetchBrandstoproductform()
    {
        $imsModel = new ImsModel($this->conn);
        return $imsModel->getBrandsForProductForm();
    }

    function fetchProducts()
    {
        $imsModel = new ImsModel($this->conn);
        return $imsModel->getAllProducts();
    }
}
