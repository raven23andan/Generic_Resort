<?php
if (isset($_POST['submit'])){


 $_SESSION['name']   		= $_POST['name'];
 $_SESSION['middle']   		= $_POST['middle'];
 $_SESSION['last']   		= $_POST['last'];
 $_SESSION['dbirth']   		= $_POST['dbirth'];
 $_SESSION['address'] 		= $_POST['address'];
 $_SESSION['emailadd']  	= $_POST['emailadd'];
 $_SESSION['zip']   		= $_POST['zip'];
 $_SESSION['phone']   		= $_POST['phone'];
 $_SESSION['username']		= $_POST['username'];
 $_SESSION['pass']  		= $_POST['pass'];
 $_SESSION['pending']  		= 'pending';




  
redirect('index.php?p=resorts&id='.$_SESSION['resortID'].'&view=payment');
}
?>

 
                 <?php //include'navigator.php';?>
 
					<?php
					if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
							echo '<ul class="err">';
							foreach($_SESSION['ERRMSG_ARR'] as $msg) {
								echo '<li>',$msg,'</li>'; 
							}
							echo '</ul>';
							unset($_SESSION['ERRMSG_ARR']);
						}
					?>

					<h2 class="te">Personal Information</h2>
   
         		<form class="form-horizontal" id ="form-submit" action="index.php?view=logininfo" method="post"  name="personal" onsubmit="return validatePassword(); "> 

					  <div class="form-group" >
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "name">FIRST NAME:</label>

			              <div class="col-md-8">
			              	<input name="" type="hidden" value="">
			                <input value="<?php echo isset($_SESSION['name'])?  $_SESSION['name'] : '';?>" name="name" type="text" class="form-control " id="name" required  onkeydown="return /[a-z, ]/i.test(event.key)" />
			              </div>
			            </div>
			          </div> 

					  <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "middle">MIDDLE NAME:</label>

			              <div class="col-md-8">
			                <input value="<?php echo isset($_SESSION['middle'])?  $_SESSION['middle'] : '';?>"  name="middle" type="text" class="form-control " id="middle" required onkeydown="return /[a-z, ]/i.test(event.key)" />
			              </div>
			            </div>
			          </div>

			            <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "last">LAST NAME:</label>

			              <div class="col-md-8">
			                <input value="<?php echo isset($_SESSION['last'])?  $_SESSION['last'] : '';?>"  name="last" type="text" class="form-control " id="last" required onkeydown="return /[a-z, ]/i.test(event.key)" />
			              </div>
			            </div>
			          </div>

			      
			  
			         

			           <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "address">ADDRESS:</label>

			              <div class="col-md-8">
			                <input name="address" type="text" class="form-control " id="address" required value="<?php echo isset($_SESSION['address'])?  $_SESSION['address'] : '';?>"  />
			              </div>
			            </div>
			          </div> 

			         

			            <div class="form-group  " hidden>
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "dbirth">DATE OF BIRTH:</label>

			              <div class="col-md-8 ">  
			              	 <div class="input-group ">
			                 <input type="text"   name="dbirth" id="dbirth"    readonly  class="dbirth form-control  " value="<?php echo isset($_SESSION['dbirth'])?  $_SESSION['dbirth'] : '';?>" >
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
			                <input  value="<?php echo isset($_SESSION['phone'])?  $_SESSION['phone'] : '';?>"  name="phone" type="text" maxlength="11" class="form-control " id="phone" onkeypress=" return isNumber(event)" required/>
			              </div>
			            </div>
			           </div>

			        
			    
			         
			         
			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "emailadd">E-MAIL:</label>

			              <div class="col-md-8">
			                <input value="<?php echo isset($_SESSION['emailadd'])?  $_SESSION['emailadd'] : '';?>"  name="emailadd" type="email" class="form-control " id="emailadd" required />
			              </div>
			            </div>
			          </div>

			            <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "username">USERNAME:</label>

			              <div class="col-md-8">
			                <input value="<?php echo isset($_SESSION['username'])?  $_SESSION['username'] : '';?>"  name="username" type="text" class="form-control " id="username"  oninput="this.setCustomValidity('')" required />
			              </div>
			            </div>
			       		 </div>

			         
			      
			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "password">PASSWORD:</label>

			              <div class="col-md-8">
			                <input value="<?php echo isset($_SESSION['pass'])?  $_SESSION['pass'] : '';?>"  name="pass" type="password" class="form-control " id="password"  oninput="this.setCustomValidity('')" required/>
			              </div>
			            </div>
			          </div>

			         

			          <div class="form-group" hidden>
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "zip">ZIP CODE:</label>

			              <div class="col-md-8">
			                <input value="<?php echo isset($_SESSION['zip'])?  $_SESSION['zip'] : '';?>"  name="zip" type="text" class="form-control " id="zip"  onkeypress=" return isNumber(event)"  maxlength="4" />
			              </div>
			            </div>
			          </div>

			         

			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "zip">Terms:</label>

			              <div class="col-md-8">
			               <input type="checkbox" name="condition" value="checkbox" required value="" /> I 
					 							<small>Agree the <a href="#" class="toggle-modal"  onclick="OpenPopupCenter('terms_condition.php','Terms And Codition','600','600')" ><b>TERMS AND CONDITION</b></a> of this Resort</small>
			              </div>
			            </div>
			          </div>


			         

			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "zip"> </label>

			              <div class="col-md-8">
			                	    	<input name="submit" type="submit" value="Next to Payment"  class="btn btn-" onclick="return personalInfo();" />
			              </div>
			            </div>
			          </div>


  
  
			 

			</form>   

			
 