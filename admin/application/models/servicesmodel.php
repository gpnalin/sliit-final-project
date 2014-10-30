<?php

class ServicesModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */

        /**
     * @var array Collection of error messages
     */
    public $errors = array();

    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();


    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all users from database
     */
    public function getAllServices()
    {
        $sql = "SELECT service_id, service_type, service_name FROM services";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }


    public function getServicesCount()
    {
        $sql = "SELECT COUNT(service_id) AS amount_of_services FROM services";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch()->amount_of_services;
    }

    /**
     * Add a song to database
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addService( $service_type, $service_name )
    {
        // clean the input from javascript code for example
        $service_type = strip_tags($service_type);
        $service_name = strip_tags($service_name);

        $sql = "INSERT INTO services ( service_type, service_name ) VALUES ( :service_type, :service_name )";
        $query = $this->db->prepare($sql);
        $query->execute( array( ':service_type' => $service_type, ':service_name' => $service_name ) );
     
        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'Service successfully added.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }

    /**
     * Delete a services in the database
     * add/update/delete stuff!
     * @param int $service_id Id of user
     */
    public function deleteService($service_id)
    {
        $sql = "DELETE FROM services WHERE service_id = :service_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':service_id' => $service_id));

        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'Service successfully deleted.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }


    /**
     * Delete a users in the database
     * add/update/delete stuff!
     * @param int $user_id Id of user
     */
    public function getService($service_id)
    {
        $sql = "SELECT service_id, service_type, service_name FROM services WHERE service_id = :service_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':service_id' => $service_id));

        return $query->fetch();
    }


    /**
     * Delete a users in the database
     * add/update/delete stuff!
     * @param int $user_id Id of user
     */
    public function updateService( $service_id, $service_type, $service_name )
    {

        $service_type  = strip_tags( $service_type );
        $service_name  = strip_tags( $service_name );

        $sql = "UPDATE services  SET service_type = :service_type, service_name = :service_name WHERE service_id = :service_id";
        $query = $this->db->prepare($sql);
        $query->execute( array(':service_type' => $service_type, ':service_name' => $service_name, ':service_id' => $service_id ) );

        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'Service successfully updated.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }

}
