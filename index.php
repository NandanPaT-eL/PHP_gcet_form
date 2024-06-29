<?php
if(isset($_POST['name'])) {
    $flag = 0;
    $server = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($server, $username, $password);
    if(!$conn) {
        die("Connection failed! Probable error: ". mysqli_connect_error());
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `Trip Form`.`GCET` (`First name`, `Last name`, `Phone Number`, `E-mail Address`, `Postal Address`, `Date`) VALUES ('$firstname', '$lastname', '$phone', '$email', '$address', current_timestamp());";

    if($conn->query($sql) == true) {
        $flag = 1;
    }
    else {
        echo "Error: $sql <br> $conn->server";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Inquiry Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.png" alt="img">
    <div class="container">
        <h1>Welcome to GCET organized trip to Mundra port<br></h1>
        <P><br>Enter details and submit the form</p>
            <br>
    </div>
    <div class="input">
        <form action="index.php" method="post">
            <br>&nbsp;Full name<br>
            <div class="fullname">
                <input type="text" name="name" id="firstname" placeholder="First">
                <input type="text" name="name" id="lastname" placeholder="Last">
            </div>
            <div class="phone">
                <br>&nbsp;Phone No.<br>
                <input type="number" name="phone" id="phone" placeholder="Phone number">                
            </div>
            <div class="email">
                <br>&nbsp;E-mail Address<br>
                <input type="email" name="email" id="email" placeholder="E-mail">
            </div>
            <div class="address">
                <br>&nbsp;Postal Address<br>
                <input type="text" name="address" id="address" placeholder="Address">
            </div>
            <div class="button">
                <button class="btn">Submit</button>
                <button class="btn">Reset</button>
            </div>
        </form>
        <?php
            if($flag == 1) {
                echo "<p>Form submitted successfully. Thank you!</p>";
            }
        ?>
    </div>
</body>
</html>