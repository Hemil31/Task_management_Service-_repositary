<?php
namespace App\Interfaces;

/**
 * Summary of EmailInterfaceSend
 */
interface EmailInterfaceSend
{
    /**
     * Summary of sendEmail
     */
    public function sendEmail($view, $subject, $data);
}


