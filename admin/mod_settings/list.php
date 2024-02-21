<style type="text/css">

</style>
<div class="container">
	<?php
		check_message();
			
		?>
		
			<div class="panel-body">
				<h3 align="left">Site Settings</h3>
			    <form action="controller.php?action=delete" Method="POST">  	
			    <div class="btn-group"></a><a href="index.php?view=map" class="btn btn-info"><span class="glyphicon glyphicon-globe"></span> Embed Map</a>
				  <a href="index.php?view=add" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Setting</a>
				  <button type="submit" class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
				
					<table id="example" class="table table-striped" cellspacing="0"> 
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th><input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');"></th>
				  		<th>TYPE</th> 
				  		<th>DESCRIPTION</th> 
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * 
										FROM  `tblsettings` WHERE TYPE<>'Map' AND ResortID=".$_SESSION['ADMIN_ID']);
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td style="white-space: nowrap;"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->ID. '"/>
				  				<a  href="index.php?view=edit&id='.$result->ID.'"> <span class="glyphicon glyphicon-pencil"></span></a></td>'; 
				  				echo '<td> '.$result->TYPE.'</td>'; 
				  				if($result->TYPE=='Chatbot'){
				  		            echo '<td>'. $result->DESCRIPTION.' | Keyword: '. $result->ChatKeyword.'</td>'; 
				  				    
				  				}else{
				  				        echo '<td>'. $result->DESCRIPTION.'</td>'; 
				  				}
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
				
				</table>
				
				</form>
	  		</div>
	  	 
	  	

</div>


