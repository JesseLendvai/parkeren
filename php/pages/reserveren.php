<?php
    require_once("../initialize.php");
    require_once("../parts/header.php");

    if(!isset($_SESSION['logged_user'])) {
        header('Location: http://localhost/parking/php/pages/login.php');
    }
?>

<div class="row">
    <div class="top-section col-12">
        <h2>Reserveren</h2>
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
        <form action="./betalen.php" method="post" class="form"> 

            <div class="row">
                <div class="col-5 input-text">
                    Type parking
                </div>
                <div class="col-7 form-input">
                    <input type="radio" name="typeparking" value="valet" checked> Valet
                    <input type="radio" name="typeparking" value="long"> Long
                    <input type="radio" name="typeparking" value="economic"> Economic
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Aankomsttijd
                </div>
                <div class="col-7 form-input">
                    <span><input type="time" name="aankomsttijd" class="tijd"></span>
                </div>
            </div>


            <div class="row">
                <div class="col-5 input-text">
                    Aankomstdatum
                </div>
                <div class="col-7 form-input aankomst">
                    <span><input type="text" name="dag" maxlength="2" class="aankomst-dag"></span>
                    <span><input type="text" name="maand" maxlength="2" class="aankomst-maand"></span>
                    <span><input type="text" name="jaar" maxlength="4" class="aankomst-jaar"></span><br>
                    <span class="aankomst-dag">DAG</span>
                    <span class="aankomst-maand">MAAND</span>
                    <span class="aankomst-jaar">JAAR</span>
                </div>  
            </div>

            <div class="row">
                <div class="col-5">
                </div>
                <div class="col-7 form-input">
                    <input type="submit" value="RESERVEREN">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    require_once("../parts/footer.php")
?>