<?php
namespace App\Services;
use App\Interfaces\EmailInterfaceSend;
class EmailServiceSend
{
    protected $mailInterface;
    public function __construct(EmailInterfaceSend $mailInterface)
    {
        $this->mailInterface = $mailInterface;
    }
    public function sendEmail($view, $subject, $data)
    {
        return $this->mailInterface->sendEmail($view, $subject, $data);
    }
}
