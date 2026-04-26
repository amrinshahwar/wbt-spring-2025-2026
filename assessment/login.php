<?php
$emailErr=$passwordErr ="";
$email =$password ="";

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
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
        $passwordErr = "Password must be at least 8 characters";
    }
}
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>login page</title>

</head>

<body>


    <h2>Login page </h2>

    <form method="post" action="<?= htmlspecialchars($_SERVER[" PHP_SELF"]); ?>">
        <table class="form-table">

            <tr>
                <th>login infromation</th>
            </tr>

            <tr>
                <td>UserName <span class="required">*</span></td>
                <td>
                    <input type="text" name="username" value="<?= $name ?>">
                    <span class="error">
                        <?= $nameErr ?>
                    </span>
                </td>


            </tr>
            <tr>
                <td>Email <span class="required">*</span></td>
                <td>
                    <input type="text" name="email" value="<?= $email ?>">
                    <span class="error">
                        <?= $emailErr ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>Password <span class="required">*</span></td>
                <td>
                    <input type="text" name="password" value="<?= $password ?>">
                    <span class="error">
                        <?= $passwordErr ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="login">
                    
                </td>
            </tr>

        </table>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !$nameErr && !$emailErr && !$passwordErr): ?>
        <h3>Submitted values</h3>
        <table class="result-table">
            <tr><td>Name</td><td><?= $name ?></td></tr>
            <tr><td>Email</td><td><?= $email ?></td></tr>
            <tr><td>Password</td><td><?= $password ?></td></tr>
            
        </table>
    <?php endif; ?>

    
    

</body>

</html>