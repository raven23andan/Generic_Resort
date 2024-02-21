<?php 
$id=$_GET['id'];
$mydb->setQuery("SELECT `amen_id`, `amen_name`, `amen_desp`, `amen_image`, `Price`, `Free` FROM `tblamenities`   where amen_id=".$id);
$cur = $mydb->loadSingleResult();

?>
<div class="panel panel-primary">
	<div class="panel-body">
		<table class="table table-hover" border="0">
			<caption><h3 align="left">Amenity Details</h3></caption>
		<tr>
		<td width="80"><img src="<?php echo $cur->amen_image; ?>" width="300" height="300" /></td>
		<td align="left" align="left"><p><strong>Name </strong>
		<?php echo ': '.$cur->amen_name; ?><br/>
		<strong>Descrption </strong>
		<?php echo ': '.$cur->amen_desp; ?><br/>
		<input type="button" value="&laquo Back" class="btn btn-primary" onclick="window.location.href='index.php'" >

	</p>
		
		
				</table>
	
	 </div>
 </div>  
