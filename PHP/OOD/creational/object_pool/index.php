<?php
/**
 * The object pool pattern
 * is a software creational design pattern that uses a set of
 * initialized objects kept ready to use – a "pool" – rather than allocating and
 * destroying them on demand.
 */

namespace OOD\creational\object_pool;

/**
 * Class WorkerPool
 * @package OOD\creational\object_pool
 */
class WorkerPool implements \Countable
{
    /**
     * @var array
     */
    private $storage = [];

    /**
     * @var int
     */
    private $limit;

    private $created = 0;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return Worker|null
     */
    public function get(): ?Worker
    {
        $worker = null;

        $count = $this->count();

        if ($count > 0) {
            $worker = array_pop($this->storage);
        }

        if ($this->created < $this->limit) {
            $worker = new Worker();
            $this->created++;
        }

        return $worker;
    }

    /**
     * @param Worker $worker
     */
    public function dispose(Worker $worker): void
    {
        $this->storage[] = $worker;
    }

    public function count()
    {
        return count($this->storage);
    }
}

/**
 * Class Worker
 * @package OOD\creational\object_pool
 */
class Worker
{
    //some methods
}

//Client

$pool = new WorkerPool(1);
$worker_one = $pool->get();
$worker_two = $pool->get();
$count = $pool->count();

var_dump([$pool, $worker_one, $worker_two, $count]);


$pool->dispose($worker_one);
$count = $pool->count();

var_dump([$count]);