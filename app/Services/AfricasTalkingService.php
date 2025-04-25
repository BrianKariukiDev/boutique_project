<?php

namespace App\Services;

use AfricasTalking\SDK\AfricasTalking;

class AfricasTalkingService
{
    protected $sms;

    public function __construct()
    {
        $username = env('AFRICASTALKING_USERNAME');
        $apiKey = env('AFRICASTALKING_API_KEY');
        
        $AT = new AfricasTalking($username, $apiKey);
        $this->sms = $AT->sms();
    }

    /**
     * Send SMS with a dynamic subject and message
     *
     * @param string $phone
     * @param string $subject
     * @param string $message
     * @return mixed
     */
    public function sendSmsWithSubject($phone, $subject, $message)
    {
        $formattedMessage = "{$subject}: {$message}";

        return $this->sendSms($phone, $formattedMessage);
    }

    /**
     * Send SMS
     *
     * @param string $phone
     * @param string $message
     * @return mixed
     */
    public function sendSms($phone, $message)
    {
        return $this->sms->send([
            'to' => $phone,
            'message' => $message
        ]);
    }
}
