<?php

namespace App\classes;
/**
 * Class SuperGlobals
 * @package App\classes
 */
class SuperGlobals
{
    private $_SERVER;
    private $_POST;
    private $_GET;
    private $_SESSION;

    /**
     * superglobals constructor.
     */
    public function __construct()
    {
        $this->defineGlobals();
    }

    /**
     * Returns a key from the superglobal,
     * as it was at the time of instantiation.
     *
     * @param    null $key key
     * @return mixed
     */
    public function getServer($key = null)
    {


        if (null !== $key) {
            return ((isset($this->_SERVER["$key"])) ? $this->_SERVER["$key"] : null);
        } else {
            return $this->_SERVER;
        }
    }

    /**
     * Returns a key from the superglobal,
     * as it was at the time of instantiation.
     *
     * @param null $key
     * @return mixed
     * @internal param null $Key key
     */
    public function getPost($key = null)
    {
        if (null !== $key) {
            return ((isset($this->_POST["$key"])) ? $this->_POST["$key"] : null);
        } else {
            return $this->_POST;
        }
    }

    /**
     * Returns a key from the superglobal,
     * as it was at the time of instantiation.
     *
     * @param null $key
     * @return mixed
     * @internal param null $Key key
     * @internal param $ke
     */
    public function getGet($key = null)
    {
        if (null !== $key) {
            return ((isset($this->_GET["$key"])) ? $this->_GET["$key"] : null);
        } else {
            return $this->_GET;
        }
    }

    /**
     * Returns a key from the superglobal,
     * as it was at the time of instantiation.
     *
     * @param null $key
     * @return mixed
     * @internal param null $Key key
     */
    public function getSession($key = null)
    {
        if (null !== $key) {
            return (null);
        } else {
            return $this->_SESSION;
        }
    }

    /**
     * Function to define superglobals for use locally.
     * We do not automatically unset the superglobals after
     * defining them, since they might be used by other code.
     *
     * @return mixed
     */
    private final function defineGlobals()
    {

        // Store a local copy of the PHP superglobals
        // This should avoid dealing with the global scope directly
        // $this->_SERVER = $_SERVER;
        $this->_SERVER = (isset($_SERVER)) ? $_SERVER : null;
        $this->_POST = (isset($_POST)) ? $_POST : null;
        $this->_GET = (isset($_GET)) ? $_GET : null;
        $this->_SESSION = (isset($_SESSION)) ? $_SESSION : null;
        return null;
    }

    /**
     * You may call this function from your compositioning root,
     * if you are sure superglobals will not be needed by
     * dependencies or outside of your own code.
     *
     * @return void
     */
    public final function unsetGlobals()
    {
        unset($_SERVER);
        unset($_POST);
        unset($_GET);
        unset($_SESSION);
    }

}