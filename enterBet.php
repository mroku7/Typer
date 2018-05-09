<?php
include_once("header.php");
include_once("slider.php");
include_once("navBar.php");
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
</select>
<div id="div">
    <form class="addMatches" method="post">
    <?php
    if(isset($_GET['sel'])){

            require_once 'includes/connect.php';
            $sel = $_GET['sel'];
            $connect = new mysqli($host, $db_user, $db_password, $db_name);
            if($connect->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }else{
                $result = $connect->query("SELECT * FROM `match` WHERE FixtureNr='$sel'");
                if($result->num_rows>0) {
                    while($row = $result->fetch_assoc()){
                        echo $row['HomeTeam']. "      <input type=\"number\" min=\"0\" max=\"9\">"." vs "."<input type=\"number\" min=\"0\" max=\"9\">      ".$row['AwayTeam']."<br>";
                }
                $connect->close();
            }
        }


    }
    ?>
    </form>
</div>
<script>


    function myFn() {
        window.location.href="enterBet.php?sel="+arguments[0];
        console.log(arguments[0]);



    }

</script>

















<?php
include_once("footer.php");
?>