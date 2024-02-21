 <div class="panel panel-success">
 	<div class="panel-heading">Modify Account</div>
 	<div class="panel-body">
 		<form class="form-horizontal" id ="form-submit" action="update.php" method="post"  name="personal" > 

					  <div class="form-group" >
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "name">FIRST NAME:</label>

			              <div class="col-md-8">
			              
			                <input name="name" type="text" class="form-control " id="name" required value="<?php echo $res->G_FNAME; ?>" />
			              </div>
			            </div>
			          </div> 
 

			            <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "last">LAST NAME:</label>

			              <div class="col-md-8">
			                <input name="last" type="text" class="form-control " id="last" required value="<?php echo $res->G_LNAME; ?>" />
			              </div>
			            </div>
			          </div>

			      

			           <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "address">ADDRESS:</label>

			              <div class="col-md-8">
			                <input name="address" type="text" class="form-control " id="address" required value="<?php echo $res->G_ADDRESS; ?>" />
			              </div>
			            </div>
			          </div> 

			         

			            <div class="form-group  ">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "dbirth">DATE OF BIRTH:</label>

			              <div class="col-md-8 ">  
			              	 <div class="input-group ">
			                 <input type="text"   name="dbirth" id=""  value="<?php echo formatDate($res->DBIRTH,'m/d/Y'); ?>"  readonly="true" class="dbirth form-control  " required>
			                    <span class="glyphicon glyphicon-calendar form-control-feedback" ></span>
			              	 </div>
			               
			              </div>
			            </div>
			          </div>

			         

			           <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "phone">PHONE:</label>

			              <div class="col-md-8">
			                <input name="phone" type="text" class="form-control " id="phone" required value="<?php echo $res->G_PHONE; ?>" />
			              </div>
			            </div>
			           </div>

			         
			    			        			         
			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "emailadd">E-MAIL:</label>

			              <div class="col-md-8">
			                <input name="emailadd" type="email" class="form-control " id="emailadd" value="<?php echo $res->EMAILADDRESS; ?>" />
			              </div>
			            </div>
			          </div>

			            <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "username">USERNAME:</label>

			              <div class="col-md-8">
			                <input name="username" type="text" class="form-control " id="username" required value="<?php echo $res->G_UNAME; ?>" />
			              </div>
			            </div>
			       		 </div>



			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "zip">ZIP CODE:</label>

			              <div class="col-md-8">
			                <input name="zip" type="text" class="form-control " id="zip" required value="<?php echo $res->ZIP; ?>" />
			              </div>
			            </div>
			          </div>

			         

			       
			         

			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "zip"> </label>

			              <div class="col-md-8">
			                	    	<input name="submit" type="submit" value="Save"  class="btn btn-" onclick="return personalInfo();"/>
			              </div>
			            </div>
			          </div>


  
  
			 

			</form>   
 	</div>
 </div>
         		