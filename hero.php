<?php
require "connection.php";
require "header.php";
$id = $_GET["id"];
?>


<div class="container">
    <a class="btn btn-primary btn-lg" href="index.php" type="submit">Go Back</a>
    <div class="row my-5 justify-content-center">
        <div class="col-6">
            <?php
            $sql = "SELECT * FROM heroes WHERE id = " . $id;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $output = "";
                while ($row = $result->fetch_assoc()) {
                    $output .= '<h1 class="mb-4 text-center border-bottom border-dark">' . $row["name"] . '</h1>' .
                        '<p>' . $row["biography"] . '<p>';
                }
                echo $output;
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>

    <div class="row mb-5 justify-content-between">
        <div class="col-4">
            <h2 class="mb-4 text-center border-bottom border-dark">FRIENDS</h2>
            <?php
            $sql = "SELECT * FROM relationships
                        INNER JOIN heroes on relationships.hero2_id=heroes.id
                        WHERE hero1_id = " . $id . " AND type_id = 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $output = "";
                while ($row = $result->fetch_assoc()) {
                    $output .= '<p>' . $row["name"] . '</p>';
                }
                echo $output;
            } else {
                echo "No Friends Currently";
            }
            ?>
        </div>

        <div class="col-4">
            <h2 class="mb-4 text-center border-bottom border-dark">ENEMIES</h2>
            <?php
            $sql = "SELECT * FROM relationships
                        INNER JOIN heroes on relationships.hero2_id=heroes.id
                        WHERE hero1_id = " . $id . " AND type_id = 2";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $output = "";
                while ($row = $result->fetch_assoc()) {
                    $output .= '<p>' . $row["name"] . '</p>';
                }
                echo $output;
            } else {
                echo "No Enemies Currently";
            }
            ?>
        </div>
    </div>
</div>

</body>

</html>

