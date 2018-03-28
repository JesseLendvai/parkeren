<?php
    require_once("../initialize.php");
    require_once("../parts/header.php");
?>

<div class="row">
    <div class="top-section col-12">
        <h2>Contact</h2>
    </div>
</div>

<div class="row">
    <div class="left-section col-3">
        <?php 
            if(isset($_SESSION['logged_user'])) {
                echo '
                    <button type="button" class="first-button home"><a href="./index.php">Home</a></button>
                    <button type="button" class="log-uit"><a href="./logout.php">Log uit</a></button>
                    <button type="button" class="reserveringen"><a href="./reserveren.php">Reserveren</a></button>
                    <button type="button" class="reserveringen"><a href="./overzicht_reserveringen.php">Reserveringen</a></button>
                    <button type="button" class="info"><a href="./info.php">Info</a></button>
                ';
            } else {
                echo '   
                    <button type="button" class="home first-button"><a href="./index.php">Home</a></button>
                    <button type="button" class="registeren"><a href="./registreren.php">Registreren</a></button>
                    <button type="button" class="inloggen"><a href="./login.php">Inloggen</a></button>
                ';
            }
        ?>
        <button type="button" class="contact"><a href="./contact.php">Contact</a></button>
    </div>

    <div class="right-section col-9">
    </div>
</div>

<?php
    require_once("../parts/footer.php")
?>