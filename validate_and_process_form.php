<?php
//DB Connection

$server = "localhost";
$username = "root";
$password = "";
$db = "assignment";

$connection= new mysqli($server,$username,$password,$db);


$errors = NULL;
//validations
if(empty($_POST['fullname'])){
    $errors['fullname'] = 'Full Name is required.';
}

if(empty($_POST['phoneno'])){
    $errors['phoneno'] = 'Phone No is required.';
}else{
    if(strlen($_POST['phoneno'])!=10){
        $errors['phoneno'] = 'Please enter valida phone no.';
    }
}

if(empty($_POST['email'])){
    $errors['email'] = 'Eamil No is required.';
}else{
    if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$_POST['email']));
}

if(empty($_POST['subject'])){
    $errors['subject'] = 'Subject is required.';
}

if(empty($_POST['message'])){
    $errors['message'] = 'Message is required.';
}

if($errors){

    $dataString = http_build_query(array('errors'=>$errors, 'form_data'=>$_POST));
    header("Location: index.php?$dataString");
}else{
    $fullname = mysqli_real_escape_string($connection,$_POST['fullname']);
    $phoneno = mysqli_real_escape_string($connection,$_POST['phoneno']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $subject = mysqli_real_escape_string($connection,$_POST['subject']);
    $message = mysqli_real_escape_string($connection,$_POST['message']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $query = "INSERT INTO form_data (fullname, phoneno, email, subject, message, ip_address) VALUES ('$fullname','$phoneno','$email','$subject','$message', '$ip')";
    if($connection->query($query) === TRUE){

        //email to site owner
        $to = "dharti2105@gmail.com";
        $subjectOfEmail = "Form Submission";
        $emailMessage = "New From is submitted.Below are the details \n\n"."Name: $fullname\n"."Phone No: $phoneno \n"."Email: $email \n"."Subject: $subject \n"."Message: $message\n"."IP: $ip\n";
        $headers = "From: dharatipatel2105@gmail.com"."Reply-To:dharatipatel2105@gmail.com"."X-Mailer: PHP/".phpversion();

        mail($to, $subject, $message, $headers);

        header("Location:index.php?success=true");

    }else{
        echo 'Connection Error';
    }
}
?>