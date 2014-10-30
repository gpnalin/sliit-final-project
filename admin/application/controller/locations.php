<?php

/**
 * Class Locations
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Locations extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/users/index
     */

    public function index()
    {
        
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $users_model    = $this->loadModel('UsersModel');

        $users          = $users_model->getAllUsers();
        $users_count    = $users_model->getUsersCount(); 

        // load views. within the views we can echo out $users and $amount_of_users easily
        require 'application/views/_templates/header.php';
        require 'application/views/locations/index.php';
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
    public function addUser()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_user"])) {
            // load model, perform an action on the model
            $users_model = $this->loadModel('UsersModel');
            $add_user = $users_model->addUser( $_POST["user_name"], $_POST["user_pass"], $_POST["user_email"] );    
        }

        // load views. within the views we can echo out $users and $amount_of_users easily
        require 'application/views/_templates/header.php';
        require 'application/views/locations/alerts.php';
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
    public function deleteUser($user_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($user_id)) {

            $users_model = $this->loadModel('UsersModel');
            $user_data = $users_model->getUser($user_id);

            if (isset($_POST["confirm_delete_user"])) {

                // load model, perform an action on the model
                $users_model->deleteUser($user_id);

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/locations/alerts.php';
                require 'application/views/_templates/footer.php';

            }else{

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/locations/confirm-delete.php';
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
    public function updateUser($user_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($user_id)) {

            $users_model = $this->loadModel('UsersModel');
            $user_data = $users_model->getUser($user_id);
            //var_dump($user_data);            

            if (isset($_POST["confirm_edit_user"])) {
                // load model, perform an action on the model
                $users_model->updateUser( $_POST["user_id"], $_POST["user_pass"], $_POST["user_email"] );

                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/locations/alerts.php';
                require 'application/views/_templates/footer.php';
            }else{
                // load views. within the views we can echo out $users and $amount_of_users easily
                require 'application/views/_templates/header.php';
                require 'application/views/locations/edit.php';
                require 'application/views/_templates/footer.php';
            }
            
        }
    }
}
