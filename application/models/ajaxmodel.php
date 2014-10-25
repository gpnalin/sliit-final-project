<?php

class AjaxModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getCountryList()
    {
        $sql = "SELECT country_code, country_name FROM geo_country";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getCitiesByCountry( $country_code )
    {
        $sql = "SELECT ID, city_name FROM geo_city WHERE country_iso_code = :country_code";
        $query = $this->db->prepare($sql);
        $query->execute(array(':country_code' => $country_code ));

        // fetchAll() is the PDO method that gets all result rows
        return $query->fetchAll();
    }
}
