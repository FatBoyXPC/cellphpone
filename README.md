# Getting Started

## Installation
It's easiest to install with packagist/composer: ` composer require fatboyxpc/cellphpone `

You will also need one of the many gateway provider clients:

| Gateway    | Composer  |
| ----------- | ---------- |
| Twilio      | twilio/sdk |
| Plivo       | plivo/php  |

## Usage
You will need to create an instance of a provider gateway:
```
$gateway = new TwilioGateway($sid, $token);
$phone = new Cellphpone($gateway);

$sms = $phone->sendSms($to, $from, $message);
$phoneCall = $phone->makeCall($to, $from);
```

TODO:
Factory pattern, something like:
$phone = Cellphpone::create('Twilio', ['sid' => '', 'token' => '']);
$from = 2342323;
$sms = $phone->sendSms($to, $from, $message);

