<?php
session_start();
include_once("../config.php");
include_once("../dbprocess.php");

// Thêm sản phẩm vào giỏ hàng
if (isset($_POST["type"]) && $_POST["type"] == 'add') {
    $product_code = filter_var($_POST["product_code"], FILTER_SANITIZE_STRING);
    $product_qty = filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT);
    $return_url = base64_decode($_POST["return_url"]);

    // Lấy thông tin sản phẩm từ cơ sở dữ liệu
    $sql = "SELECT TENSACH as product_name, GIAGOC as price FROM SACH WHERE MASACH='$product_code'";
    $results = executePreparedSingleResult($sql);
    $obj = (object) $results;
    $product = array();

    if ($results) {
        // Thêm sản phẩm vào giỏ hàng
        $new_product = array(array('name' => $obj->product_name, 'code' => $product_code, 'qty' => $product_qty, 'price' => $obj->price));
        $product = [];
        if (isset($_SESSION["products"])) {
            $found = false;

            foreach ($_SESSION["products"] as $cart_itm) {
                if ($cart_itm["code"] == $product_code) {
                    // Cập nhật số lượng sản phẩm nếu sản phẩm đã tồn tại trong giỏ hàng
                    $product_qty_new = $cart_itm["qty"] + $product_qty;
                    $product[] = array('name' => $cart_itm["name"], 'code' => $cart_itm["code"], 'qty' => $product_qty_new, 'price' => $cart_itm["price"]);
                    $found = true;
                } else {
                    $product[] = array('name' => $cart_itm["name"], 'code' => $cart_itm["code"], 'qty' => $cart_itm["qty"], 'price' => $cart_itm["price"]);
                }
            }

            if ($found == false) {
                $_SESSION["products"] = array_merge($product, $new_product);
            } else {
                $_SESSION["products"] = $product;
            }
        } else {
            // Nếu giỏ hàng chưa có sản phẩm, tạo mới giỏ hàng
            $_SESSION["products"] = $new_product;
        }
    }

    // Trả về HTML cho giỏ hàng mới
    $cartHTML = '';
    $total = 0;
    if (isset($_SESSION["products"])) {
        foreach ($_SESSION["products"] as $item) {
            $cartHTML .= '<li>' . $item["name"] . ' x ' . $item["qty"] . ' - ' . number_format($item["price"] * $item["qty"], 0, ',', '.') . 'đ';
            $cartHTML .= ' <a href="javascript:void(0);" onclick="removeFromCart(\'' . $item["code"] . '\', \''. base64_encode($_SERVER["REQUEST_URI"]) .'\')">❌</a></li>';
            $total += $item["price"] * $item["qty"];
        }
    }
    $cartHTML .= '<hr />';
    $cartHTML .= '<strong>Tổng mới: '. number_format($total, 0, ',', '.') .'đ</strong>';

    echo $cartHTML; // Trả về giỏ hàng mới
}

// Xóa sản phẩm khỏi giỏ hàng
if (isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["products"])) {
    $product_code = $_GET["removep"];
    $return_url = base64_decode($_GET["return_url"]);

    // Khởi tạo lại mảng $product để tránh lỗi khi giỏ hàng trống
    $product = [];

    // Xóa sản phẩm khỏi giỏ hàng
    foreach ($_SESSION["products"] as $cart_itm) {
        if ($cart_itm["code"] != $product_code) {
            $product[] = array('name' => $cart_itm["name"], 'code' => $cart_itm["code"], 'qty' => $cart_itm["qty"], 'price' => $cart_itm["price"]);
        }
    }

    $_SESSION["products"] = $product;

    // Trả về HTML cho giỏ hàng mới
    $cartHTML = '';
    $total = 0;
    if (isset($_SESSION["products"])) {
        foreach ($_SESSION["products"] as $item) {
            $cartHTML .= '<li>' . $item["name"] . ' x ' . $item["qty"] . ' - ' . number_format($item["price"] * $item["qty"], 0, ',', '.') . 'đ';
            $cartHTML .= ' <a href="javascript:void(0);" onclick="removeFromCart(\'' . $item["code"] . '\', \''. base64_encode($_SERVER["REQUEST_URI"]) .'\')">❌</a></li>';
            $total += $item["price"] * $item["qty"];
        }
    }
    $cartHTML .= '<hr />';
    $cartHTML .= '<strong>Tổng mới: '. number_format($total, 0, ',', '.') .'đ</strong>';

    echo $cartHTML; // Trả về giỏ hàng mới
}
?>
