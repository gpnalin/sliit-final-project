<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {

        $ajax_model = $this->loadModel('AjaxModel');
        $countries = $ajax_model->getCountryList();
        
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller home, using the method index()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/_templates/footer.php';

        

    }

    /**
     * PAGE: about
     * This method handles what happens when you move to http://yourproject/home/about
     * The camelCase writing is just for better readability. The method name is case insensitive.
     */
    public function about()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller home, using the method about()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/about.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: services
     * This method handles what happens when you move to http://yourproject/home/services
     * The camelCase writing is just for better readability. The method name is case insensitive.
     */
    public function services()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller home, using the method services()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/services.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * PAGE: contact
     * This method handles what happens when you move to http://yourproject/home/contact
     * The camelCase writing is just for better readability. The method name is case insensitive.
     */
    public function contact()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller home, using the method contact()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/home/contact.php';
        require 'application/views/_templates/footer.php';
    }
}
