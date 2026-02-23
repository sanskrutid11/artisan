<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addcart'])) {
        $medId = isset($_POST['med_id']) ? $_POST['med_id'] : null;

        if (isset($_SESSION['cart'])) {
            $items = array_column($_SESSION['cart'], 'med');
            if (in_array($_POST['med'], $items)) {
                echo "<script>
                    alert('Product already added');
                    window.location.href='shop.php';
                </script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('med' => $_POST['med'], 'med_id' => $medId, 'price' => $_POST['price'], 'quantity' => 1);
                echo "<script>
                    alert('Product added');
                    window.location.href='shop.php';
                </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('med' => $_POST['med'], 'med_id' => $medId, 'price' => $_POST['price'], 'quantity' => 1);
            echo "<script>
                alert('Product added');
                window.location.href='shop.php';
            </script>";
        }
    }

    if (isset($_POST['remove_item'])) {
        $removeMed = $_POST['med'];
        $removeMedId = $_POST['med_id']; // Add this line to retrieve med_id

        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['med'] == $removeMed && $value['med_id'] == $removeMedId) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                        alert('Item removed');
                        window.location.href='cart.php';
                      </script>";
                break;
            }
        }
    }

    if (isset($_POST['modqty'])) {
        $modQtyMed = $_POST['med'];
        $modQtyMedId = $_POST['med_id'];
        $newQty = $_POST['modqty'];

        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['med'] == $modQtyMed && $value['med_id'] == $modQtyMedId) {
                $_SESSION['cart'][$key]['quantity'] = $newQty;
                echo "<script>
                    alert('Item quantity modified');
                    window.location.href='cart.php';
                </script>";
                break;
            }
        }

        // If the loop completes without finding a matching item
        echo "<script>
            alert('Error: Item not found in the cart');
            window.location.href='cart.php';
        </script>";
    }
}
?>
