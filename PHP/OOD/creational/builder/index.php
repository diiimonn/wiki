<?php
/**
 * The Builder
 * is a design pattern designed to provide a flexible solution to various object
 * creation problems in object-oriented programming.
 */

namespace OOD\creational\builder;

/**
 * Class Spinning
 * @package OOD\creational\builder
 */
class Spinning
{
    /**
     * @var string
     */
    public $rod;

    /**
     * @var string
     */
    public $reel;

    /**
     * @var string
     */
    public $line;

    /**
     * @var string
     */
    public $hook;
}

/**
 * Class Builder
 * @package OOD\creational\builder
 */
abstract class Builder
{
    /**
     * @var Spinning
     */
    protected $spinning;

    public function __construct()
    {
        $this->spinning = new Spinning();
    }

    /**
     * @return Spinning
     */
    public function getResult(): Spinning
    {
        return $this->spinning;
    }

    abstract public function buildRod(): void;

    abstract public function buildReel(): void;

    abstract public function buildLine(): void;

    abstract public function buildHook(): void;
}

/**
 * Class FirstSpinningBuilder
 * @package OOD\creational\builder
 */
class FirstSpinningBuilder extends Builder
{
    public function buildRod(): void
    {
        $this->spinning->rod = 'Medium power';
    }

    public function buildReel(): void
    {
        $this->spinning->reel = 'Fly';
    }

    public function buildLine(): void
    {
        $this->spinning->line = 'Braided';
    }

    public function buildHook(): void
    {
        $this->spinning->hook = 'Plug';
    }
}

/**
 * Class Shop
 * @package OOD\creational\builder
 */
class Shop
{
    /**
     * @var Builder
     */
    protected $spinningBuilder;

    /**
     * @param Builder $spinning_builder
     */
    public function setSpinningBuilder(Builder $spinning_builder): void
    {
        $this->spinningBuilder = $spinning_builder;
    }

    public function buildSpinning(): void
    {
        $this->spinningBuilder->buildRod();
        $this->spinningBuilder->buildReel();
        $this->spinningBuilder->buildLine();
        $this->spinningBuilder->buildHook();
    }

    /**
     * @return Spinning
     */
    public function getSpinning(): Spinning
    {
        return $this->spinningBuilder->getResult();
    }
}


//Client

$spinning_builder = new FirstSpinningBuilder();
$shop = new Shop();

$shop->setSpinningBuilder($spinning_builder);
$shop->buildSpinning();

$spinning = $shop->getSpinning();

var_dump([$spinning]);
