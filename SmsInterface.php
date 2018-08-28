<?php
/**
 * Created by PhpStorm.
 * User: ngeno
 * Date: 10/31/17
 * Time: 1:35 PM
 */

namespace Crm\sms;


interface SmsInterface
{
    public function send();
    public function message($message);
    public function to($to);
    public function getBalance();
}