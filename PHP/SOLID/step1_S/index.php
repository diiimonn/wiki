<?php

/**
 * The Single Responsibility Principle (SRP)
 * "A class should have only one reason to change."
 *
 * It's necessary:
 * - Convert the code from the previous example so that it does not violate SRP.
 */

namespace SOLID\step1_S;


/**
 * Class PaymentSystemOne
 * @package SOLID\step1_S
 */
class PaymentSystemOne
{
    /**
     * @var FileLogger
     */
    protected $logger;

    /**
     * PaymentSystemOne constructor.
     * @param FileLogger $logger
     */
    public function __construct(FileLogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return null
     * @throws \Throwable
     */
    public function pay()
    {
        try {
            //TODO: request to external service
        } catch(\Throwable $e) {
            $this->logger->write($e->getMessage());

            throw $e;
        }

        return null;
    }
}

/**
 * Class FileLogger
 * @package SOLID\step1_S
 */
class FileLogger
{
    /**
     * @param string $msg
     */
    public function write(string $msg)
    {
        //TODO: write message
    }
}


//Client

$logger = new FileLogger();
$payment_system = new PaymentSystemOne($logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);