<?php

class MailController
{
        public function __construct(){

        }

        public function contactFormMail($email, $name, $message){
            mail("hlynur92@live.com", "Subject", "Email: $email <br><br>Name: $name  <br><br>$message");
        }
}