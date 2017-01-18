<?php

namespace App\Controllers;

use \Core\View;

// Join controller
class Join extends \Core\Controller
{
    public $username = '';
    public $pass = '';
    public $pass2 = '';
    public $email = '';
//    ??
//    public $pic = '';

    public $locale = 'en';

    /**
     * Get available locale languages
     * 
     * @return array
     */
    private function getAvailableLocales()
    {
        return [
            'en',
            'ru',
            'uk',
        ];
    }

    /**
     * Set locale for the registration page
     * 
     * @return void
     */
    private function setLocale()
    {
        $lang = isset($this->routeParams['lang']) ? 
                $this->routeParams['lang'] : '';

        if (!$lang) {
            return;
        }

        if (!in_array($lang, $this->getAvailableLocales())) {
            return;
        }
        
        $this->locale = $lang;
    }

    /**
     * When user submits a form
     * 
     * @return void
     */
    public function handleSubmittedForm()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if (!isset($_POST['join'])) {
            return;
        }

        // Actual form validation
//        $this->
    }
    
    /**
     * Show the register page
     *
     * @return void
     */
    public function indexAction()
    {
        $this->handleSubmittedForm();
//        get locale from session
//        $this->setLocale();

        View::renderTemplate('Join/index.html');
    }
}
