<?php

/**
 * It's a fast code, but it's not flexible and non-expandable.
 * Also, this example violates SRP.
 */

namespace SOLID\step0;


/**
 * Class PaymentSystemOne
 * @package SOLID\step0
 */
class PaymentSystemOne
{
    /**
     * @return null
     * @throws \Throwable
     */
    public function pay()
    {
        try {
            //TODO: request to external service "One"
        } catch(\Throwable $e) {
            $this->log($e->getMessage());

            throw $e;
        }

        return null;
    }

    /**
     * @param string $msg
     */
    protected function log(string $msg)
    {
        //TODO: write message
    }
}


//Client

$payment_system = new PaymentSystemOne();
$result = $payment_system->pay();

var_dump([$payment_system, $result]);