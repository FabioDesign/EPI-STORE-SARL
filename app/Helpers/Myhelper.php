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
  //sans accent
  public static function valideString($string, $encoding = 'utf-8')
  {
    // transformer les caractères accentués en entités HTML
    $string = htmlentities($string, ENT_NOQUOTES, $encoding);
    // remplacer les entités HTML pour avoir juste le premier caractères non accentués
    // Exemple : "&ecute;" => "e", "&Ecute;" => "E", "Ã " => "a" ...
    $string = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $string);
    // Remplacer les ligatures tel que : Œ, Æ ...
    // Exemple "Å“" => "oe"
    $string = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $string);
    // Supprimer tout le reste
    $string = preg_replace('#&[^;]+;€#', '', $string);
    return $string;
  }
  //Cryptage Password
  public static function hashPassword($password)
  {
    $hash = hash('sha256', $password);
    return password_hash($hash, PASSWORD_DEFAULT);
  }
  //Format English
  public static function formatDateEn($date)
  {
    if ($date != '') {
      $arrayDate = Str::of($date)->explode(' ');
      if (sizeof($arrayDate) == 1)
        return Carbon::parse($date)->format('Y-m-d');
      else
        return Carbon::parse($date)->format('Y-m-d H:i');
    }
  }
  //Format Français
  public static function formatDateFr($date)
  {
    if ($date != '') {
      $arrayDate = Str::of($date)->explode(' ');
      if (sizeof($arrayDate) == 1)
        return Carbon::parse($date)->format('d-m-Y');
      else
        return Carbon::parse($date)->format('d-m-Y H:i');
    }
  }
  //Format Français
  public static function formatDate($date)
  {
    setlocale(LC_TIME, 'fr_FR');
    if ($date != '') {
      return Carbon::parse($date)->translatedFormat('d F Y');
    }
  }

  public static function sendEmail($to, $content, $subject, $file_name)
  {
    require base_path("vendor/autoload.php");
    $mail = new PHPMailer(true);   // Passing `true` enables exceptions

    $mail->CharSet = "UTF-8";
    try {

      // Email server settings
      $mail->SMTPDebug = 0;
      $mail->isSMTP();
      $mail->Host = '173.249.8.9';             //  smtp host
      $mail->SMTPAuth = true;
      $mail->Username = 'rhsoft@jacquescyrille.net';   //  sender username
      $mail->Password = 'SU95Jo+zI+5';       // sender password
      $mail->SMTPSecure = "";                  // encryption - ssl/tls
      $mail->Port = 587;                          // port - 587/465
      $mail->timeout = null;
      $mail->Encoding = 'base64';


      $mail->setFrom('info@afric-a.com', '[SITE WEB] - AFRIC-A');
      $mail->addAttachment("assets/uploads/".$file_name);
      $mail->addAddress($to);
      // $mail->addCC($cc);

      $mail->addReplyTo('info@afric-a.com', '[SITE WEB] - AFRIC-A');

      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => false
        )
      );
      $mail->isHTML(true); // Set email content format to HTML

      $mail->Subject = $subject;
      $mail->Body    = $content;

      if (!$mail->send()) {
        return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
      } else {
        return back()->with("success", "Email has been sent.");
      }
    } catch (Exception $e) {
      return back()->with('error', 'Message could not be sent.');
    }
  }
}
