<?php

namespace Fatboyxpc\Cellphpone\Test;

use Fatboyxpc\Cellphpone\Cellphpone;
use Fatboyxpc\Cellphpone\GatewayFactory;
use Mockery as m;

class GatewayFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->factory = new GatewayFactory;
        $this->factory->setNamespace('\Fatboyxpc\Cellphpone\Test\Gateways');
    }

    public function testGetNamespaceDefaults()
    {
        $factory = new GatewayFactory;
        $this->assertSame('\Fatboyxpc\Cellphpone\Gateways', $factory->getNamespace());
    }

    public function testSetNamespace()
    {
        $namespace = 'Some\Namespace';

        $this->factory->setNamespace($namespace);
        $this->assertSame($namespace, $this->factory->getNamespace());
    }

    public function testCreate()
    {
        //$this->factory->setNameSpace('\Fatboyxpc\Cellphpone\Test\Gateways');
        $gateway = $this->factory->create('Test');

        $this->assertInstanceOf('\Fatboyxpc\Cellphpone\Test\Gateways\TestGateway', $gateway);
        $this->assertInstanceOf('\Fatboyxpc\Cellphpone\GatewayInterface', $gateway);
    }

    public function testCreateThrowsExceptionWithMissingGateway()
    {
        $this->setExpectedException('RuntimeException');
        $this->factory->create('Missing');
    }

    public function testCreateDoesNotInitializeParams()
    {
        $factory = m::mock('\Fatboyxpc\Cellphpone\GatewayFactory[createGateway]')
                        ->shouldAllowMockingProtectedMethods();
        $gateway = m::mock('\Fatboyxpc\Cellphpone\Test\Gateways\TestGateway');

        $factory->shouldReceive('createGateway')
                ->andReturn($gateway);

        $gateway->shouldReceive('initialize')
                ->never();

        $factory->create('Test');
    }

    public function testCreateInitializesParams()
    {
        $factory = m::mock('\Fatboyxpc\Cellphpone\GatewayFactory[createGateway]')
                        ->shouldAllowMockingProtectedMethods();
        $gateway = m::mock('\Fatboyxpc\Cellphpone\Test\Gateways\TestGateway');

        $factory->shouldReceive('createGateway')
                ->andReturn($gateway);

        $params = ['foo' => 'bar'];

        $gateway->shouldReceive('initialize')
                ->with($params)
                ->once();

        $factory->create('Test', $params);
    }
}
