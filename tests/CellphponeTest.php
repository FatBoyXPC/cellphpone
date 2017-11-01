<?php

namespace Fatboyxpc\Cellphpone\Test;

use Fatboyxpc\Cellphpone\Cellphpone;
use Mockery as m;

class CellphponeTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFactory()
    {
        Cellphpone::setFactory(null);

        $factory = Cellphpone::getFactory();

        $this->assertInstanceOf('\Fatboyxpc\Cellphpone\GatewayFactory', $factory);
    }

    public function testSetFactory()
    {
        $factory = m::mock('Fatboyxpc\Cellphpone\GatewayFactory');

        Cellphpone::setFactory($factory);

        $this->assertSame($factory, Cellphpone::getFactory());
    }

    public function testCallStatic()
    {
        $factory = m::mock('Fatboyxpc\Cellphpone\GatewayFactory');

        $factory->shouldReceive('testMethod')
                ->with('test-argument')
                ->once()
                ->andReturn('test result');

        Cellphpone::setFactory($factory);

        $result = Cellphpone::testMethod('test-argument');

        $this->assertSame('test result', $result);
    }
}
