<?php

namespace App\Helpers;

use \Carbon\Carbon;
use App\Models\Messagerie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

class Myhelper
{
  public static function sendmail($to, $cc, $usrfrom, $emlfrom, $subject, $content, $path, $filename)
  {
    require base_path("vendor/autoload.php");
    $mail = new PHPMailer(true);   // Passing `true` enables exceptions
    $mail->CharSet = "UTF-8";
    try {
      // Email server settings
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = env('MAIL_HOST');           	// smtp host
      $mail->SMTPAuth = true;
      $mail->Username = env('MAIL_USERNAME');   		// sender username
      $mail->Password = env('MAIL_PASSWORD');    // sender password
      $mail->SMTPSecure = "ssl";              // encryption - ssl/tls
      $mail->Port = env('MAIL_PORT');            // port - 587/465
      $mail->timeout = null;
      $mail->Encoding = 'base64';

      $mail->setFrom($emlfrom, $usrfrom); // sender email and name
      $mail->addAddress($to);
      if (!empty($cc)) {
        foreach($cc as $email):
          $mail->AddCC($email);
        endforeach;
      }
      if ($path != '') {
        $mail->addAttachment(public_path($path), $filename);
      }
      $mail->addReplyTo($emlfrom, $usrfrom); // sender email and name);
      $mail->SMTPOptions = [
        'ssl' => [
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => false
        ]
      ];
      $mail->isHTML(true);                	// Set email comment format to HTML
      $mail->Subject = $subject;
      $mail->Body = $content;
      $mail->send();
      Log::info('SendMail - Success : Email has been sent.');
    } catch(Exception $e) {
      Log::warning('SendMail - Error : ' . $e->getMessage());
    }
  }
}
