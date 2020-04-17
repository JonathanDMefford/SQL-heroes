<?php
require "connection.php";
require "header.php";
?>

<div class="container mx-auto">
    <h1 class="my-5 text-center">Hero-Book</h1>
    <div class="row">
        <?php
        $sql = "SELECT * FROM heroes";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $output = "";
            while ($row = $result->fetch_assoc()) {
                $img = $row["id"];
                $hero = "hero.php?id=" . $row["id"];
                $output .=
                    '<div class="col-4 px-3">
            <div class="card bg-dark text-white mb-5 mx-3 px-3" style="width: 20rem; min-height: 25vh;">
                <img src="./images/xmen' . $img . '.jpg" class="card-img-top" alt="Hero Image" />
                <div class="card-body text-center">
                    <h5 class="card-title border-bottom text-center">' . $row["name"] . '</h5>
                    <p class="card-text">' . $row["about_me"] . '</p>
                    <a href=' . $hero . ' class="btn btn-primary">View Profile</a>
                </div>
            </div>
            </div>';
            }
            echo $output;
        } else {
            echo "0 results";
        }
        ?>
    </div>

    <h1 class="text-center">Add Your Profile</h1>
    <div class="row justify-content-center my-5">
        <form action="addProfile.php" method="post">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="hero" id="hero" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Select Ability</label>
                <select multiple class="form-control" name="ability[]" id="ability">
                    <?php
                    $sql = "SELECT * FROM abilities";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["id"] . '">' . $row["ability"] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Add Bio</label>
                <textarea class="form-control" name="bio" id="bio" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Profile</button>
        </form>
    </div>

</div>
</body>

</html>