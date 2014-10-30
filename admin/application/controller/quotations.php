<?php

/**
 * Class Quotations
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Quotations extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/quotations/index
     */

    public function index()
    {
        
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $quotations_model    = $this->loadModel('QuotationsModel');

        $quotations          = $quotations_model->getAllQuotations();
        $quotations_count    = $quotations_model->getQuotationsCount(); 

        // load views. within the views we can echo out $quotations and $amount_of_quotations easily
        require 'application/views/_templates/header.php';
        require 'application/views/quotations/index.php';
        require 'application/views/_templates/footer.php';
    }

    /**
     * ACTION: addSong
     * This method handles what happens when you move to http://yourproject/quotations/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on quotations/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to quotations/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addQuotation()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_quotation"])) {
            // load model, perform an action on the model
            $quotations_model = $this->loadModel('QuotationsModel');
            $add_quotation = $quotations_model->addQuotation( $_POST["quotation_name"], $_POST["quotation_pass"], $_POST["quotation_email"] );    
        }

        // load views. within the views we can echo out $quotations and $amount_of_quotations easily
        require 'application/views/_templates/header.php';
        require 'application/views/quotations/alerts.php';
        require 'application/views/_templates/footer.php';

        // where to go after song has been added
        //header('location: ' . ADMIN_URL . '/quotations/');
    }

    /**
     * ACTION: deleteSong
     * This method handles what happens when you move to http://yourproject/quotations/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on quotations/index
     * directs the user after the click. This method handles all the data from the GET request (in the ADMIN_URL!) and then
     * redirects the user back to quotations/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $quotation_id Id of the to-delete song
     */
    public function deleteQuotation($quotation_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($quotation_id)) {

            $quotations_model = $this->loadModel('QuotationsModel');
            $quotation_data = $quotations_model->getQuotation($quotation_id);

            if (isset($_POST["confirm_delete_quotation"])) {

                // load model, perform an action on the model
                $quotations_model->deleteQuotation($quotation_id);

                // load views. within the views we can echo out $quotations and $amount_of_quotations easily
                require 'application/views/_templates/header.php';
                require 'application/views/quotations/alerts.php';
                require 'application/views/_templates/footer.php';

            }else{

                // load views. within the views we can echo out $quotations and $amount_of_quotations easily
                require 'application/views/_templates/header.php';
                require 'application/views/quotations/confirm-delete.php';
                require 'application/views/_templates/footer.php';

            }
            
        }
    }

    /**
     * ACTION: editQuotation
     * This method handles what happens when you move to http://yourproject/quotations/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on quotations/index
     * directs the user after the click. This method handles all the data from the GET request (in the ADMIN_URL!) and then
     * redirects the user back to quotations/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $quotation_id Id of the to-delete song
     */
    public function updateQuotation($quotation_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($quotation_id)) {

            $quotations_model = $this->loadModel('QuotationsModel');
            $quotation_data = $quotations_model->getQuotation($quotation_id);
            //var_dump($quotation_data);            

            if (isset($_POST["confirm_edit_quotation"])) {
                // load model, perform an action on the model
                $quotations_model->updateQuotation( $_POST["quotation_id"], $_POST["quotation_pass"], $_POST["quotation_email"] );

                // load views. within the views we can echo out $quotations and $amount_of_quotations easily
                require 'application/views/_templates/header.php';
                require 'application/views/quotations/alerts.php';
                require 'application/views/_templates/footer.php';
            }else{
                // load views. within the views we can echo out $quotations and $amount_of_quotations easily
                require 'application/views/_templates/header.php';
                require 'application/views/quotations/edit.php';
                require 'application/views/_templates/footer.php';
            }
            
        }
    }
}
