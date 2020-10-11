<?php

namespace Core;

class Mail
{
    public function sendMailToUser($user_email)
    {
        // the message
        $msg = "From Pineapple\nThank you for your order";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        mail($user_email, "Thank you for your order", "We great to you", "From pineapple with luv");
    }
}
