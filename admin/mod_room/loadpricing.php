<?php 
$view = (isset($_POST['view']) && $_POST['view'] != '') ? $_POST['view'] : ''; 
switch ($view) {
	case 'Room' :
	showRoomPrice();
	break; 
	case 'Function Hall' :
	showFunctionPrice();
	break;

	case 'Private Pool' :
	showPrivatePoolPrice();
	break;
	
  case 'Amenity':
	case 'Cottage' :
	showPublicPoolPrice();
	break;  
  
  case 'Kids and Pool Pavillon' :
  showKidsPoolPavillionPrice();
  break; 

	}
?>
<?php

function showRoomPrice()
{
?>  
<div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "Price3hrs">Price for 3 hours:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="Price3hrs" name="Price3hrs" placeholder=
					  "Price" type="text" value="" min="1" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div>
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "Price6hrs">Price for 6 hours:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="Price6hrs" name="Price6hrs" placeholder=
            "Price" type="text" value="" min="1" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div>
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "Price12hrs">Price for 12 hours:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="Price12hrs" name="Price12hrs" placeholder=
            "Price" type="text" value="" min="1" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div>
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "PRICE">Price for 24 hours:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="PRICE" name="PRICE" placeholder=
            "Price" type="text" value="" min="1" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  
<?php
}
?>

<?php

function showFunctionPrice()
{
?> 
 <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "PRICE">Day Tour Price:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="PRICE" name="PRICE" placeholder=
            "Price" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div>
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "NigthPrice">Night Tour Price:</label> 
      <div class="col-md-8"> 
        <input class="form-control input-sm" id="NigthPrice" name="NigthPrice" placeholder=
            "Price" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div> 
<?php
}
?>

<?php

function showPrivatePoolPrice()
{
?> 
  <hr>
  <label>WeekDays (Monday to Thursday)</label>
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "PRICE">Day Tour Price:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="PRICE" name="PRICE" placeholder=
            "Price" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div>
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "NigthPrice">Night Tour Price:</label> 
      <div class="col-md-8"> 
        <input class="form-control input-sm" id="WDaysNigthPrice" name="WDaysNigthPrice" placeholder=
            "Price" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div> 
  <hr>
  <label>WeekEnds (Friday to Sunday)</label>
     <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "WEndsDayPrice">Day Tour Price:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="WEndsDayPrice" name="WEndsDayPrice" placeholder=
            "Price" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div>
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "WEndsNigthPrice">Night Tour Price:</label> 
      <div class="col-md-8"> 
        <input class="form-control input-sm" id="WEndsNigthPrice" name="WEndsNigthPrice" placeholder=
            "Price" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div>  
<?php
}
?>
<?php

function showPublicPoolPrice()
{
?> 
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "PRICE">Price:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="PRICE" name="PRICE" placeholder=
            "Price" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div> 
<?php
}
?>
<?php

function showKidsPoolPavillionPrice()
{
?> 
   <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=
      "PRICE">Price:</label>

      <div class="col-md-8"> 
        <input class="form-control input-sm" id="PRICE" name="PRICE" placeholder=
            "Price" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
      </div>
    </div>
  </div> 
<?php
}
?> 