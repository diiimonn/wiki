<?php
/**
 * Lazy initialization
 * is the tactic of delaying the creation of an object, the calculation of a value,
 * or some other expensive process until the first time it is needed.
 */

namespace OOD\creational\lazy_initialization;

/**
 * Class User
 * @package OOD\creational\lazy_initialization
 */
class User
{
    /**
     * @var Profile
     */
    private $profile;

    /**
     * @return Profile
     */
    public function getProfile()
    {
        if (!$this->profile) {
            $this->profile = new Profile();
        }

        return $this->profile;
    }
}

/**
 * Class Profile
 * @package OOD\creational\lazy_initialization
 */
class Profile
{
    /**
     * @var int
     */
    public $init_count = 0;

    public function __construct()
    {
        $this->init_count++; //detect count initialization
    }
}

//Client

$user = new User();
$profile_first = $user->getProfile();
$profile_second = $user->getProfile();

var_dump([$profile_first, $profile_second]);
