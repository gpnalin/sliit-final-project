<form name="quotation_form" class="quotation_form" action="<?php echo URL; ?>processQuotation" method="POST" data-abide>
  <fieldset>
  <legend>Online Quotation</legend>
    <div class="row">
      <div class="large-12 columns">

        <label>Service Type<sup>*</sup></label> 

        <div class="row">
          <div class="small-4 columns">
            <label for="service_type">Door to Door</label>
          </div>
          <div class="small-8 columns">
            <input type="radio" name="service_type" value="d2d" id="service_type_d2d" required>
          </div>
        </div>

        <div class="row">
          <div class="small-4 columns">
            <label for="service_type">﻿Air Freight</label>
          </div>
          <div class="small-8 columns">
            <input type="radio" name="service_type" value="air" id="service_type_air" required>
          </div>
        </div>

        <div class="row">
          <div class="small-4 columns">
            <label for="service_type">﻿Sea Freight</label>
          </div>
          <div class="small-8 columns">
            <input type="radio" name="service_type" value="sea" id="service_type_sea" required>
            <small class="error">Choose a service type.</small>
          </div>
        </div>

      </div>  
    </div>

    <div class="row">
      <div class="large-6 columns">
        <label>Pick Up Country:<sup>*</sup>          
          <select name="from_country" id="from-country" class="countries"  onchange="changeCities('from-city',this.value);" required>
            <option value="">Select Country</option>
            <?php
            foreach($countries as $country){  
              echo '<option value="'. $country->country_code .'">'. $country->country_name .'</option>';
            } 
            ?>
          </select> 
        </label>
        <small class="error">Select country to pick up.</small>
      </div>
      <div class="large-6 columns">
        <label>Pick Up Location:<sup>*</sup>
          <select name="from_city" class="from-city" required><option value="">Select City</option></select> 
        </label>
        <small class="error">Select state to pick up.</small>
      </div>
    </div>

    <div class="row">
      <div class="large-6 columns">
        <label>Delivery Country:<sup>*</sup>          
          <select name="to_country" class="countries"  onchange="changeCities('to-city',this.value);" required>
            <option value="">Select Country</option>
            <?php
            foreach($countries as $country){  
              echo '<option value="'. $country->country_code .'">'. $country->country_name .'</option>';
            } 
            ?>
          </select>
        </label>
        <small class="error">Select country to deliver.</small>
      </div>
      <div class="large-6 columns">
        <label>Delivery Location:<sup>*</sup>
          <select name="to_city" class="to-city" required><option value="">Select City</option></select> 
        </label>
        <small class="error">Select city to deliver.</small>
      </div>
    </div>

    <div class="row">            
      <div class="large-12 columns">
        <div class="row collapse">
          <div class="small-4 columns">
            <label for="package_weight" class="inline">Package Weight<sup>*</sup></label>
          </div>
          <div class="small-8 columns">
            <div class="row">
              <div class="small-10 columns">
                <input name="package_weight" type="number" value="0.25" min="0.25" step="0.25" pattern="number" required/>
                <small class="error">Required and must be a number.</small>
              </div>
              <div class="small-2 columns">
                <span class="postfix">Kg</span>
              </div>
            </div>
            
          </div>                
        </div>
      </div>
    </div>

    <div class="row">            
      <div class="large-12 columns">
        <div class="row collapse">
          <div class="small-4 columns">
            <label for="right-label" class="inline">Package Type<sup>*</sup></label>
          </div>
          <div class="small-8 columns">
            <select id="package-type" name="package_type" required>
              <option value="">Please select package type...</option>
              <option value="box">Box</option>
              <option value="parcel">Parcel</option>
              <option value="documents">Documents</option>
            </select>
            <small class="error">Select package type.</small>
          </div>                
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="large-4 columns">
        <div class="row collapse">
          <label>Width</label>
          <div class="small-9 columns">
            <input name="pkg_atrib_width" value="0" min="0" type="number" />
          </div>
          <div class="small-3 columns">
            <span class="postfix">cm</span>
          </div>
        </div>
      </div>
      <div class="large-4 columns">
        <div class="row collapse">
          <label>Length</label>
          <div class="small-9 columns">
            <input name="pkg_atrib_lenght" value="0" min="0" type="number" />
          </div>
          <div class="small-3 columns">
            <span class="postfix">cm</span>
          </div>
        </div>
      </div>
      <div class="large-4 columns">
        <div class="row collapse">
          <label>Height</label>
          <div class="small-9 columns">
            <input name="pkg_atrib_height" value="0" min="0" type="number" />
          </div>
          <div class="small-3 columns">
            <span class="postfix">cm</span>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row"> 
      <div class="small-2 columns"> 
        <label for="right-label" class="inline">Quantity<sup>*</sup></label> 
      </div> 
      <div class="small-10 columns"> 
        <input name="quantity" type="number" value="1" id="right-label" pattern="number" required> 
        <small class="error">Required and must be a number.</small>
      </div> 
    </div>
    <input type="reset" class="button small left" value="Reset" />
    <input type="submit" class="button small right btn-process" value="Process" />
  </fieldset>
</form>


<script type="text/javascript">

function changeCities(city_select_id, country_code){

  //alert(city_select_id +"  "+country_code);

  $( '.'+city_select_id ).each(function() {

    $.ajax({

      type: 'POST',
      url: '<?php echo URL; ?>processquotation/ajaxselect',      
      data: 'country_code='+ country_code,
      cache: false,
      success: function(html){
        $( '.'+city_select_id ).html(html);
      }

    });

  });

}

</script>