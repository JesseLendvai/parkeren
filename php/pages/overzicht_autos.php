<?php
    require_once("../initialize.php");
    require_once("../parts/header.php");

    if(!isset($_SESSION['logged_admin'])) {
        header('Location: http://localhost/parking/php/pages/index.php');
    }
?>

<div class="row">
    <div class="top-section col-12">
        <h2>Overzicht auto's</h2>
    </div>
</div>

<div class="row">
    <div class="left-section col-3">
        <button type="button" class="home first-button"><a href="./index.php">Home</a></button>
        <button type="button" class="log-uit"><a href="./logout.php">Log uit</a></button>
        <button type="button" class="overzicht-auto"><a href="./overzicht_autos.php">Overzicht auto's</a></button>
    </div>

    <div class="right-section col-9">
        <form action="./overzicht_autos.php" method="post" class="form"> 
            <div class="row">
                <div class="col-5 input-text">
                    Kenteken
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="kenteken_een" class="kenteken_een" placeholder="XX">
                    <span class="oi oi-minus"></span>
                    <input type="text" name="kenteken_twee" class="kenteken_twee" placeholder="XX">
                    <span class="oi oi-minus"></span>
                    <input type="text" name="kenteken_drie" class="kenteken_drie" placeholder="XX">
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Achternaam
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="achternaam" placeholder="Achternaam">
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Type parking
                </div>
                <div class="col-7 form-input">
                    <input type="radio" name="typeparking" value="all" checked> All<br>
                    <input type="radio" name="typeparking" value="valet" checked> Valet<br>
                    <input type="radio" name="typeparking" value="long"> Long<br>
                    <input type="radio" name="typeparking" value="economic"> Economic
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                </div>
                <div class="col-7 form-input">
                    <input type="submit" value="ZOEK">
                </div>
            </div>
        </form>

        <?php if($_SERVER['REQUEST_METHOD'] == "POST") {
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}   
$conn->close();
            $result = "";
            $result_set = "";
            echo '
                <div class="row">
                    <div class="col-5 input-text">
                    </div>
                    <div class="col-7 form-input">
                        <table>
                            <thead>
                                <th>Kenteken</th>
                                <th>Datum</th>
                                <th>Aankomst Tijd</th>
                                <th>Vertrek Tijd</th>
                                <th>Type</th>
                            </thead>
                            <tbody>
                ';
                        while ($result = mysqli_fetch_assoc($result_set)) {
                            echo '
                                <tr>
                                    <td>' . $result["kenteken"] . '</td>
                                    <td>' . $result["datum"] . '</td>
                                    <td>' . $result["aankomst_tijd"] . '</td>
                                    <td>' . $result["vertrek_tijd"] . '</td>
                                    <td>' . $result["type"] . '</td>
                                </tr>
                            ';
                        }
                        echo '
                            </tbody>
                        </table>
                    </div>
                </div>
            ';
        } ?>

    </div>
</div>

<?php
    require_once("../parts/footer.php")
?>