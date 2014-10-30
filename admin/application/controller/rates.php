<?php

/**
 * Class Rates
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Rates extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/users/index
     */

    public function index()
    {
        
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $rates_model    = $this->loadModel('RatesModel');

        $rates          = $rates_model->getAllRates();
        //$rates_count    = $rates_model->getUsersCount(); 

        // load views. within the views we can echo out $users and $amount_of_users easily
        require 'application/views/_templates/header.php';
        require 'application/views/rates/index.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * ACTION: addSong
     * This method handles what happens when you move to http://yourproject/users/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on users/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to users/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function add()
    {
        $rates_model = $this->loadModel('RatesModel');

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_rate"])) {
            // load model, perform an action on the model
            $add_rate = $rates_model->addRate(
                $_POST['from_country'],
                $_POST['to_country'],
                $_POST['service_type'],
                $_POST['initial_charge'],
                $_POST['limit_under'],
                $_POST['limit_over'],
                $_POST['unit_price'],
                $_POST['fuel_charge'],
                $_POST['handling_fee']
            ); 

            require 'application/views/_templates/header.php';
            require 'application/views/rates/alerts.php';
            require 'application/views/_templates/footer.php';
              
        }else{
            $countries = $rates_model->getCountryList();
        
        require 'application/views/_templates/header.php';
        require 'application/views/rates/add.php';
        require 'application/views/_templates/footer.php';
        }

        // load views. within the views we can echo out $users and $amount_of_users easily
        

        // where to go after song has been added
        //header('location: ' . ADMIN_URL . '/users/');
    }

    /**
     * ACTION: deleteSong
     * This method handles what happens when you move to http://yourproject/users/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on users/index
     * directs the user after the click. This method handles all the data from the GET request (in the ADMIN_URL!) and then
     * redirects the user back to users/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $user_id Id of the to-delete song
     */
    public function delete($rate_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($rate_id)) {

            $rates_model = $this->loadModel('RatesModel');
            $rate_data = $rates_model->getRate($rate_id);

            if (isset($_POST["confirm_delete_rate"])) {

                // load model, perform an action on the model
                $rates_model->deleteRate($rate_id);

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/rates/alerts.php';
                require 'application/views/_templates/footer.php';

            }else{

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/rates/confirm-delete.php';
                require 'application/views/_templates/footer.php';

            }
            
        }
    }

    /**
     * ACTION: editUser
     * This method handles what happens when you move to http://yourproject/users/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on users/index
     * directs the user after the click. This method handles all the data from the GET request (in the ADMIN_URL!) and then
     * redirects the user back to users/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $user_id Id of the to-delete song
     */
    public function edit($rate_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($rate_id)) {

            $rates_model = $this->loadModel('RatesModel');
            //var_dump($rate_data);            

            if (isset($_POST["confirm_edit_rate"])) {
                // load model, perform an action on the model
                
                $rates_model->updateRate( 
                    $_POST['rate_id'],
                    $_POST['from_country'],
                    $_POST['to_country'],
                    $_POST['service_type'],
                    $_POST['initial_charge'],
                    $_POST['limit_under'],
                    $_POST['limit_over'],
                    $_POST['unit_price'],
                    $_POST['fuel_charge'],
                    $_POST['handling_fee']
                );

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/rates/alerts.php';
                require 'application/views/_templates/footer.php';
            }else{
                // load views. within the views we can echo out $users and $amount_of_users easily

                $rate_data = $rates_model->getRate($rate_id);
                $countries = $rates_model->getCountryList();
                
                require 'application/views/_templates/header.php';
                require 'application/views/rates/edit.php';
                require 'application/views/_templates/footer.php';
            }
            
        }
    }
}
