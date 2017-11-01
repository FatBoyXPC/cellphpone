<?php

namespace Fatboyxpc\Cellphpone\Gateways;

use RuntimeException;
use Fatboyxpc\Cellphpone\GatewayInterface;

abstract class AbstractGateway implements GatewayInterface
{
    public function initialize($parameters)
    {
        array_walk($parameters, function ($value, $method) {
            //$callable = [$this, $this->paramKeyToSetter($method)];
            $method = $this->paramKeyToSetter($method);

            //if (!method_exists($this, $method)) {
                //echo PHP_EOL, "hiiiii", PHP_EOL;
                //throw new RuntimeException("The $method is not a valid option.");
            //}

            if (!is_callable([$this, 'setFooBag'])) {
                throw new RuntimeException("not callable");
            }

            $this->$method($value);
            //call_user_func_array($callable, [$value]);
        });

        return $this;
    }

    protected function paramKeyToSetter($parameter)
    {
        $parameter = strtolower($parameter);

        $setter = preg_replace_callback(
            '/_([a-z])/',
            function ($match) {
                return strtoupper($match[1]);
            },
            $parameter
        );


        return sprintf('set%s', ucfirst($setter));
    }
}
