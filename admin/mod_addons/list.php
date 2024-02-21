<div class="container">

		
			<div class="panel-body">
			<h3 align="left">List of Addons</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-hover">
					
				  <thead>
				  	<tr  >
				  		<th>No.</th> 
				  		<th>
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">Name</th>
				  		<th>Price</th>
				  		<th >Type</th>
				  		
				 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php  
				  		 $sql = "SELECT `AddonsID`, `Addons`, `Price`, `AddonsType` FROM `tbladdons`  WHERE ResortID=".$_SESSION['ADMIN_ID'];

				  		 $mydb->setQuery($sql);
				  		 $cur = $mydb->loadResultList();
						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';

				  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->AddonsID. '"/>  <a  href="index.php?view=edit&id='.$result->AddonsID.'"><span class="glyphicon glyphicon-pencil">'.$result->Addons.'</a></td>'; 
				  		echo '<td>'.$result->Price.'</td>';  
						echo '<td>'. $result->AddonsType.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>


				  </tbody> 	
				</table>

				
				<div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				</form>
	  		</div>
	  	
	  	

</div>

