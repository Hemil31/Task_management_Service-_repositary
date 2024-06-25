<?php
namespace App\Interfaces;

/**
 * Summary of EmailInterfaceSend
 */
interface EmailInterfaceSend
{
    /**
     * Summary of sendEmail
     * @param mixed $view
     * @param mixed $subject
     * @param mixed $data
     */
    public function sendEmail($view, $subject, $data) : bool;
}


