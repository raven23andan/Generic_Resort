<div class="container">
	<?php
		check_message();
			
		?>
		
			<div class="panel-body">
			<h3 align="left">List of Amenities</h3>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-hover">
					
				  <thead>
				  	<tr  >
				  		<th>No.</th> 
				  	    <th width="1px">Action</th>
				  		<th align="center"  width="10%">
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">Image</th>
				  		<th>Amenity Name</th>
				  		<th>Description</th>
				  		
				 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  	 $sql = "SELECT `amen_id`, `amen_name`, `amen_desp`, `amen_image`, `Price`, `Free`, `ResortID` FROM `tblamenities` WHERE `ResortID`='{$_SESSION['ADMIN_ID']}'";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();
						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
                    	echo '<td  style="white-space:nowrap;width:1px"><a class="btn btn-primary " href="index.php?view=edit&id='.$result->amen_id.'"><i class="glyphicon glyphicon-pencil"></i> Edit</a> <a class="btn btn-success" href="index.php?view=gallery&id='.$result->amen_id.'"><i class="glyphicon glyphicon-plus-sign"></i>Add Image</a></td>';
				  		echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->amen_id. '"/> <a href="index.php?view=editpic&id='.$result->amen_id.'"" title="Click here to Change Image."><img src="'. $result->amen_image.'" width="60" height="60" title="'.$result->amen_name.'"/></a></td>';

				  		echo '<td> <a  href="index.php?view=edit&id='.$result->amen_id.'"><span class="glyphicon glyphicon-pencil">'.$result->amen_name.'</a></td>';


						echo '<td>'. $result->amen_desp.'</td>';
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

