<?php

namespace Fatboyxpc\Cellphpone\Gateways;

use Exception;
use Twilio\Rest\Api\V2010\Account\MessageInstance;
use Twilio\Rest\Client;

class TwilioGateway implements GatewayInterface
{
    /**
     * Twilio Rest Client provided by the Twilio PHP SDK.
     *
     * @var Twilio\Rest\Client;
     */
    protected $client;

    /**
     * @inheritdoc
     */
    public function sendSms($to, $from, $message)
    {
        $message = $this->getClient()->account->messages->create($to, [
            'from' => $from,
            'body' => $message,
        ]);

        if ($message instanceof MessageInstance) {
            return true;
        }

        return false;
    }

    public function getClient()
    {
        if (!$this->client) {
            $this->client = new Client($this->getSid(), $this->getToken());
        }

        return $this->client;
    }

    /**
     * @inheritdoc
     */
    public function makeCall($receiver, $callers)
    {
        // do something
    }
}
