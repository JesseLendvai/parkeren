<?php
    require_once("../initialize.php");
    require_once("../parts/header.php");

    if(!isset($_SESSION['logged_user'])) {
        header('Location: http://localhost/parking/php/pages/login.php');
    }
?>

<div class="row">
    <div class="top-section col-12">
        <h2>Betalen</h2>
    </div>
</div>

<div class="row">
    <div class="left-section col-3">
        <button type="button" class="first-button home"><a href="./index.php">Home</a></button>
        <button type="button" class="log-uit"><a href="./logout.php">Log uit</a></button>    
        <button type="button" class="reserveringen"><a href="./reserveren.php">Reserveren</a></button>
        <button type="button" class="reserveringen"><a href="./overzicht_reserveren.php">Reserveringen</a></button>   
        <button type="button" class="info"><a href="./info.php">Info</a></button>  
        <button type="button" class="contact"><a href="./contact.php">Contact</a></button>
    </div>

    <div class="right-section col-9">
        <form action="./betalen.php" method="post" class="form"> 

            <div class="row">
                <div class="col-5 input-text">
                    Aankomst
                </div>
                <div class="col-7 form-input">
                    <span><input type="text" name="aankomst-datum" class="datum"></span>
                    <span><input type="text" name="aankomst-tijd" class="tijd"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Vertrek
                </div>
                <div class="col-7 form-input">
                    <span><input type="text" name="vertrek-datum" min="0" class="datum"></span>
                    <span><input type="text" name="vertrek-tijd" min="0" class="tijd"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Maximale uitrijtijd
                </div>
                <div class="col-7 form-input">
                    <span><input type="number" name="uren" class="uitrijtijd" placeholder="hh" max="4" required></span>
                    <span><input type="number" name="minuten" class="uitrijtijd" placeholder="mm" max="59" required></span>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Prijs
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="prijs" class="prijs">
                </div>
            </div>
            

            <div class="row">
                <div class="col-5 input-text">
                    Type parking
                </div>
                <div class="col-7 form-input">
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                </div>
                <div class="col-7 form-input">
                    <input type="submit" value="Betalen">
                    <input type="submit" value="Afbreken">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    require_once("../parts/footer.php")
?>