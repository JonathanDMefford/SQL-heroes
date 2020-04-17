<?php
require "connection.php";
require "header.php";
$heroId = $_GET["id"];
?>


<div class="container">
    <a class="btn btn-primary btn-lg" href="index.php" type="submit">Go Back</a>
    <div class="row mt-5 mb-2 justify-content-center">
        <div class="col-6">
            <?php
            $sql = "SELECT * FROM heroes WHERE id = " . $heroId;
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

    <div class="row mb-5 justify-content-center">
        <div class="col-3">
            <h4 class="mb-2 text-center border-bottom">Abilities</h4>
            <?php
            $sql = "SELECT * FROM ability_hero
            INNER JOIN abilities on abilities.id = ability_hero.ability_id
            INNER JOIN heroes on heroes.id = ability_hero.hero_id
            WHERE ability_hero.hero_id = $heroId";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $output = "";
                while ($row = $result->fetch_assoc()) {
                    $output .= '<li>' . $row["ability"] . '</li>';
                }
                echo $output;
            } else {
                echo 'No Abilities';
            }
            ?>
        </div>
    </div>

    <div class="row mb-5 justify-content-between">
        <div class="col-4 text-center">
            <h2 class="mb-4 text-center border-bottom border-dark">FRIENDS</h2>
            <?php
            $sql = "SELECT * FROM relationships
                        INNER JOIN heroes on relationships.hero2_id=heroes.id
                        WHERE hero1_id = " . $heroId . " AND type_id = 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $output = "";
                while ($row = $result->fetch_assoc()) {
                    $output .= '<p>' . '<a class="btn btn-danger float-left" href="/removeentity.php?method=removeFriend&heroId=' . $heroId . '&id=' . $row["relationship_id"] . '" type="submit">X</a></p>'. $row["name"] . 
                    '<a class="btn btn-warning float-right" href="/removeentity.php?method=makeEnemy&heroId=' . $heroId . '&id=' . $row["relationship_id"] . '" type="submit">Make Enemy</a></p>';
                }
                echo $output;
            } else {
                echo 'No Friends Currently <br><br> <a class="btn btn-success" href="/addentity.php?method=addFriend" type="submit">Add Friend</a>';
            }
            ?>
        </div>

        <div class="col-4 text-center">
            <h2 class="mb-4 text-center border-bottom border-dark">ENEMIES</h2>
            <?php
            $sql = "SELECT * FROM relationships
                        INNER JOIN heroes on relationships.hero2_id=heroes.id
                        WHERE hero1_id = " . $heroId . " AND type_id = 2";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $output = "";
                while ($row = $result->fetch_assoc()) {
                    $output .= '<p>' . '<a class="btn btn-danger float-left" href="/removeentity.php?method=removeEnemy&heroId=' . $heroId . '&id=' . $row["relationship_id"] . '" type="submit">X</a></p>'. $row["name"] . 
                    '<a class="btn btn-warning float-right" href="/removeentity.php?method=makeFriend&heroId=' . $heroId . '&id=' . $row["relationship_id"] . '" type="submit">Make Friend</a></p>';
                }
                echo $output;
            } else {
                echo 'No Enemies Currently <br><br> <a class="btn btn-success" href="/addentity.php?method=addEnemy" type="submit">Add Enemy</a>';
            }
            ?>
        </div>
    </div>
</div>

</body>

</html>