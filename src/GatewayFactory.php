<?php

namespace Fatboyxpc\Cellphpone;

use RuntimeException;

class GatewayFactory
{
    protected $namespace;

    public function getNamespace()
    {
        if (!$this->namespace) {
            $this->setNamespace('\Fatboyxpc\Cellphpone\Gateways');
        }

        return $this->namespace;
    }

    public function setNamespace($namespace = null)
    {
        $this->namespace = $namespace;
    }

    protected function getClassName($class)
    {
        if (0 !== strpos($class, '\\')) {
            $class = sprintf('%s\%sGateway', $this->getNamespace(), $class);
        }

        return $class;
    }

    protected function createGateway($class)
    {
        if (!class_exists($class)) {
            throw new \RuntimeException("Class '$class' not found");
        }

        return new $class;
    }

    public function create($class, $parameters = [])
    {
        $gateway = $this->createGateway($this->getClassname($class));

        if (!empty($parameters)) {
            $gateway->initialize($parameters);
        }

        return new $gateway;
    }
}
