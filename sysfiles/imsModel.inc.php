<?php
class ImsModel
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Insert Functions here for products, brands, categories, etc.
    public function addBrand($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO brands (brand_id, name, date_updated) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $data['brand_id'], $data['name']);
        return $stmt->execute();
    }
    public function addCategory($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO product_categories (cat_id, name, date_updated) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $data['cat_id'], $data['name']);
        return $stmt->execute();
    }
    public function addProduct($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO `products` (`product_id`, `brand_id`, `cat_id`, `name`, `description`, `dimensions`, `quantity`, `price`, `date_created`, `date_restocked`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

        $stmt->bind_param("ssssssss", $data["product_id"], $data["brand_id"], $data["cat_id"], $data["p_name"], $data["description"], $data["dimensions"], $data["quantity"], $data["unit_price"],);
        return $stmt->execute();
    }

    // public function addPurchase($data)
    // {
    //     $stmt = $this->conn->prepare("INSERT INTO purchases (purchase_id, product_id, supplier, quantity, purchase_date) VALUES (?, ?, ?, ?, NOW())");
    //     $stmt->bind_param("ssss", $data['purchase_id'], $data['product_id'], $data['supplier'],  $data['quantity_purchased']);
    //     return $stmt->execute();

    //     // Aslo get back the quqntity from the products table and sum up the product plus the new quantity from the purchase and update the products table with the new quantity
    // }
    public function addPurchase($data)
    {
        $this->conn->begin_transaction();

        try {
            // 1. Insert the purchase record
            $stmt = $this->conn->prepare("INSERT INTO purchases (purchase_id, product_id, supplier, quantity, price, purchase_date) VALUES (?, ?, ?, ?, ?, NOW())");

            $stmt->bind_param(
                "sssis",
                $data['purchase_id'],
                $data['product_id'],
                $data['supplier'],
                $data['quantity_purchased'],
                $data['unit_price']
            );

            if (!$stmt->execute()) {
                throw new Exception("Failed to insert purchase.");
            }

            $stmt->close();

            // 2. Retrieve and lock the product record
            $stmt = $this->conn->prepare(
                "SELECT quantity, price
             FROM products
             WHERE product_id = ?
             FOR UPDATE"
            );

            $stmt->bind_param("s", $data['product_id']);

            if (!$stmt->execute()) {
                throw new Exception("Failed to retrieve product.");
            }

            $result = $stmt->get_result();
            $product = $result->fetch_assoc();
            $stmt->close();

            if (!$product) {
                throw new Exception("Product not found.");
            }

            // 3. Update stock quantity
            $newQuantity = (int) $product['quantity']
                + (int) $data['quantity_purchased'];

            $stmt = $this->conn->prepare(
                "UPDATE products
             SET quantity = ?
             WHERE product_id = ?"
            );

            $stmt->bind_param(
                "is",
                $newQuantity,
                $data['product_id']
            );

            if (!$stmt->execute()) {
                throw new Exception("Failed to update product quantity.");
            }

            $stmt->close();

            // 4. Update product price if the purchase price differs
            if ((float) $product['price'] != (float) $data['unit_price']) {
                $stmt = $this->conn->prepare("UPDATE products SET price = ? WHERE product_id = ?");
                $stmt->bind_param(
                    "ss",
                    $data['unit_price'],
                    $data['product_id']
                );

                if (!$stmt->execute()) {
                    throw new Exception("Failed to update product price.");
                }

                $stmt->close();
            }

            // 5. Commit all changes
            $this->conn->commit();

            return true;
        } catch (Throwable $e) {
            $this->conn->rollback();

            error_log("Purchase error: " . $e->getMessage());

            return false;
        }
    }


    // ====================================Insert Functions here for products, brands, categories, etc.=====================================================

    // Delete Functions here for products, brands, categories, etc.

    public function deleteBrand($data)
    {
        $stmt = $this->conn->prepare("DELETE FROM brands WHERE brand_id = ?");
        $stmt->bind_param("s", $data['brand_id']);
        return $stmt->execute();
    }

    // =========================================================================================

    // Update Functions here for products, brands, categories, etc.

    public function updateBrand($data)
    {
        $stmt = $this->conn->prepare("UPDATE brands SET name = ?, date_updated = NOW() WHERE brand_id = ?");
        $stmt->bind_param("ss", $data['name'], $data['brand_id']);
        return $stmt->execute();
    }
    public function updateCategory($data)
    {
        $stmt = $this->conn->prepare("UPDATE product_categories SET name = ?, date_updated = NOW() WHERE cat_id = ?");
        $stmt->bind_param("ss", $data['name'], $data['cat_id']);
        return $stmt->execute();
    }

    public function updateProduct($data)
    {
        $stmt = $this->conn->prepare("UPDATE products SET name = ?, brand_id = ?, cat_id = ?, description = ?, dimensions = ?, price = ?, date_updated = NOW() WHERE product_id = ?");
        $stmt->bind_param("sssssss", $data["p_name"], $data["brand_id"], $data["cat_id"], $data["description"], $data["dimensions"], $data["unit_price"], $data["product_id"]);
        return $stmt->execute();
    }
    // ======================================Update Functions here for products, brands, categories, etc.===================================================

    // Example method to fetch all brands from the database
    public function getBrandById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM brands WHERE brand_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllBrands()
    {
        $stmt = $this->conn->prepare("SELECT * FROM brands");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function getCategoryById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM product_categories WHERE cat_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllCategories()
    {
        $stmt = $this->conn->prepare("SELECT * FROM product_categories");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function getBrandsForProductForm()
    {
        $stmt = $this->conn->prepare("SELECT brand_id, name FROM brands");
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllProducts()
    {
        $sql = "SELECT p.*,b.name as brand_name,c.name as cat_name FROM products p LEFT JOIN brands b ON p.brand_id = b.brand_id
            LEFT JOIN product_categories c ON p.cat_id = c.cat_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $products;
    }
    function getAllPurchases()
    {
        $sql = "SELECT p.*, pr.name as product_name FROM purchases p LEFT JOIN products pr ON p.product_id = pr.product_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $purchases = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $purchases;
    }

    // =========================================================================================
}
