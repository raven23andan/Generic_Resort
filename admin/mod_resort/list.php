<div class="container">
	<?php
		check_message();
			
		?>
		
			<div class="panel-body" style="overflow:auto;">
				<h3 align="left">List of Resort</h3>
			    <form action="controller.php?action=delete" Method="POST">  	
			     
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New</a>
				  <button type="submit" class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
			
				<table id="" style="font-size:12px;" class="table table-hover  "  cellspacing="0">
					
				  <thead>
				  	<tr >
				  		<th>No.</th>
				  		<th>
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		 Name</th> 
				  		<th>Username</th> 
				  		<th>Address</th>
						<th>Status</th> 
						<th></th>   
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tbluseraccount` WHERE ROLE ='Resort'");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
							 $sql = "SELECT * FROM `tblsettings` WHERE `ResortID`=".$result->USERID;
							 $mydb->setQuery($sql);
							 $res = $mydb->loadSingleResult();
							 
				  		echo '<tr>';
						echo '<td width="2%" align="center"></td>';
				  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->USERID. '"/>
				  				<a  href="index.php?view=edit&id='.$result->USERID.'">  <span class="glyphicon glyphicon-pencil">
				  				<a href="index.php?view=edit&id='.$result->USERID.'">' . ' '.$result->UNAME.'</a></td>';
				  		echo '<td>'. $result->USER_NAME.'</td>';

				  		echo '<td>'. $result->ADDRESS .'</td>'; 
						if($result->ResortAuth == 0){ 
							$res_status = 'Pending'; 
						}
						else {
							$res_status = 'Approved';
						}
						echo '<td>' . $res_status . '</td>';
						echo '<td><a href="index.php?view=verify&id='.$result->USERID.'">Manage Verification</a></td>';

				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				
				</table>
				</form>
	  		</div>
	  	

</div>

