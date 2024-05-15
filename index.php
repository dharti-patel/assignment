<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>

<body>
    <?php 
        if(isset($_GET['success']) && $_GET['success'] == 'true'){
            echo "<p style='color:green'>Data has been stored successfully!</p>";
        }
    ?>
    <form method="post" action="validate_and_process_form.php">
        <label>Full Name</label>
        <input type="text" id="fullname" name="fullname" value="<?php if (isset($_GET['form_data']['fullname'])) { echo $_GET['form_data']['fullname']; } ?>" required>
        <?php if(isset($_GET['errors']['fullname'])) {echo "<p style='color:red'>".$_GET['errors']['fullname']."</p>";} ?>

        <br>

        <label>Phone No</label>
        <input type="tel" id="phoneno" name="phoneno" value="<?php if (isset($_GET['form_data']['phoneno'])) { echo $_GET['form_data']['phoneno']; } ?>" required/>
        <?php if(isset($_GET['errors']['phoneno'])) {echo "<p style='color:red'>".$_GET['errors']['phoneno']."</p>";} ?>
        <br>

        <label>Email</label>
        <input type="email" id="email" name="email" value="<?php if (isset($_GET['form_data']['email'])) { echo $_GET['form_data']['email']; } ?>" required/>
        <?php if(isset($_GET['errors']['email'])) {echo "<p style='color:red'>".$_GET['errors']['email']."</p>";} ?>
        <br>

        <label>Subject</label>
        <input type="text" id="subject" name="subject" value="<?php if (isset($_GET['form_data']['subject'])) { echo $_GET['form_data']['subject']; } ?>" required/>
        <?php if(isset($_GET['errors']['subject'])) {echo "<p style='color:red'>".$_GET['errors']['subject']."</p>";} ?>
        <br>

        <label>Message</label>
        <textarea type="message" id="message" name="message"required><?php if (isset($_GET['form_data']['message'])) { echo $_GET['form_data']['message']; } ?> </textarea>
        <?php if(isset($_GET['errors']['message'])) {echo "<p style='color:red'>".$_GET['errors']['message']."</p>";} ?>
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>