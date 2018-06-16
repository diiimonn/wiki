<?php

/**
 * The Open Closed Principle (OCP)
 * "Software entities (classes, modules, functions, etc.)
 * should be open for extension, but closed for modification."
 *
 * It's necessary:
 * - Convert the code from the previous example so that the OCP is not violated.
 */

namespace SOLID\step3_O;


/**
 * Class PaymentSystemOne
 * @package SOLID\step3_O
 */
class PaymentSystemOne extends PaymentSystem implements IGlobal
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
 * @package SOLID\step3_O
 */
class PaymentSystemTwo extends PaymentSystem implements IGlobal
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
 * @package SOLID\step3_O
 */
class PaymentSystem
{
    /**
     * @var IGlobal
     */
    protected $logger;

    /**
     * PaymentSystemOne constructor.
     * @param IGlobal $logger
     */
    public function __construct(IGlobal $logger)
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
     * @param IGlobal $logger
     * @return IGlobal
     * @throws \Exception
     */
    public static function create(string $class_name, IGlobal $logger): IGlobal
    {
        return new $class_name($logger);
    }

    public function write(string $data)
    {
        // TODO: Implement write() method.
    }
}

/**
 * Interface IGlobal
 * @package SOLID\step3_O
 */
interface IGlobal
{
    /**
     * @param string $data
     * @return mixed
     */
    public function write(string $data);

    /**
     * @return mixed
     */
    public function pay();
}

/**
 * Class Logger
 * @package SOLID\step3_O
 */
class Logger
{
    /**
     * @param string $class_name
     * @return IGlobal
     * @throws \Exception
     */
    public static function create(string $class_name): IGlobal
    {
        return new $class_name();
    }

    public function pay(): bool
    {
        // TODO: Implement pay() method.
    }
}

/**
 * Class FileLogger
 * @package SOLID\step3_O
 */
class FileLogger extends Logger implements IGlobal
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
 * @package SOLID\step3_O
 */
class DbLogger extends Logger implements IGlobal
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

$logger = Logger::create('SOLID\step3_O\FileLogger');
$payment_system = PaymentSystem::create('SOLID\step3_O\PaymentSystemOne', $logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);



$logger = Logger::create('SOLID\step3_O\DbLogger');
$payment_system = PaymentSystem::create('SOLID\step3_O\PaymentSystemTwo', $logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);