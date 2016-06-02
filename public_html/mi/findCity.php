<?php


 $countryId=intval($_GET['country']);
$stateId=intval($_GET['state']);
include('config.php');
$query="SELECT id,name FROM mp_cities WHERE  state_id='$stateId'";
$result=mysql_query($query);

?>
<div class="form-group has-success">                     
<select class="form-control" name="city">
<option>Select City</option>
<?php while($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
<?php } ?>
</select>
</div>
