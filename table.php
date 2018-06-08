<?php
include_once("header.php");
include_once("slider.php");
include_once("navBar.php");
require("classes.php");
if(!isset($_SESSION['loggedin'])){
    header('Location: index.php');
}

try{
    require_once 'includes/connect.php';
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($connect->connect_errno!=0){
        throw new Exception(mysqli_connect_errno());
    }else{
        $result = $connect->query("SELECT DISTINCT `FixtureNr` FROM `match`");
        if($result->num_rows>0) {
            $array = array();
            foreach ($result as $id){
                array_push($array, $id['FixtureNr']);
            }
        }

        $connect->close();
    }
}catch (Exception $e){
    echo "Błąd serwera.";
}





?>

    <select name="fixNr" id="select" onchange="myFn(this.value)">
        <option selected hidden>Wybierz</option>
        <?php
        foreach ($array as $add){
            echo "<option value=\"$add\">$add</option>";
        }
        ?>
        <option value="99">Cały sezon</option>
    </select>
<?php
try{
    require_once 'includes/connect.php';
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($connect->connect_errno!=0){
        throw new Exception(mysqli_connect_errno());
    }else {
        $result = $connect->query("SELECT id, user FROM `users`");
        if ($result->num_rows > 0) {
            $playersArray = array();
            foreach ($result as $player) {
                $id = $player['id'];
                $name = $player['user'];
                $playersArray[$id] = $name;
            }
        }
        if (isset($_GET['sel'])) {
            $nr = $_GET["sel"];

            $result = $connect->query("SELECT * FROM `score` WHERE fixtureId = '$nr';");
            if ($result->num_rows > 0) {
                $scorearray = array();
                foreach ($result as $sco) {
                    $pId = $sco['playerId'];
                    $fixId = $sco['fixtureId'];
                    $sc = $sco['score'];
                    $score = new Score($pId, $fixId, $sc);
                    array_push($scorearray, $score);
                }
            }else{
                unset($_GET['sel']);
                echo "Brak wyników do wyświetlenia";
            }
            $connect->close();
        }
    }
}catch (Exception $e){
    echo "Błąd serwera.";
}

if(isset($_GET['sel'])) {
    ?>
    <div class="tableContainer">
    <table id="scoreTable">'
    <tr>
        <th onclick="sortTableName(0)">Imię</th>
        <th onclick="sortTableNumber(1)">Wynik</th>
    </tr>
    <?php
    foreach ($scorearray as $sco) {
        echo '<tr>';
            echo '<td>';
            echo $playersArray[$sco->playerId];
            echo '</td>';
            echo '<td>';
            echo $sco->score;
            echo '</td>';
        echo '</tr>';
    }

    echo '</table></div>';
}
?>

    <script>


        function myFn() {
            window.location.href="table.php?sel="+arguments[0];
            console.log(arguments[0]);



        }
        function sortTableNumber(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("scoreTable");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.getElementsByTagName("TR");
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                    /* Get the two elements you want to compare,
                    one from current row and one from the next: */
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /* Check if the two rows should switch place,
                    based on the direction, asc or desc: */
                    if (dir == "asc") {
                        if (Number(x.innerHTML) > Number(y.innerHTML)) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }

                    } else if (dir == "desc") {
                        if (Number(x.innerHTML) < Number(y.innerHTML)) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /* If a switch has been marked, make the switch
                    and mark that a switch has been done: */
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    // Each time a switch is done, increase this count by 1:
                    switchcount ++;
                } else {
                    /* If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again. */
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }






        function sortTableName(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("scoreTable");
            switching = true;
            // Set the sorting direction to ascending:
            dir = "asc";
            /* Make a loop that will continue until
            no switching has been done: */
            while (switching) {
                // Start by saying: no switching is done:
                switching = false;
                rows = table.getElementsByTagName("TR");
                /* Loop through all table rows (except the
                first, which contains table headers): */
                for (i = 1; i < (rows.length - 1); i++) {
                    // Start by saying there should be no switching:
                    shouldSwitch = false;
                    /* Get the two elements you want to compare,
                    one from current row and one from the next: */
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    /* Check if the two rows should switch place,
                    based on the direction, asc or desc: */
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            // If so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    /* If a switch has been marked, make the switch
                    and mark that a switch has been done: */
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    // Each time a switch is done, increase this count by 1:
                    switchcount ++;
                } else {
                    /* If no switching has been done AND the direction is "asc",
                    set the direction to "desc" and run the while loop again. */
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>

















<?php
include_once("footer.php");
?>