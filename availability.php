<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel " style="margin-top: -70px;border: 2px solid #ddd;">
                <div class="panel-body">
                    <div class="submit-form  " style="padding:15px;margin-bottom: 2px;margin-top: -30px;">
                        <form id="form-submit" action="index.php?p=availability" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-md-2">
                                    <fieldset>
                                        <label for="arrival">Check-in date:</label>
                                        <input name="arrival" type="text" class="form-control date" id="arrival" placeholder="Select date..." required onchange='this.form.()' value="<?php echo isset($_SESSION['arrival']) ? date_format(date_create($_SESSION['arrival']), "m/d/Y")   : ''; ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-1" style="margin:0;padding: 0;">
                                    <fieldset>
                                        <label for="start_time">Time:</label>
                                        <input type="text" id="start_time" class="form-control" name="start_time" autocomplete="off" value="<?php echo isset($_SESSION['start_time']) ? date_format(date_create($_SESSION['start_time']), "h:i a") : '' ?>" />
                                    </fieldset>
                                </div>
                                <div class="col-md-2">
                                    <fieldset>
                                        <label for="departure">Check-out date:</label>
                                        <input name="departure" type="text" class="form-control date" id="departure" placeholder="Select date..." required onchange='this.form.()' value="<?php echo isset($_SESSION['departure']) ? date_format(date_create($_SESSION['departure']), "m/d/Y") : ''; ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-1" style="margin:0;padding: 0;">
                                    <fieldset>
                                        <label for="end_time">Time:</label>
                                        <input type="text" id="end_time" class="form-control" name="end_time" autocomplete="off" value="<?php echo isset($_SESSION['end_time']) ? date_format(date_create($_SESSION['end_time']), "h:i a") : '' ?>" />

                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <fieldset>
                                        <label for="person">Person (PAX):</label>
                                        <input type="number" id="person" required name='person' onchange='this.form.()' class="form-control" value="<?php echo isset($_SESSION['person']) ?  $_SESSION['person'] : '1' ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    <fieldset>
                                        <label for="booknowA">&nbsp;</label>
                                        <button type="submit" id="booknowA" name="booknowA" class="btn">SEARCH</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>