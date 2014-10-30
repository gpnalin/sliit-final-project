<?php

class RatesModel
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
    public function getAllRates()
    {
        $sql = "SELECT rate_id, delivery.delivery_type_name AS s_name, geofrom.country_name AS c_from, geoto.country_name AS c_to, initial_charge 
                FROM rates 
                LEFT JOIN delivery_types AS delivery ON rates.service_type = delivery.delivery_type 
                LEFT JOIN geo_country AS geofrom ON rates.country_from = geofrom.country_code 
                LEFT JOIN geo_country AS geoto ON rates.country_to = geoto.country_code
                " ;
                
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }


    public function getUsersCount()
    {
        $sql = "SELECT COUNT(user_id) AS amount_of_users FROM users";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetch()->amount_of_users;
    }

    /**
     * Add a song to database
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addRate( $from_country, $to_country, $service_type, $initial_charge, $limit_under, $limit_over, $unit_price, $fuel_charge, $handling_fee )
    {
        // clean the input from javascript code for example
        $from_country   = strip_tags( $from_country );
        $to_country     = strip_tags( $to_country );
        $service_type   = strip_tags( $service_type );
        $initial_charge = strip_tags( $initial_charge );
        $limit_under    = strip_tags( $limit_under );
        $limit_over     = strip_tags( $limit_over );
        $unit_price     = strip_tags( $unit_price );
        $fuel_charge    = strip_tags( $fuel_charge );
        $handling_fee   = strip_tags( $handling_fee );


        $sql = "INSERT INTO rates ( country_from_to, country_from, country_to, service_type, initial_charge, limit_under, limit_over, unit_price, fuel_charge, handling_fee ) VALUES ( :country_from_to, :country_from, :country_to, :service_type, :initial_charge, :limit_under, :limit_over, :unit_price, :fuel_charge, :handling_fee )";
        $query = $this->db->prepare($sql);
        $insert_values = array(
            ':country_from_to'  => $from_country . $to_country ,
            ':country_from'     => $from_country, 
            ':country_to'       => $to_country, 
            ':service_type'     => $service_type, 
            ':initial_charge'   => $initial_charge, 
            ':limit_under'      => $limit_under, 
            ':limit_over'       => $limit_over, 
            ':unit_price'       => $unit_price, 
            ':fuel_charge'      => $fuel_charge, 
            ':handling_fee'     => $handling_fee
        );
        $query->execute($insert_values);
     
        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'Rates successfully added.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }

    public function getCountryList()
    {
        $sql = "SELECT country_code, country_name FROM geo_country";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Delete a users in the database
     * add/update/delete stuff!
     * @param int $user_id Id of user
     */
    public function deleteRate($rate_id)
    {
        $sql = "DELETE FROM rates WHERE rate_id = :rate_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':rate_id' => $rate_id));

        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'Rate successfully deleted.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }


    /**
     * Delete a users in the database
     * add/update/delete stuff!
     * @param int $user_id Id of user
     */
    public function getRate($rate_id)
    {
        $sql = "SELECT rate_id, country_from_to, country_from, country_to, service_type, initial_charge, limit_under, limit_over, unit_price, fuel_charge, handling_fee FROM rates WHERE rate_id = :rate_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':rate_id' => $rate_id));

        return $query->fetch();
    }


    /**
     * Delete a users in the database
     * add/update/delete stuff!
     * @param int $user_id Id of user
     */
    public function updateRate( $rate_id, $from_country, $to_country, $service_type, $initial_charge, $limit_under, $limit_over, $unit_price, $fuel_charge, $handling_fee )
    {
        $rate_id        = strip_tags( $rate_id );        
        $from_country   = strip_tags( $from_country );
        $to_country     = strip_tags( $to_country );
        $service_type   = strip_tags( $service_type );
        $initial_charge = strip_tags( $initial_charge );
        $limit_under    = strip_tags( $limit_under );
        $limit_over     = strip_tags( $limit_over );
        $unit_price     = strip_tags( $unit_price );
        $fuel_charge    = strip_tags( $fuel_charge );
        $handling_fee   = strip_tags( $handling_fee );

        $sql = "UPDATE rates  SET country_from_to = :country_from_to, country_from = :country_from, country_to = :country_to, service_type = :service_type, initial_charge = :initial_charge, limit_under = :limit_under, limit_over = :limit_over, unit_price = :unit_price, fuel_charge = :fuel_charge, handling_fee = :handling_fee WHERE rate_id = :rate_id";
        $query = $this->db->prepare($sql);
        $insert_values = array(
            ':rate_id'          => $rate_id,
            ':country_from_to'  => $from_country.$to_country,
            ':country_from'     => $from_country, 
            ':country_to'       => $to_country, 
            ':service_type'     => $service_type, 
            ':initial_charge'   => $initial_charge, 
            ':limit_under'      => $limit_under, 
            ':limit_over'       => $limit_over, 
            ':unit_price'       => $unit_price, 
            ':fuel_charge'      => $fuel_charge, 
            ':handling_fee'     => $handling_fee
        );
        $query->execute( $insert_values );

        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'Rates successfully updated.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }

}
