<?php

class UsersModel
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
    public function getAllUsers()
    {
        $sql = "SELECT user_id, user_name, user_password_hash, user_email FROM users";
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
    public function addUser($user_name, $user_pass, $user_email)
    {
        // clean the input from javascript code for example
        $user_name = strip_tags($user_name);
        $user_pass = password_hash( $user_pass, PASSWORD_DEFAULT );
        $user_email = strip_tags($user_email);

        $sql = "INSERT INTO users (user_name, user_password_hash, user_email) VALUES (:user_name, :user_pass, :user_email)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_name' => $user_name, ':user_pass' => $user_pass, ':user_email' => $user_email));
     
        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'User successfully created.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }

    /**
     * Delete a users in the database
     * add/update/delete stuff!
     * @param int $user_id Id of user
     */
    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM users WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'User successfully deleted.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }


    /**
     * Delete a users in the database
     * add/update/delete stuff!
     * @param int $user_id Id of user
     */
    public function getUser($user_id)
    {
        $sql = "SELECT user_id, user_name, user_password_hash, user_email FROM users WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':user_id' => $user_id));

        return $query->fetch();
    }


    /**
     * Delete a users in the database
     * add/update/delete stuff!
     * @param int $user_id Id of user
     */
    public function updateUser( $user_id, $user_pass, $user_email )
    {

        $user_pass  = password_hash( $user_pass, PASSWORD_DEFAULT );
        $user_email = strip_tags($user_email);

        $sql = "UPDATE users  SET user_password_hash = :user_password_hash, user_email = :user_email WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $query->execute( array(':user_password_hash' => $user_pass, ':user_email' => $user_email, ':user_id' => $user_id ) );

        if ( $query->rowCount() == 1 ) {
            $this->messages[] = 'User successfully updated.';
        }else {
            $this->errors = $query->errorInfo();
        }
    }

}
