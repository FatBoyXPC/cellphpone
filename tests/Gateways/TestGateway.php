<?php

namespace Fatboyxpc\Cellphpone\Test\Gateways;

use Fatboyxpc\Cellphpone\GatewayInterface;

class TestGateway implements GatewayInterface
{
    public function initialize($parameters)
    {
        return $this;
    }

    public function sendSms($to, $from, $message)
    {
    }

    public function makeCall($receiver, $sender)
    {
    }
}
