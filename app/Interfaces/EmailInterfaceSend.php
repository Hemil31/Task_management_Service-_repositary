<?php
namespace App\Interfaces;

interface EmailInterfaceSend
{
    /**
     * Summary of sendEmail
     */
    public function sendEmail($view, $subject, $data);
}


