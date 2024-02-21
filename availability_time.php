<!--  <div class="submit-form weather-content " style="padding:15px;margin-bottom: 5px;">
            <h4 style="color:#fff">Book Now</h4>
            <form id="form-submit" action="index.php?p=rooms" method="POST" autocomplete="off">
                <div class="row">
                    
                    <div class="col-md-12">
                        <fieldset>
                            <label for="arrival">Date From:</label>
                            <input name="arrival" type="text" class="form-control date" id="arrival" placeholder="Select date..." required onchange='this.form.()'>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset>
                            <label for="departure">Date To:</label>
                            <input name="departure" type="text" class="form-control tdate" id="departure" placeholder="Select date..." required onchange='this.form.()'>
                        </fieldset>
                    </div>
                    <div class="col-md-12"> 
                        <fieldset>
                                <label for="person"  >Person:</label>
                                <select required name='person' onchange='this.form.()'>
                                <option value="">Select</option> 
                                <?php $sql ="SELECT `NUMPERSON`  as 'NumberPerson' FROM `tblroom` Group By NUMPERSON";
                                     $mydb->setQuery($sql);
                                   $cur = $mydb->loadResultList(); 
                                      foreach ($cur as $result) { 
                                        echo '<option value='.$result->NumberPerson.'>'.$result->NumberPerson.'</option>';
                                      }

                                  ?>
                                      
                            </select>
                           </fieldset> 
                    </div>
                    <div class="col-md-12" style="margin-bottom:10px">
                        <fieldset> 
                            <button type="submit" id="form-submit" name="booknowA" class="btn">Check Availability</button>
                        </fieldset>
                    </div>
                </div>
            </form>
                            </div> -->


<form class="submit-form " action="index.php?p=rooms" method="POST">
<label for="start_time">Start Time:</label>
<input type="text" id="start_time" class="form-control" name="start_time" autocomplete="off"  readonly value="<?php echo isset($_POST['start_time']) ? $_POST['start_time'] : '' ?>" />

<label for="start_time">End Time:</label>
<input type="text" id="end_time" class="form-control" name="end_time" autocomplete="off" readonly value="<?php echo isset($_POST['end_time']) ? $_POST['end_time'] : '' ?>"  />

 <button type="submit" id="form-submit" name="btnchecktime" class="btn">Check Availability</button>
</form>