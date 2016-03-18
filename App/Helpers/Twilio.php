<?php
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';
/**
 * Handles interaction with twilio library
 */
class Twilio 
{
	public static function sendSms($number, $text)
	{
		$client = new Services_Twilio(GlobalConfig::TWILIO_SID, GlobalConfig::TWILIO_TOKEN);
		$message = $client->account->messages->sendMessage(
		    GlobalConfig::TWILIO_FROM, // From a Twilio number in your account
		   $number,
		   $text
		);
		return true;
	}

	pubic static function formatNumber($number)
	{
		//TODO:: sanitize and format number
		return $number;
	}
}