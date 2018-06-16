<?php

/**
 * Liskov Substitution Principle (LSP).
 *
 * "Let q(x) be a property provable about objects x of type T.
 * Then q(y) should be true for objects y of type S where S is a subtype of T."
 *
 *
 * In the previous example, the method [[PaymentSystem::pay()]] of the parent class
 * returned values of type `boolean`, but the methods [[PaymentSystemOne::pay()]] and
 * [[PaymentSystemTwo::pay()]] of the successor
 * classes returned values of type `null` which is a violation of LSP,
 * because the client can get two different values.
 *
 *
 * It's necessary:
 * - Convert the code from the previous example so that the LSP is not violated.
 */

namespace SOLID\step5_L;


/**
 * Class PaymentSystemOne
 * @package SOLID\step5_L
 */
class PaymentSystemOne extends PaymentSystem implements IPaymentSystem
{
    /**
     * @return bool
     * @throws \Throwable
     */
    public function pay(): bool
    {
        try {
            //TODO: request to external service
        } catch(\Throwable $e) {
            $this->logger->write($e->getMessage());

            throw $e;
        }

        return false;
    }
}

/**
 * Class PaymentSystemTwo
 * @package SOLID\step5_L
 */
class PaymentSystemTwo extends PaymentSystem implements IPaymentSystem
{
    /**
     * @return bool
     * @throws \Throwable
     */
    public function pay(): bool
    {
        try {
            //TODO: request to external service
        } catch(\Throwable $e) {
            $this->logger->write($e->getMessage());

            throw $e;
        }

        return false;
    }
}

/**
 * Class PaymentSystem
 * @package SOLID\step5_L
 */
class PaymentSystem
{
    /**
     * @var ILogger
     */
    protected $logger;

    /**
     * PaymentSystemOne constructor.
     * @param ILogger $logger
     */
    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return bool
     */
    public function pay(): bool
    {
        return false;
    }

    /**
     * @param string $class_name
     * @param ILogger $logger
     * @return IPaymentSystem
     * @throws \Exception
     */
    public static function create(string $class_name, ILogger $logger): IPaymentSystem
    {
        return new $class_name($logger);
    }
}

/**
 * Interface ILogger
 * @package SOLID\step5_L
 */
interface ILogger
{
    /**
     * @param string $data
     * @return mixed
     */
    public function write(string $data);
}

/**
 * Interface IPaymentSystem
 * @package SOLID\step5_L
 */
interface IPaymentSystem
{
    /**
     * @return bool
     */
    public function pay(): bool;
}

/**
 * Class Logger
 * @package SOLID\step5_L
 */
class Logger
{
    /**
     * @param string $class_name
     * @return ILogger
     * @throws \Exception
     */
    public static function create(string $class_name): ILogger
    {
        return new $class_name();
    }
}

/**
 * Class FileLogger
 * @package SOLID\step5_L
 */
class FileLogger extends Logger implements ILogger
{
    /**
     * @param string $msg
     * @return bool
     */
    public function write(string $msg)
    {
        // TODO: Implement write() method.
    }
}

/**
 * Class DbLogger
 * @package SOLID\step5_L
 */
class DbLogger extends Logger implements ILogger
{
    /**
     * @param string $msg
     * @return bool
     */
    public function write(string $msg)
    {
        // TODO: Implement write() method.
    }
}



//Client

$logger = Logger::create('SOLID\step5_L\FileLogger');
$payment_system = PaymentSystem::create('SOLID\step5_L\PaymentSystemOne', $logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);



$logger = Logger::create('SOLID\step5_L\DbLogger');
$payment_system = PaymentSystem::create('SOLID\step5_L\PaymentSystemTwo', $logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);