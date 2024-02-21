<?php 
	if (isset($_POST['submit'])) {

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


		$guest = New Guest();
		$guest->G_FNAME          = $_SESSION['name'];    
		$guest->G_MNAME          = $_SESSION["middle"];
		$guest->G_LNAME          = $_SESSION['last'];  
		$guest->G_ADDRESS        = $_SESSION['address'] ;        
		$guest->DBIRTH           = date_format(date_create($_SESSION['dbirth']), 'Y-m-d');   
		$guest->G_PHONE          = $_SESSION['phone'];       
		$guest->EMAILADDRESS       = $_SESSION['emailadd'];        
		$guest->G_TERMS          = 1;    
		$guest->G_UNAME          = $_SESSION['username'];    
		$guest->G_PASS           = sha1($_SESSION['pass']);    
		$guest->ZIP              = $_SESSION['zip'];
		$guest->create(); 


		

            unset($_SESSION['name']);
            unset($_SESSION['last']);
            unset($_SESSION['address']);
            unset($_SESSION['dbirth']);
            unset($_SESSION['emailadd']);
            unset($_SESSION['username']);
            unset($_SESSION['pass']);
            unset($_SESSION['phone']); 
            unset($_SESSION['zip']); 

            	$email = trim($_POST['username']);
			  $upass  = trim($_POST['pass']);
			  $h_upass = sha1($upass);
		  
		   
	        $guest = new Guest();
	        $res = $guest::guest_login($email,$h_upass);

	        if ($res==true){
                 redirect(WEB_ROOT."guest/");
	        }   
	}	
	?>
	<section class="contact-us">
        <div class="container">
            <div class="row">	
            	        <div class="section-heading">
                        <h2>Register Guest</h2>
                </div>
                <div class="col-md-2"></div>
            	<div class="col-md-8">

					
            
   
         		<form class="form-horizontal" id ="form-submit" action="" method="post"  > 

					  <div class="form-group" >
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "name">FIRST NAME:</label>

			              <div class="col-md-8">
			              	<input name="" type="hidden" value="">
			                <input name="name" type="text" class="form-control " id="name" required  onkeydown="return /[a-z, ]/i.test(event.key)" />
			              </div>
			            </div>
			          </div> 

					  <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "middle">MIDDLE NAME:</label>

			              <div class="col-md-8">
			                <input name="middle" type="text" class="form-control " id="middle" value="" onkeydown="return /[a-z, ]/i.test(event.key)" />
			              </div>
			            </div>
			          </div>
 

			            <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "last">LAST NAME:</label>

			              <div class="col-md-8">
			                <input name="last" type="text" class="form-control " id="last" required onkeydown="return /[a-z, ]/i.test(event.key)" />
			              </div>
			            </div>
			          </div>

			      			         			         

			           <div class="form-group" hidden>
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "address">ADDRESS:</label>

			              <div class="col-md-8">
			                <input name="address" type="text" class="form-control " value="" id="address" />
			              </div>
			            </div>
			          </div> 

			         

			            <div class="form-group  " hidden>
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "dbirth">DATE OF BIRTH:</label>

			              <div class="col-md-8 ">  
			              	 <div class="input-group ">
			                 <input type="text"   name="dbirth" id="dbirth"  value=""    class="dbirth form-control  " >
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
			                <input name="phone" type="text" maxlength="11" class="form-control " id="phone" onkeypress=" return isNumber(event)" required/>
			              </div>
			            </div>
			           </div>

			        
			    
			         
			         
			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "emailadd">E-MAIL:</label>

			              <div class="col-md-8">
			                <input name="emailadd" id="emailadd" type="email" class="form-control " id="emailadd" oninput="this.setCustomValidity('')" required />
			              </div>
			            </div>
			          </div>

			            <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "username">USERNAME:</label>

			              <div class="col-md-8">
			                <input name="username" type="text" class="form-control " id="username"  oninput="this.setCustomValidity('')" required />
			              </div>
			            </div>
			       		 </div>

			         
			      
			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "password">PASSWORD:</label>

			              <div class="col-md-8">
			                <input name="pass" type="password" class="form-control " id="password"  oninput="this.setCustomValidity('')" required/>
			              </div>
			            </div>
			          </div>

			         

			          <div class="form-group" hidden>
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "zip">ZIP CODE:</label>

			              <div class="col-md-8">
			                <input name="zip" type="text" class="form-control " id="zip"  onkeypress=" return isNumber(event)"  maxlength="4" />
			              </div>
			            </div>
			          </div>

			         

			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "zip">Terms:</label>

			              <div class="col-md-8">
			               <input type="checkbox" name="condition" value="checkbox" required value="" /> I 
					 							<small>Agree the <a href="#" class="toggle-modal"  onclick="OpenPopupCenter('./booking/terms_condition.php','Terms And Codition','600','600')" ><b>TERMS AND CONDITION</b></a> of this Resort</small>
			              </div>
			            </div>
			          </div>


			         

			          <div class="form-group">
			            <div class="col-md-12">
			              <label class="col-md-3 " for=
			              "zip"> </label>

			              <div class="col-md-8">
			                	    	<input name="submit" type="submit" value="Confirm"  class="btn btn-" />
			              </div>
			            </div>
			          </div>


  
  
			 

			</form>   

		</div>

                <div class="col-md-2"></div>
	</div>
</div>
</section>