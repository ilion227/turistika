<?php
include_once 'session.php';
include_once 'database.php';

function getCountryName($id) {
    include 'database.php';
    $query = "SELECT * FROM countries
                  WHERE id = $id";
    $result = mysqli_query($link, $query);
    $country = mysqli_fetch_array($result);
    return $country['title'];
}

$id = (int) $_POST['id'];
$ime = $_SESSION['first_name'];
$priimek = $_SESSION['last_name'];
$email = $_SESSION['email'];
$sporocilo = $_POST['sporocilo'];

$query = "SELECT * FROM destinations WHERE id = $id";
$result = mysqli_query($link, $query);
$destination = mysqli_fetch_array($result);

require_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();
$mail->CharSet = 'utf-8';                               // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'turistika.ppb@gmail.com';                 // SMTP username
$mail->Password = 'turistika123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($email, ( $ime . " " . $priimek ));
$mail->addAddress('turistika.ppb@gmail.com', 'Joe User');     // Add a recipient;

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Zadeva';
$mail->Body    = '<h1>' . $sporocilo . '</h1>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>
<style>
    @import url(http://fonts.googleapis.com/css?family=Roboto:100);
    html{
        height:100%;
    }
    body{
        margin:0px;
        padding:0px;
        height:100%;
        width:100%;
        background: #466c94;
        word-spacing:.1em;
        letter-spacing:.06em;
    }
    h1,h2,h3{
        position:relative;
    }
    h1{
        bottom:115px;
        color:#fff;
        font-family:Roboto;
        font-weight:700;
        font-size:10em;
        text-shadow: 2px 2px 2px #000;
    }
    h2{
        font-family:Roboto;
        font-size:2.1em;
        font-style:normal;
        color:#fff;
    }
    h3{
        font-family:Roboto;
        font-size:1.5em;
        font-style:normal;
        color:#fff;
    }
    section{
        width:100%;
        height:100%;
        background:url(http://www.nickbraver.com/images/anotherbg.jpg) no-repeat center;
        background-size:cover;
        position:relative;
        background-clip:border-box;
        display:-webkit-box;
        display:-moz-box;
        display:-ms-flexbox;
        display:-webkit-flex;
        display:flex;
        display:box;
        -webkit-box-align:center;
        -moz-box-align:center;
        -ms-flex-align:center;
        -webkit-align-items:center;
        align-items:center
    }
    .center{
        text-align:center;
        width:auto;
        height:auto;
        margin:0 auto
    }
    a {
        border-radius: 25px;
        padding: 20px;
        background: #fff;
        color: #000;
        font-weight: 800;
        font-family: Roboto;
        text-transform: uppercase;
        text-decoration: none;
        box-shadow: 2px 2px 2px #000;
    }
</style>
<section>
    <div class="center">
        <h1>Sporočilo poslano!</h1>
        <a class="btn btn-default" href="destination.php?id=<?php echo $id; ?>">Nazaj na destinacijo</a>
    </div>
</section>
<? include_once 'footer.php'; ?>
