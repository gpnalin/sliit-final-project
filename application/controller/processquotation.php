<?php

/**
 * Class processQuotation
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class ProcessQuotation extends Controller
{
    // define variables and set to empty values
    var $service_type, $from_country, $from_state, $to_country, $to_state, $package_weight, $package_type, $pkg_atrib_width, $pkg_atrib_lenght, $pkg_atrib_height, $quantity = "";

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: processQuotation, using the method index().';


        $ajax_model = $this->loadModel('AjaxModel');
        $countries = $ajax_model->getCountryList();

        self::validateForm();        

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        //require 'application/views/songs/index.php';
        require 'application/views/_templates/footer.php';
    }



    function validate_input($data) {

        if ( !isset($data) || trim($data)==='' ) {
            $data = false;
        }else{
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            
        }
        
        return $data;
    }

    public function validateForm(){      
       

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          $service_type     = self::validate_input( $_POST["service_type"] );

          $from_country     = self::validate_input( $_POST["from_country"] );
          $from_city        = self::validate_input( $_POST["from_city"] );

          $to_country       = self::validate_input( $_POST["to_country"] );
          $to_city          = self::validate_input( $_POST["to_city"] );

          $package_weight   = self::validate_input( $_POST["package_weight"] );
          $package_type     = self::validate_input( $_POST["package_type"] );

          $pkg_atrib_width  = self::validate_input( $_POST["pkg_atrib_width"] );
          $pkg_atrib_lenght = self::validate_input( $_POST["pkg_atrib_lenght"] );
          $pkg_atrib_height = self::validate_input( $_POST["pkg_atrib_height"] );

          $quantity         = self::validate_input( $_POST["quantity"] );

        }

        echo "<br>" . $service_type;

        echo "<br>" . $from_country;
        echo "<br>" . $from_city;

        echo "<br>" . $to_country;
        echo "<br>" . $to_city;

        echo "<br>" . $package_weight;
        echo "<br>" . $package_type;

        echo "<br>" . $pkg_atrib_width;
        echo "<br>" . $pkg_atrib_lenght;
        echo "<br>" . $pkg_atrib_height;
       
        echo "<br>" . $quantity;

    }

public function loadCountryList() {

  $ajax_model = $this->loadModel('AjaxModel');

  $countries = $ajax_model->getCountryList();
  
}

public function ajaxSelect() {
  $data="";  

  if(isset($_POST['country_code']))
  {
    $country_code=$_POST['country_code'];    

    $ajax_model = $this->loadModel('AjaxModel');

    $cities_by_country = $ajax_model->getCitiesByCountry($country_code);

    foreach ($cities_by_country as $city) {
      echo '<option value="'. $city->ID .'">'. $city->city_name .'</option>';
    }
  }
    
  //echo 'Nalin Perera';
}

}