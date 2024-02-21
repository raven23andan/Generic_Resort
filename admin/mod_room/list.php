
<div class="container">
	<?php
		check_message();
			
		?>
      <style>
		.table td, .table th {
			border-left: 0 !important;
			border-right: 0 !important;
		}
		.table .btn {
			font-size: 12px;
		}
		.table i {
			font-size: 12px;
			margin-bottom: -6px;
		}
		.dataTables_filter {
			width: 100%;
		}
		.dataTables_filter input, .dataTables_filter label {
			width: 100%;
			text-align: left;
			margin-top: 18px;
		}
		.dataTables_wrapper .dataTables_filter input {
			margin: 0;
			padding: 4px 12px;
			border: 1px grey solid;
			border-radius: 2px;
		}
	  </style>
	  <form action="" method="POST">  	
	
			<div class="panel-body">
			<h3 >List of Accomodation</h3>	

				<div class="btn-group" style="padding-bottom: 10px;">
				  <a href="index.php?view=add" class="btn btn-primary">New</a>
				  
				  <button type="submit" class="btn btn-default" name="delete" formaction="controller.php?action=delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>	
				
				<div class="btn-group" style="padding-bottom: 10px;">
					<button type="submit" class="btn btn-default" name="show" formaction="controller.php?action=showRoom"><span class="glyphicon glyphicon-eye-open"></span> Show</button>
					<button type="submit" class="btn btn-default" name="hide" formaction="controller.php?action=hideRoom"><span class="glyphicon glyphicon-eye-close"></span> Hide</button>
				</div>	
				

				<table id="example" style="font-size:12px;" class="table table-hover table-bordered"  cellspacing="0" >
					
				  <thead>
				  	<tr  >
				  		<th>No.</th>
				  		<th width="1" >
				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"> 
				  		Image</th> 
				  		<th   >Type</th>	 
				  		<th >Accomodation</th> 
				  		<th width="80px" >Good For</th>
				  		<th width="100px"  >Pricing</th> 
						<th>Discount</th>
						<th>Visibility</th>
						<th width="1px">Action</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php  
				  	
						$mydb->setQuery("SELECT * FROM tblroom WHERE ResortID='".$_SESSION['ADMIN_ID']."' ORDER BY  ROOMID ASC");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
						echo '<td width="5%" align="center"></td>';
				  		echo '<td style="white-space:nowrap;"   ><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->ROOMID. '"/> 
				  				<a href="#"  class="roomImg" data-id="'.$result->ROOMID.'" title="Click here to Change Image."><img src="'. $result->ROOMIMAGE.'" width="80" height="60" title="'. $result->ROOM .'"/></a></td>'; 
				  		echo '<td>'. $result->AccomodationType.'</td>';
						echo '<td>'. $result->ROOM.' '. $result->ROOMDESC.'</td>'; 
				  		echo '<td style="text-align: center;">'. $result->NUMPERSON.' pax</td>';

				  		
				  		echo '<td style="white-space:nowrap;">'; 
					  		$sql = "SELECT * FROM `tblpricing` WHERE `RoomID` = ".$result->ROOMID;
					  		$mydb->setQuery($sql);
					  		$pricing = $mydb->loadResultList(); 
							foreach($pricing as $pr){
								if($pr->WeekRates=='NotApplicable'){
					  				echo  $pr->Description.'  &#8369 '. $pr->Prices.'<br/>';

								}else{
	  								echo $pr->Description.' [ '. $pr->WeekRates. ' ]:  &#8369 '. $pr->Prices.'<br/>';   
								}
					  		} 
				  		echo '</td>'; 
						echo '<td style="text-align: center;">' . $result->Discount * 100 . '%</td>';
						$visibilty = ($result->ShowRoom == 1) ? 'Show' : 'Hidden';
						echo '<td style="text-align: center;">' . $visibilty . '</td>';
						echo '<td style="white-space:nowrap;"><a class="btn btn-primary " href="index.php?view=edit&id='.$result->ROOMID.'"><i class="glyphicon glyphicon-pencil"></i> Edit</a> <a class="btn btn-success" href="index.php?view=gallery&id='.$result->ROOMID.'"><i class="glyphicon glyphicon-plus-sign"></i>Add Image</a>
						<br><a href="index.php?view=discount&id='.$result->ROOMID.'" type="button" class="btn btn-warning" style="margin-top: 4px"><i class="glyphicon glyphicon-usd"></i>Add Discount</a>
						
						</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				 	
				</table>
	  		</div>
	  	
	  	

</div>

				</form>
<div class="modal fade" id="myModal" tabindex="-1">

</div>