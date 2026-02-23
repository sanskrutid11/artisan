<?php
session_start();
require_once 'C:\xampp\htdocs\artisian\connection.php';

// Function to get total quantity ordered for a product
function getTotalOrderedQuantity($id, $conn)
{
    $sql = "SELECT SUM(quantity) AS total_ordered FROM order_products WHERE product_name = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return ($row['total_ordered']) ? $row['total_ordered'] : 0;
}

// SQL query to fetch product details and calculate current stock
$sql = "SELECT p.id, p.name, v.quantity
        FROM product p 
        JOIN product_size_variation v ON p.id = v.id";
$result = $conn->query($sql);
$count = 1;

?>

<div>
    <h2>Product Sizes Item</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">S.N.</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Stock Quantity</th>
               
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Calculate total ordered for this product
                    $total_ordered = getTotalOrderedQuantity($row['name'], $conn);
                    // Calculate current stock
                    $current_stock = $row['quantity'] - $total_ordered;

                    // Output table row
                    ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $current_stock ?></td>
                        
                        <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?= $row['id'] ?>')">Edit</button></td>
                        <td><button class="btn btn-danger" style="height:40px" onclick="variationDelete('<?= $row['id'] ?>')">Delete</button></td>
                    </tr>
            <?php
                    $count++;
                }
            } else {
                echo "<tr><td colspan='6'>No products found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
        Add Size Variation
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Product Size Variation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form enctype='multipart/form-data' action="./controller/addVariationController.php" method="POST">

                        <div class="form-group">
                            <label>Product:</label>
                            <select name="product">
                                <option disabled selected>Select product</option>
                                <?php
                                // SQL query to fetch products for dropdown
                                $sql = "SELECT * FROM product";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="qty">Stock Quantity:</label>
                            <input type="number" class="form-control" name="qty" required>
                        </div>

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Variation</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
