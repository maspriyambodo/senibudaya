<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Support\Facades\Log;

class User {

    public static function enkrip($text) {
        $key = "BODO-13-GANTENG!";
        $cipher = "AES-128-CBC";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $encryptedText = openssl_encrypt($text, $cipher, $key, 0, $iv);
        $encryptedTextWithIv = base64_encode($iv . $encryptedText);
        return $encryptedTextWithIv;
    }

    public static function dekrip($text) {
        $key = "BODO-13-GANTENG!";
        $cipher = "AES-128-CBC";
        $decodedData = base64_decode($text);
        $ivLength = openssl_cipher_iv_length($cipher);
        $iv = substr($decodedData, 0, $ivLength);
        $encryptedText = substr($decodedData, $ivLength);
        $decryptedText = openssl_decrypt($encryptedText, $cipher, $key, 0, $iv);
        return $decryptedText;
    }

    public static function composeEmail($param) {
        $data = [
            'user_email' => $param['user_email'],
            'pass_reset_link' => $param['pass_reset_link'],
            'nama' => $param['nama']
        ];
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.mailersend.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'MS_d5ZSM5@scentivaid.com';
        $mail->Password = '7kudJCm4WM2xsf5h';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('MS_d5ZSM5@scentivaid.com', 'Repositori Seni Budaya Islam');
        $mail->addAddress($param['user_email']);
//        $mail->addCC(null);
//        $mail->addBCC($request->emailBcc);
        $mail->addReplyTo('humasbimasislam@kemenag.go.id', 'Humas Bimas Islam');
        $mail->isHTML(true);
        $mail->Subject = $param['subject_title'];
        $mail->Body = view($param['views_file'], $data)->render();
        $mail->send();
    }
    
//    public static function composeEmail($param) {
//        $data = [
//            'user_email' => $param['user_email'],
//            'pass_reset_link' => $param['pass_reset_link'],
//            'nama' => $param['nama']
//        ];
//        require base_path("vendor/autoload.php");
//        $mail = new PHPMailer(true);
//        $mail->SMTPDebug = 0;
//        $mail->isSMTP();
//        $mail->Host = 'sandbox.smtp.mailtrap.io';
//        $mail->SMTPAuth = true;
//        $mail->Username = '537948d7a33db0';
//        $mail->Password = 'e226df579f836a';
//        $mail->SMTPSecure = null;
//        $mail->Port = 2525;
//        $mail->setFrom('humasbimasislam@kemenag.go.id', 'Repositori Seni Budaya Islam');
//        $mail->addAddress($param['user_email']);
//        $mail->addCC('maspriyambodo@gmail.com');
////        $mail->addBCC($request->emailBcc);
//        $mail->addReplyTo('humasbimasislam@kemenag.go.id', 'Humas Bimas Islam');
//        $mail->isHTML(true);
//        $mail->Subject = $param['subject_title'];
//        $mail->Body = view($param['views_file'], $data)->render();
//        $mail->send();
//    }
}
