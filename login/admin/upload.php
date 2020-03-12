<?php
$file = strtolower($_FILES["fileupload"]["name"]);
$sizefile = $_FILES["fileupload"]["size"]; 
$type= strrchr($file,".");
if($sizefile>204800)
 {
 ?>

<script>
window.parent.over_size("<?php echo $sizefile/1024?>");
</script>

<?php
}
elseif(($type==".jpg")||($type==".jpeg")||($type==".gif")||($type==".png")||($type==".doc")||($type==".docx")||($type==".pdf")||($type==".tif")||($type==".tiff"))
{
$tempfile = date("Y-m-d")."-".$file;
copy($_FILES["fileupload"]["tmp_name"],$tempfile); 
?>

<script>
window.parent.uploadok("<?php echo $tempfile?>");
</script>
<?php
}
else
{
?>
<script>
window.parent.wrong_type("<?php echo $_FILES["fileupload"]["name"]?>");
</script>
<?php
}
?>