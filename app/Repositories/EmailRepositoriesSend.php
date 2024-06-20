<?php
namespace App\Repositories;
use App\Interfaces\EmailInterfaceSend;
use App\Mail\SendEmail;
use Mail;

/**
 * Summary of EmailRepositoriesSend
 */
class EmailRepositoriesSend implements EmailInterfaceSend
{

    /**
     * Summary of sendEmail
     * @param mixed $view
     * @param mixed $subject
     * @param mixed $data
     */
    public function sendEmail($view, $subject, $data)
    {
        Mail::to($data['email'])->queue(new SendEmail($view, $subject, $data));
    }
}
