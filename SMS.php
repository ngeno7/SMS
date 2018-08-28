<?php
/**
 * Created by PhpStorm.
 * User: ngeno
 * Date: 10/31/17
 * Time: 1:38 PM
 */

namespace Crm\sms;


use Repo\sms\AfricasTalkingGateway;

class SMS implements SmsInterface
{
   public $ms;
   public $to;

    public function send()
    {
        try 
        { 
           $sms = new AfricasTalkingGateway(env('AFSKINGUSERNAME'), env('AFSKINGKEY'));
           $results = $sms->sendMessage($this->to, $this->ms, null, true);
           
            return $results;
        }
        catch ( AfricasTalkingGatewayException $e )
        {
        return "Encountered an error while sending: ".$e->getMessage();
        }

    }

    public function to($to)
    {
        // TODO: Implement to() method.
        $this->to = $to;
        return $this;
    }

    public function message($message)
    {

        $this->ms = $message;
        return $this;
    }
    public function getBalance()
    {
       $gateway = new AfricasTalkingGateway(env('AFSKINGUSERNAME'), env('AFSKINGKEY'));
       $data = $gateway->getUserData();
       
       return $data;   
    }

}