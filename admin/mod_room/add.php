<form class="form-horizontal well span6" action="controller.php?action=add" enctype="multipart/form-data" method="POST">

  <fieldset>
    <legend>New Accomodation</legend>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="ROOMNUM">Type:</label>

        <div class="col-md-8">
          <select class="form-control input-sm" id="Type" name="Type" required>
            <option value="">Select</option>
            <option>Room</option>
            <option>Cottage</option>
            <option>Amenity</option>
          </select>
        </div>
      </div>
    </div>

    <div id="view_rname" class="form-group">
      <div class="col-md-8">
        <label id="lblRname" class="col-md-4 control-label" for="ROOM">Name:</label>

        <div class="col-md-8">
          <input class="form-control input-sm" id="ROOM" name="ROOM" placeholder="Name" type="text" value="" rows="20" required>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="ROOMDESC">Description:</label>

        <div class="col-md-8">
          <textarea class="form-control input-sm" id="compose-textarea4" name="ROOMDESC" placeholder="Description"></textarea>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="name">Type:</label>

        <div class="col-md-8" style="padding-top: 7px">
          <select name="type" required>
            <option value="None">N/A</option>
            <option value="Public">Public</option>
            <option value="Exclusive">Exclusive</option>
          </select>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="NUMPERSON">Number of Person (PAX):</label>

        <div class="col-md-8">
          <input min="1" class="form-control input-sm" id="NUMPERSON" name="NUMPERSON" placeholder="Maximum Pax" type="text" value="" onkeyup="javascript:checkNumber(this);" required>
        </div>
      </div>
    </div>
    <div id="showprice"> </div>


    <input class="form-control input-sm" id="ROOMNUM" name="ROOMNUM" placeholder="Quantity" type="hidden" value="1">
    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="image">Upload Primary Image:</label>

        <div class="col-md-8">
          <input type="file" name="image" value="" id="image" required>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="idno"></label>

        <div class="col-md-8">
          <button class="btn btn-primary" name="save" type="submit">Save</button>
        </div>
      </div>
    </div>


  </fieldset>

</form>