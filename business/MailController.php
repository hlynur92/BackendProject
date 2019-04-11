<?php
include_once __DIR__ . "/../Persistence/MailDAO.php";
class MailController
{
        public function __construct(){

        }

        public function contactFormMail($email, $name, $subject, $message){
            mail($email, "Auto Reply", " Hello $name <br><br>This is an automatic reply to inform you we have recieved your mail. We will look over your mail and get back to you as fast as possible.");

            $mailDAO = new MailDAO();
            $mailDAO->storeUserMail($email, $name, $subject, $message);
        }
}