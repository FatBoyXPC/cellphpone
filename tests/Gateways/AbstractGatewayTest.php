<?php

namespace Fatboxypc\Cellphpone\Test\Gateways;

use Mockery as m;
use Fatboyxpc\Cellphpone\Gateways\AbstractGateway;

class AbstractGatewayTest extends \PHPUnit_Framework_TestCase
{
    public function testInitializeThrowsExceptionForUnkownParam()
    {
        //$gateway = m::mock('Fatboyxpc\Cellphpone\Gateways\AbstractGateway[setFooBar]');

        //$this->setExpectedException('RuntimeException');
        //$gateway->initialize(['foo_bar' => 'baz']);
    }

    //public function testInitialize()
    //{
        //$gateway = m::mock('Fatboyxpc\Cellphpone\Gateways\AbstractGateway')
            //->makePartial();
        ////$gateway = new MockAbstractGateway;

        //$gateway->shouldReceive('setFooBaz')
                //->with('baz')
                //->once()
                //->andReturn($gateway);

        //$gateway->initialize(['foo_bar' => 'baz']);
    //}
}

class MockAbstractGateway extends AbstractGateway
{
    public function sendSms($to, $from, $message)
    {
        //
    }

    public function makeCall($receiver, $caller)
    {
        //
    }
}
