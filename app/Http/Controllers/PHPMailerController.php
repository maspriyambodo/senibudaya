<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class PHPMailerController extends Controller {

    public function email() {
        return view("email");
    }

    public function composeEmail(Request $request) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        // Email server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';             //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'maspriyambodo@gmail.com';   //  sender username
        $mail->Password = 'wcjc rnae eicx wfvz';       // sender password
        $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
        $mail->Port = 587;                          // port - 587/465

        $mail->setFrom('humasbimasislam@kemenag.go.id', 'Repositori Seni Budaya Islam');
        $mail->addAddress($request->emailRecipient);
        $mail->addCC('maspriyambodo@gmail.com');
//        $mail->addBCC($request->emailBcc);

        $mail->addReplyTo('humasbimasislam@kemenag.go.id', 'Humas Bimas Islam');

        if (isset($_FILES['emailAttachments'])) {
            for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
            }
        }

        $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = $request->emailSubject;
        $mail->Body = $request->emailBody;

        // $mail->AltBody = plain text version of email body;

        if (!$mail->send()) {
            return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
        } else {
            return back()->with("success", "Email has been sent.");
        }
    }
}
