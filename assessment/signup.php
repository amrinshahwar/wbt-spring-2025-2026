<?php
$fnameErr = $lnameErr = $emailErr = $contactErr = $passwordErr = "";
$fname = $lname = $email = $contact = $password = "";

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameErr = " First Name is required";
    } else {
        $fname = cleanInput($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $fnameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lname"])) {
        $lnameErr = " Last Name is required";
    } else {
        $lname = cleanInput($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $lnameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = cleanInput($_POST["password"]);
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long";
        }
    }


        $contact = cleanInput($_POST["contact"]);
    

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body>
    <h1>Sign Up</h1>
    <p><span class="required">* required field</span></p>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <table class="form-table">
                <tr>
                    <td>First Name <span class="required">*</span></td>
                    <td>
                        <input type="text" name="fname" value="<?= $fname ?>">
                        <span class="error"><?= $fnameErr ?></span>
                    </td>
                </tr>

                <tr>
                    <td>Last Name <span class="required">*</span></td>
                    <td>
                        <input type="text" name="lname" value="<?= $lname ?>">
                        <span class="error"><?= $lnameErr ?></span>
                    </td>
                </tr>

                <tr>
                  <td>Email <span class="required">*</span></td>
                  <td>
                      <input type="text" name="email" value="<?= $email ?>">
                      <span class="error"><?= $emailErr ?></span>
                  </td>
                </tr>

                <tr>
                  <td>Password <span class="required">*</span></td>
                  <td>
                      <input type="text" name="password" value="<?= $password ?>">
                      <span class="error"><?= $passwordErr ?></span>
                  </td>
                </tr>

                <tr>
                    <td>Contact Number</td>
                    <td>
                        <input type="number" name="contact" value="<?= $contact ?>">
                    </td>
                </tr>

                
                <tr>
                    <td></td>
                    <td><input type="submit" value="Register"></td>
                </tr>

            </table>
        </fieldset>
    </form>


    
</body>

</html>