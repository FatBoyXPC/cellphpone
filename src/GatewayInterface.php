<?php

namespace Fatboyxpc\Cellphpone;

interface GatewayInterface
{

    /**
     * Send an SMS message through a provided SMS Gateway.
     *
     * @param mixed $to
     * @param mixed $from
     * @param mixed $message
     *
     * @return bool
     */
    public function sendSms($to, $from, $message);

    /**
     * Make a phone call through a provided SMS Gateway.
     *
     * @param mixed $receiver
     * @param mixed $caller
     *
     * @return bool
     */
    public function makeCall($receiver, $caller);

    /**
     * Initialize the gateway object with parameters specific to each
     * implementation of the gateway.
     *
     * @param array $parameters
     *
     * @return GatewayInterface
     */
    public function initialize($parameters);
}
