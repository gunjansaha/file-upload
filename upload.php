
<script> 
function formvali()                                    
{ 
 var file = document.forms["RegForm"]["file"];
 
  if (file.value =="")                        
    { 
        window.alert("Please put file"); 
        Comment.focus(); 
        return false; 
    } 
 }  
 </script>

<form name="RegForm"  enctype="multipart/form-data" onsubmit="return formvali()" method="post">

<p> upload file:   <input id="file" type="file" name="file" />
 <p><input type="submit" value="send" name="submit">      
        <input type="reset" value="Reset" name="Reset">   
    </p> 
<script>var uploadField = document.getElementById("file");

uploadField.onchange = function() {
    if(this.files[0].size > 5000000000){
       alert("File is too big!");
       this.value = "";
    };
}; </script>
</form>

<?php
 $con=mysqli_connect('localhost','root','','file');
if($con==false)
	{
		echo "con error";
	}
	
   
	if(isset($_POST["submit"]))
{   
   

$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);



if (isset($name)) {

$path= 'C:\xampp\htdocs\formvali\file';

				if (!empty($name)){
					
				if (move_uploaded_file($tmp_name, $path.$name)) 
				   
				   {
					   
				 $query="INSERT INTO file (file) VALUES ('$name')" ;
					 $con=mysqli_connect('localhost','root','','file');
					 $run=mysqli_query($con,$query);
					
	
	if($run==true)
	{
		?>
		<script>alert("data is inserted");</script>
		<?php
		
	}
}



}
}
}
?>
        
		
