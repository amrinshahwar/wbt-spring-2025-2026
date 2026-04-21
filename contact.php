<?php
$fnameErr = $lnameErr = $emailErr = $genderErr = $contactErr = "";
$fname = $lname = $email = $gender = $company  = $contact = "";

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name
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


    // Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = cleanInput($_POST["gender"]);
    }

    if (empty($_POST["contact"])) {
        $contactErr = "Contact is required";
    } else {
        $contact = cleanInput($_POST["contact"]);
    }

    $company = cleanInput($_POST["company"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="educations.html">Education</a></li>
            <li><a href="experience.html">Experience</a></li>
            <li><a href="projects.html">Project</a></li>
            <li><a href="../index.html">Home</a></li>
        </ul>
    </nav>

    <h1>Contact Me</h1>
    <p><span class="required">* required field</span></p>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend>Registration Form</legend>
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
                  <td>Gender <span class="required">*</span></td>
                  <td>
                      <input type="radio" name="gender" value="female" <?= ($gender == "female") ? "checked" : "" ?>> Female &nbsp;
                      <input type="radio" name="gender" value="male" <?= ($gender == "male") ? "checked" : "" ?>> Male
                      <span class="error"><?= $genderErr ?></span>
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
                    <td>Company</td>
                    <td><input type="text" name="company" value="<?= $company ?>"></td>
                </tr>

                <tr>
                    <td>Reason of contact <span class="required">*</span></td>
                    <td>
                        <select name="contact">
                            <option value="">Select any</option>
                            <option value="Projects" <?= ($contact == "Projects") ? "selected" : "" ?>>Projects</option>
                            <option value="Thesis" <?= ($contact == "Thesis") ? "selected" : "" ?>>Thesis</option>
                            <option value="Job" <?= ($contact == "Job") ? "selected" : "" ?>>Job</option>
                        </select>
                        <span class="error"><?= $contactErr ?></span>
                    </td>
                </tr>

                <tr>
                    <td><label>Topics:</label></td>
                    <td>
                        <input type="checkbox" value="web development"> Web Development
                        <input type="checkbox" value="mobile development"> Mobile Development
                        <input type="checkbox" value="ai/ml development"> AI/ML Development
                    </td>
                </tr>

                <tr>
                    <td><label for="dates">Consultation Date:</label></td>
                    <td><input type="date" id="dates" name="dates"></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" value="Register"></td>
                </tr>

            </table>
        </fieldset>
    </form>


    <footer>
        <div class="social">
            <a href="https://www.linkedin.com/in/amrin-shahwar-83686421b" target="_blank">
                <img src="../LinkedIn_logo_initials.png" alt="Linkedin" width="22" height="21">
            </a>
            <a href="https://github.com/amrinshahwar" target="_blank">
                <img src="../github.png" alt="github" width="22" height="22">
            </a>
        </div>
        <p>© 2026 Amrin Shahwar | All Rights Reserved</p>
    </footer>

</body>

</html>