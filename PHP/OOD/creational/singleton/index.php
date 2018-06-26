<?php
/**
 * The singleton pattern
 * is a software design pattern that restricts the instantiation of a class to one object.
 */

namespace OOD\creational\singleton;

/**
 * Class Singleton
 * @package OOD\creational\singleton
 */
trait Singleton
{
    /**
     * @var static
     */
    private static $instance;

    private function __construct()
    {
        // TODO: stop encapsulating.
    }

    private function __wakeup()
    {
        // TODO: stop serializing.
    }

    private function __clone()
    {
        // TODO: stop cloning.
    }

    /**
     * @return Singleton|static
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }
}

/**
 * Class Db
 * @package OOD\creational\singleton
 *
 * @method static Db instance
 */
class Db
{
    use Singleton;

    public $initCount = 0;

    private function __construct()
    {
        $this->initCount++; //detect count of initialization
    }
}

//Client

$connection_first = Db::instance();
$connection_second = Db::instance();

var_dump([$connection_first, $connection_second]);
