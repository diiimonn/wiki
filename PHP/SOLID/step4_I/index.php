<?php

/**
 * Interface Segregation Principle (ISP).
 *
 * "Many client-specific interfaces are better than one general-purpose interface."
 *
 * It's necessary:
 * - Convert the code from the previous example so that the ISP is not violated.
 */

namespace SOLID\step4_I;


/**
 * Class PaymentSystemOne
 * @package SOLID\step4_I
 */
class PaymentSystemOne extends PaymentSystem implements IPaymentSystem
{
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
 * Class PaymentSystemTwo
 * @package SOLID\step4_I
 */
class PaymentSystemTwo extends PaymentSystem implements IPaymentSystem
{
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
 * Class PaymentSystem
 * @package SOLID\step4_I
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
    public function pay()
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
 * @package SOLID\step4_I
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
 * @package SOLID\step4_I
 */
interface IPaymentSystem
{
    /**
     * @return mixed
     */
    public function pay();
}

/**
 * Class Logger
 * @package SOLID\step4_I
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
 * @package SOLID\step4_I
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
 * @package SOLID\step4_I
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

$logger = Logger::create('SOLID\step4_I\FileLogger');
$payment_system = PaymentSystem::create('SOLID\step4_I\PaymentSystemOne', $logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);



$logger = Logger::create('SOLID\step4_I\DbLogger');
$payment_system = PaymentSystem::create('SOLID\step4_I\PaymentSystemTwo', $logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);