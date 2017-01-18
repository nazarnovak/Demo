<?php

namespace Core;

// Main application class
class App
{
    public $db = null;

    // Initializes the application, like error handling, session, db
    public function init()
    {
        // Error and Exception handling
        error_reporting(E_ALL);
        set_error_handler('\Core\Error::errorHandler');
        set_exception_handler('\Core\Error::exceptionHandler');

        // Session
        Session::init();
    }

    public function run()
    {
        // Dispatch route
        $router = new Router();
        $router->dispatch($_SERVER['QUERY_STRING']);

//        $this->db = \Core\Model::instance();
    }
}
