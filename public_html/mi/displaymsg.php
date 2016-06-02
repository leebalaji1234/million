<?php 
include('config.php');
$id=$_GET['id'];
$key=$_GET['id'];

error_reporting(0);
$fet1=mysql_query("select * from mp_snippets where snippet_key='$key'");
while($row11=mysql_fetch_array($fet1))
        {
			$ms=$row11['snippet_key'];
        }
		

$fet=mysql_query("select * from mp_snippets where snippet_key='$key'");
while($row=mysql_fetch_array($fet))
        {
			$mb=$row['snippet_text'];
        }

?>

<div class="form-group has-success">
  <label class="control-label" for="inputSuccess">Mail Subject *</label>
  <input type="text" class="form-control" name="snippet_key"  id="inputSuccess" value="<?php  echo $ms; ?>"  required>
</div>
<div class="form-group has-success" >
  <label class="control-label" for="inputSuccess">Message Body *</label>
  <textarea class="form-control" name="snippet_text" rows="3" value="<?php echo $mb; ?>" ><?php echo $mb; ?></textarea>
</div>

 <?php 
					  $query22 = mysql_query("SELECT * FROM mp_email_templates"); // Run your query	
while ($row22 = mysql_fetch_array($query22)) {	
echo $row22['parameters'];
}
 ?>
