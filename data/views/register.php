<?php

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("Location: /");
    exit;
}

require_once "mySQL.php";

$username = $password = $email = "";
$username_err = $password_err = $email_err = $register_err = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST['username']))) {
        $username_err = "Veuillez renseigner un nom d'utilisateur.";
    } else {
        $username = trim($_POST['username']);
    }
    
    if(empty(trim($_POST['email']))) {
        $email_err = "Veuillez renseigner une adresse email.";
    } else {
        $email = trim($_POST['email']);
    }
    
    if(empty(trim($_POST['password']))) {
        $password_err = "Veuillez renseigner un mot de passe.";
    } else {
        $password = trim($_POST['password']);

        if($password != trim($_POST['cPassword'])) {
            $password_err = "Les mots de passe ne correspondent pas !";
        }
    }

    if(empty($username_err) and empty($email_err) and empty($password_err))
    {
        $safe_username = $mysqli->real_escape_string($username);
        $safe_email = $mysqli->real_escape_string($email);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $safe_password = $mysqli->real_escape_string($hashed_password);
        
        $sql = "INSERT INTO `db-MamaMia`.users(username, email, password) VALUES(?, ?, ?);";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $safe_username, $safe_email, $safe_password);

            if ($stmt->execute())
            {
                echo 'yay';
            } else { echo 'erreur'; }
        }
        
    }
}

?>

    


    <div class="register-wrapper">
        <h2>Créez votre compte :</h2>
        <p>Entrez ici vos informations pour créer votre compte</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $register_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="register-form-group">
                <label>Nom d'utilisateur :</label>
                <input type="text" name="username" class="register-form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="register-form-group">
                <label>Adresse e-mail :</label>
                <input type="text" name="email" class="register-form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="register-form-group">
                <label>Mot de passe :</label>
                <input type="password" name="password" class="register-form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="register-form-group">
                <label>Confirmer le mot de passe :</label>
                <input type="password" name="cPassword" class="register-form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="register-form-group">
                <input type="submit" class="btn btn-primary" value="S'inscrire">
            </div>
            <p>Vous avez déjà un compte ? <a href="/login">Se connecter</a>.</p>
        </form>
    </div>
