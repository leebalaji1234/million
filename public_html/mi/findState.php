<?php


 $country=intval($_GET['country']);
include('config.php');
$query="SELECT id,name FROM mp_states WHERE country_id='$country'";
$result=mysql_query($query);

?>

 <div class="form-group has-success">
<select class="form-control" name="state" onchange="getCity(<?php echo $country?>,this.value)">
<option>Select State</option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
<?php } ?>
</select>
</div>