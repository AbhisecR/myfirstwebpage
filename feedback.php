<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Application Feedback</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <img class="bg" src="gat2.jpeg" alt="GLOBAL ACADEMY OF TECHNOLOGY">
<div class="container">
   <h1>Your Feedback Is Valuable To Us</h1>
   <p>Please provide your Feedback it helps us to improve our product more</p>
</div>
<div class="body">
   <form action="feedback.php" method="post" enctype="multipart/form-data"><p> <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your name"></p>
   <p> <label for="USN">USN</label>
        <span><input type="text" id="USN" name="USN" placeholder="Enter your USN"></span>  
    </p>
    <p>
        <label for="ph">Phone number</label>
        <input type="tel" name="ph" id="ph">
    </p>
    <p>
        <label for="gender">Gender</label>
        <input type="radio" id="gender" name="gender">Male
        <input type="radio" id="gender" name="gender">Female
    </p>
    <p>
        <label for="Advice">
            Advice
        </label>
        <textarea name="Advice" id="Advice" cols="30" rows="10" placeholder="hmm.. what should we work on ? "></textarea>
    </p>
    <p>
        <label for="media">any relevant media</label>
        <input type="file" name="media" id="media">
    </p>

    <p>
        <input type="submit" name="submit">
        <input type="reset">
    </p>
 
    <?php
    if(isset($_POST['submit'])){
$insert=false;
$server = "localhost";
$username= "root";
$password= "";
$con = mysqli_connect($server,$username,$password);
if($con){
    echo "connection successful";
}
else{
    echo "connection unsuccessful because".mysqli_connect_error();
}
$name =$_POST['name'];
$ph=$_POST['ph'];
$USN=$_POST['USN'];
$gender=$_POST['gender'];
$Advice=$_POST['Advice'];

$media=$_FILES['media'];
$file_name = $_FILES['media']['name']; // File name
$file_tmp = $media['tmp_name']; // Temporary file location on the server
$file_destination = 'uploads/' . $file_name; // Destination path to move the file

if (move_uploaded_file($file_tmp, $file_destination)) {
    echo "File uploaded successfully";
} else {
    echo "Error uploading file";
}

$sql="INSERT INTO `feedback`.`feedback` ( `name`, `ph`, `USN`, `gender`, `Advice`, `dt`,`media`) 
VALUES ( '$name','$ph','$USN', '$gender', '$Advice', current_timestamp(),'$file_destination');";
if($con->query($sql)){
    $insert=true;
}
else{
    echo "Error: $sql </br> $con->error";
}

}


?>
</form>
</div>
</body>
</html>

