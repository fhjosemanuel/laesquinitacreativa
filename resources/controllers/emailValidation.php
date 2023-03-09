<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once ('../../vendor/autoload.php');
include_once('db.php');

$email = $_GET['email'] ?? null;
$name = $_GET['name'] ?? null;
if ($email && $name) {
  //* Validaciones para evitar inyecciones de código
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("El email proporcionado es inválido.");
  }
  validate($email, $name);
}

function validate($email, $name)
{
  // Generar un código de verificación único que se asocia con el correo electrónico registrado
  $verification_code = generateVerificationCode($email);

  // Crear la URL de confirmación
  $url_confirmation = "http://laesquinitacreativa.test/confirmacion.php?email=" . urlencode($email) . "&token=" . urlencode($verification_code);

  // Enviar el correo electrónico
  $subject = "Confirmación de correo electrónico";
  sendEmail($name, $email, $subject, $url_confirmation);
}

//Función encargada de generar el código para validar el correo
function generateVerificationCode($email){
  //Caracteres validos
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $code = '';
  for ($i = 0; $i < 13; $i++) {
    $code .= $characters[rand(0, strlen($characters) - 1)];
  }
  //Guardar en el registro del usuario el código creado, la tabla se llama users y la columna code_validation
  $connect = conectar();
  $email_safe = mysqli_real_escape_string($connect, $email);
  $query = "UPDATE users SET code_validation = '$code' WHERE email = '$email_safe'";
  mysqli_query($connect, $query);
  cerrarConexion($connect);
  return $code;
}

// Cargar las variables de entorno del archivo .env
$dotenv = parse_ini_file(__DIR__ . '/../../.env');

// Agregar las variables de entorno a la sesión de PHP
foreach ($dotenv as $key => $value) {
    putenv("$key=$value");
}

function sendEmail($name, $destinatary, $subject, $url_confirmation){

  //Credenciales configuracion PHPMail
  $mail_host = getenv('MAIL_HOST');
  $mail_port = getenv('MAIL_PORT');
  $mail_username = getenv('MAIL_USERNAME');
  $mail_password = getenv('MAIL_PASSWORD');

  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = $mail_host;                             //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Port       = $mail_port;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      $mail->Username   = $mail_username;                         //SMTP username
      $mail->Password   = $mail_password;                         //SMTP password
      $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
      $mail->CharSet = 'UTF-8';                                   //Configura la codificación de caracteres
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output

      //Recipients
      $mail->setFrom('laesquinita@creativa.com', 'La esquinita creativa');
      $mail->addAddress($destinatary, $name);                     //Add a recipient

      //Content
      $mail->isHTML(true);                                        //Set email format to HTML
      $mail->Subject = $subject;
      $html = file_get_contents('../mail/validationEmail.html');  //Asigna ruta a la plantilla base
      // Reemplazar los valores en la plantilla
      $html = str_replace('{user_name}', $name, $html);
      $html = str_replace('{url_confirmation}', $url_confirmation, $html);
      $mail->Body = $html;                                        // Asignar el HTML al cuerpo del correo electrónico

      //Enviar el mensaje
      $mail->send();
      header('Location: ../../../../index.php');
      exit();
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

?>