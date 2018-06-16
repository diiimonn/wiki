<?php

/**
 * Dependency Inversion Principle (DIP)
 * "High-level modules should not depend on low-level modules. Both should depend on abstractions."
 * "Abstractions should not depend on details. Details should depend on abstractions."
 *
 * It's necessary:
 * - Add a way to write logs to the database.
 * - Add payment method "Two".
 * - Convert the code from the previous example so that the DIP is not violated.
 */

namespace SOLID\step2_D;


/**
 * Class PaymentSystemOne
 * @package SOLID\step2_D
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
 * @package SOLID\step2_D
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
 * @package SOLID\step2_D
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
        switch($class_name) {
            case 'PaymentSystemOne':
                return new PaymentSystemOne($logger);

                break;
            case 'PaymentSystemTwo':
                return new PaymentSystemTwo($logger);

                break;
            default:
                throw new \Exception("Class {$class_name} not found.");

                break;
        }
    }

    public function write(string $data)
    {
        // TODO: Implement write() method.
    }
}

/**
 * Interface IGlobal
 * @package SOLID\step2_D
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
 * @package SOLID\step2_D
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
        switch($class_name) {
            case 'FileLogger':
                return new FileLogger();

                break;
            case 'DbLogger':
                return new DbLogger();

                break;
            default:
                throw new \Exception("Class {$class_name} not found.");

                break;
        }
    }

    public function pay(): bool
    {
        // TODO: Implement pay() method.
    }
}

/**
 * Class FileLogger
 * @package SOLID\step2_D
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
 * @package SOLID\step2_D
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

$logger = Logger::create('FileLogger');
$payment_system = PaymentSystem::create('PaymentSystemOne', $logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);



$logger = Logger::create('DbLogger');
$payment_system = PaymentSystem::create('PaymentSystemTwo', $logger);
$result = $payment_system->pay();

var_dump([$logger, $payment_system, $result]);