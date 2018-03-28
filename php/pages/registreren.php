<?php
    require_once("../initialize.php");
    require_once("../parts/header.php");

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    //Load composer's autoloader
    require '../phpmailer/vendor/autoload.php';
    
    

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $auth_key = generateId(19);
        $kenteken = $_POST['kenteken_een'] . '-' . $_POST['kenteken_twee'] . '-' . $_POST['kenteken_drie'];
        $aankomst = $_POST["jaar"] . "-" . $_POST["maand"] . "-" . $_POST["dag"] . " " . $_POST["aankomsttijd"] . ":00";

        $result = query("INSERT INTO klant (kenteken, voornaam, tussenvoegsel, achternaam, straatnaam, huisnummer, postcode, woonplaats, emailadres, telefoonnummer, rekeningnummer, auth_key) 
        VALUES ('" . $kenteken . "', '" . $_POST['voornaam'] . "', '" . $_POST['tussenvoegsel'] . "', '" . $_POST['achternaam'] . "', '" . $_POST['straatnaam'] . "', '" . $_POST['huisnummer'] . "', '" . $_POST['postcode'] . "', '" . $_POST['woonplaats'] . "', '" . $_POST['emailadres'] . "', '" . $_POST['telefoonnummer'] . "', '" . $_POST['rekeningnummer'] . "', '" . $auth_key . "')");

        query("INSERT INTO reservering (kenteken, typeparking, aankomst) 
        VALUES ('" . $kenteken . "', '" . $_POST['typeparking'] . "', '" . $aankomst . "')");

        if ($result) {
            header('Location: http://localhost/parking/php/pages/login.php');
        }

$to = $_POST['emailadres'];
$subject = "krijg aids";

$message = "
<html>
<head>
<title>en ebola</title>
</head>
<body>
<a href='http://localhost/parking/php/pages/create_password.php?auth_key=". $auth_key ."'>link</a>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <ding@example.com>' . "\r\n";

mail($to,$subject,$message,$headers);



        // $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        // //Server settings
        // $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        // $mail->isSMTP();                                      // Set mailer to use SMTP
        // $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
        // $mail->SMTPAuth = true;                               // Enable SMTP authentication
        // $mail->Username = '312325@student.mboutrecht.nl';                 // SMTP username
        // $mail->Password = 'Welkom2013';                           // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;                                    // TCP port to connect to
        // //Recipients
        // $mail->setFrom('312325@student.mboutrecht.nl', 'Mailer');
        // $mail->addAddress($_POST['emailadres']);     // Add a recipient
        // //Content
        // $mail->isHTML(true);                                  // Set email format to HTML
        // $mail->Subject = 'Activeer uw account';
        // $mail->Body    = 'Activeer uw account via de volgende link: http://localhost/parking/php/pages/create_password.php?auth_key=' . $auth_key;
        // $mail->AltBody = 'Activeer uw account met behulp van een key';
        // $mail->send();
    }

    if(isset($_SESSION['logged_user'])) {
        header('Location: http://localhost/parking/php/pages/index.php');
    }
    

?>

<div class="row">
    <div class="top-section col-12">
        <h2>Registreren</h2>
    </div>
</div>
<div class="row">
    <div class="left-section col-3">
        <button type="button" class="home first-button"><a href="./index.php">Home</a></button>
        <button type="button" class="registeren"><a href="./registreren.php">Registreren</a></button>
        <button type="button" class="inloggen"><a href="./login.php">Inloggen</a></button>
        <button type="button" class="contact"><a href="./contact.php">Contact</a></button>
    </div>

    <div class="right-section col-9">
        <form action="./registreren.php" method="post" class="form"> 
            <div class="row">
                <div class="col-5 input-text">
                    Voornaam
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="voornaam" placeholder="Voornaam" maxlength="35" required >
                </div>
            </div>
            
            <div class="row">
                <div class="col-5 input-text">
                    Tussenvoegsel
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="tussenvoegsel" maxlength="11" placeholder="Tussenvoegsel">
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Achternaam
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="achternaam" maxlength="35" placeholder="Achternaam" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Straatnaam en huisnummer
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="straatnaam" placeholder="Straatnaam" maxlength="35" required>
                    <input type="text" name="huisnummer" class="huisnummer" maxlength="5" placeholder="Nr" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Postcode
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="postcode" placeholder="1234AB" maxlength="6" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Woonplaats
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="woonplaats" placeholder="Woonplaats" maxlength="35" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    E-mailadres
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="emailadres" placeholder="E-mailadres" maxlength="254" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Kenteken
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="kenteken_een" class="kenteken_een" placeholder="XX" maxlength="2" required>
                    <span class="oi oi-minus"></span>
                    <input type="text" name="kenteken_twee" class="kenteken_twee" placeholder="XX" maxlength="2" required>
                    <span class="oi oi-minus"></span>
                    <input type="text" name="kenteken_drie" class="kenteken_drie" placeholder="XX" maxlength="2" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Telefoonnummer
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="telefoonnummer" placeholder="Telefoonnummer" maxlength="10" required>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Rekeningnummer
                </div>
                <div class="col-7 form-input">
                    <input type="text" name="rekeningnummer" placeholder="Rekeningnummer" maxlength="20" required>
                </div>
            </div>
            

            <div class="row">
                <div class="col-5 input-text">
                    Type parking
                </div>
                <div class="col-7 form-input">
                    <input type="radio" name="typeparking" value="v" checked> Valet
                    <input type="radio" name="typeparking" value="l"> Long
                    <input type="radio" name="typeparking" value="e"> Economic
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Aankomsttijd
                </div>
                <div class="col-7 form-input">
                    <span><input type="time" name="aankomsttijd" class="tijd" placeholder="hh:mm" maxlength="5" required></span>
                </div>
            </div>

            <div class="row">
                <div class="col-5 input-text">
                    Aankomstdatum
                </div>
                <div class="col-7 form-input aankomst">
                    <span><input type="number" name="dag" class="aankomst-dag" max="31" required></span>
                    <span><input type="number" name="maand" class="aankomst-maand" max="12" required></span>
                    <span><input type="number" name="jaar" class="aankomst-jaar" max="2019" required></span><br>
                    <span class="aankomst-dag">DAG</span>
                    <span class="aankomst-maand">MAAND</span>
                    <span class="aankomst-jaar">JAAR</span>
                </div>  
            </div>

            <div class="row">
                <div class="col-5">
                </div>
                <div class="col-7 form-input">
                    <input type="submit" value="Registreer">
                    <input type="submit" value="Afbreken">
                </div>
            </div>
        </form>
    </div>
</div>


<?php
    require_once("../parts/footer.php");
?>