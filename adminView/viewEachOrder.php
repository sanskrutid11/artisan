<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
            </tr>
        </thead>
        <?php
        require_once'C:\xampp\htdocs\artisian\connection.php';

        // Use prepared statement to prevent SQL injection
        $ID = $_GET['orderID'];
        $stmt = $conn->prepare("SELECT * FROM product_size_variation v
                                JOIN orders d ON v.var_id = d.id
                                WHERE d.id = ?");
        $stmt->bind_param("i", $ID);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $v_id = $row['var_id'];
                ?>
                <tr>
                    <td><?= $count ?></td>
                    <?php
                    
                    $subqry = "SELECT * FROM product p
                               JOIN product_size_variation v ON p.id = v.id
                               WHERE v.var_id = $v_id";
                    $res = $conn->query($subqry);
                    if ($row2 = $res->fetch_assoc()) {
                        ?>
                        <td><img height="80px" src="<?= $row2["img"] ?>"></td>
                        <td><?= $row2["name"] ?></td>
                        <?php
                    }

                    // Join sizes and product_size_variation tables
                   
                    ?>
                    <td><?= $row["quantity"] ?></td>
                    <td><?= $row["price"] ?></td>
                </tr>
                <?php
                $count++;
            }
        } else {
            echo "No records found.";
        }
        ?>
    </table>
</div>
