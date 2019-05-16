<?php
include_once __DIR__ . "/../Persistence/MailDAO.php";
class MailController
{
        public function contactFormMail($email, $name, $subject, $message){
            mail($email, "Auto Reply", " Hello $name This is an automatic reply to inform you we have received your mail. We will look over your mail and get back to you as fast as possible.");

            $mailDAO = new MailDAO();
            $mailDAO->storeUserMail($email, $name, $subject, $message);
        }

        public function invoiceMail($orderid){
            $mailDAO = new MailDAO();
            $invoice = $mailDAO->invoiceMail($orderid);

            $invoice = $invoice[0];

            mail($invoice['CustomerEmail'],"Automatic Invoice", "Hello " . $invoice['CustomerName'] . ", This is an automatic Invoice creator thank you for your purchase.\r\n \r\nOrder Date: " . $invoice['OrderDate'] . ", Issue Date: " . $invoice['IssueDate'] . " \r\nOrder Number: " . $invoice['OrderNumber']. "\r\n\r\n\r\nAddress: " . $invoice['Street'] . ", " . $invoice['ZipCode'] . " " . $invoice['City']. ", " . $invoice['CountryName'] . "\r\n\r\n\r\nBest Regards\r\n" . $invoice['CompanyName'] . "\r\nPhone Number: " . $invoice['CompanyPhoneNr'] . "\r\nEmail: " . $invoice['CompanyEmail']. "");
        }
}