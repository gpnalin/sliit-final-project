<?php

/**
 * Class Services
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Services extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/services/index
     */

    public function index()
    {
        
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $services_model    = $this->loadModel('ServicesModel');

        $services          = $services_model->getAllServices();
        $services_count    = $services_model->getServicesCount(); 

        // load views. within the views we can echo out $users and $amount_of_users easily
        require 'application/views/_templates/header.php';
        require 'application/views/services/index.php';
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
    public function addService()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_service"])) {
            // load model, perform an action on the model
            $services_model = $this->loadModel('ServicesModel');
            $add_service = $services_model->addService( $_POST["service_type"], $_POST["service_name"] );    
        }

        // load views. within the views we can echo out $users and $amount_of_users easily
        require 'application/views/_templates/header.php';
        require 'application/views/services/alerts.php';
        require 'application/views/_templates/footer.php';

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
    public function deleteService($service_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($service_id)) {

            $services_model = $this->loadModel('ServicesModel');
            $service_data = $services_model->getService($service_id);

            if (isset($_POST["confirm_delete_service"])) {

                // load model, perform an action on the model
                $services_model->deleteService($service_id);

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/services/alerts.php';
                require 'application/views/_templates/footer.php';

            }else{

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/services/confirm-delete.php';
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
    public function updateService($service_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($service_id)) {

            $services_model = $this->loadModel('ServicesModel');
            $service_data = $services_model->getService($service_id);
            //var_dump($user_data);            

            if (isset($_POST["confirm_edit_service"])) {
                // load model, perform an action on the model
                $services_model->updateService( $_POST["service_id"], $_POST["service_type"], $_POST["service_name"] );

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/services/alerts.php';
                require 'application/views/_templates/footer.php';
            }else{
                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/services/edit.php';
                require 'application/views/_templates/footer.php';
            }
            
        }
    }
}
