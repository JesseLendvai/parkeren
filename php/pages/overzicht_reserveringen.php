<?php
    require_once("../initialize.php");
    require_once("../parts/header.php");

    if(!isset($_SESSION['logged_user'])) {
        header('Location: http://localhost/parking/php/pages/login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == "POST") {

    }
?>

<div class="row">
    <div class="top-section col-12">
        <h2>Overzicht reserveringen</h2>
    </div>
</div>

<div class="row">
    <div class="left-section col-3">
        <button type="button" class="first-button home"><a href="./index.php">Home</a></button>
        <button type="button" class="log-uit"><a href="./logout.php">Log uit</a></button>
        <button type="button" class="reserveringen"><a href="./reserveren.php">Reserveren</a></button>
        <button type="button" class="reserveringen"><a href="./overzicht_reserveringen.php">Reserveringen</a></button>
        <button type="button" class="info"><a href="./info.php">Info</a></button>
        <button type="button" class="contact"><a href="./contact.php">Contact</a></button>
    </div>

    <div class="right-section col-9">
        <div class="row">
            <div class="col-2 input-text">
            </div>
            <div class="col-10 form-input">
                <table>
                    <thead>
                        <th class="table-header">Kenteken</th>
                        <th class="table-header">Datum</th>
                        <th class="table-header">Tijd</th>
                        <th class="table-header">Type</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                            $result_set = query("SELECT * FROM reservering, klant WHERE klant.kenteken = reservering.kenteken AND klant.emailadres = '" . $_SESSION['gebruiker'] . "'");
                            while ($result = mysqli_fetch_assoc($result_set)) {
                                echo '
                                    <tr>
                                        <td class="table-data">' . $result["kenteken"] . '</td>
                                        <td class="table-data">' . substr($result["aankomst"], 0, 10) . '</td>
                                        <td class="table-data">' . substr($result["aankomst"], 11, 8) . '</td>
                                        <td class="table-data">' . $result["typeparking"] . '</td>
                                        <td class="table-betalen"><a href="./betalen.php">Betalen</a></td>
                                    </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    require_once("../parts/footer.php")
?>