<?php
    require_once("../initialize.php");
    require_once("../parts/header.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $result_set = query("SELECT voornaam, emailadres, rol FROM klant WHERE emailadres = '" . $_POST['emailadres'] . "' AND wachtwoord = '" . $_POST['wachtwoord'] . "'");
        if($result = mysqli_fetch_assoc($result_set)) {
            $_SESSION['gebruiker'] = $result['emailadres'];
            $_SESSION['rol'] = $result['rol'];

            if ($_SESSION['rol'] == "u") {
                $_SESSION['logged_user'] = TRUE;
            } elseif ($_SESSION['rol'] == "a") {
                $_SESSION['logged_admin'] = TRUE;
            }

            header('Location: http://localhost/parking/php/pages/index.php');
        }
    }

    if(isset($_SESSION['logged_user'])) {
        header('Location: http://localhost/parking/php/pages/index.php');
    }
?>

<div class="row">
    <div class="top-section col-12">
        <h2>Inloggen</h2>
    </div>
</div>

<div class="row">
    <div class="left-section col-3">
        <button type="button" class="home first-button"><a href="./index.php">Home</a></button>
        <button type="button" class="registeren button"><a href="./registreren.php">Registreren</a></button>
        <button type="button" class="inloggen"><a href="./login.php">Inloggen</a></button>
        <button type="button" class="contact"><a href="./contact.php">Contact</a></button>
    </div>

    <div class="right-section col-9">
        <form action="./login.php" method="post" class="form"> 
            <div class="row">
                <div class="col-5 input-text">
                    E-mailadres
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="emailadres" placeholder="E-mailadres" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Wachtwoord
                </div>
                <div class="col-7 form-input">
                    <input type="password" name="wachtwoord" placeholder="●●●●●●●●●●●●" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5">
                </div>
                <div class="col-7 form-input">
                    <input type="submit" value="LOGIN">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    require_once("../parts/footer.php");
?>