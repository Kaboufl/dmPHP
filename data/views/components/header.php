<?php 

$logger = '';

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    $message = '<div class="loginWrapper">
    <a href="/logout">Se déconnecter</a>
    </div>';
} else {
    $message = '<div class="loginWrapper">
    <a href="/login">Se connecter</a>
    <a href="/register">S\'inscrire</a>
    </div>';
}

//var_dump($_SESSION);



?>
<div class="logo" id="homeBtn">
    <img src="/images/brand/svg/logo-no-background.svg" height="65%" alt="">
</div>
<?php echo $message; ?>


<script>
    homeButton = document.querySelector('#homeBtn');

    homeButton.addEventListener('click', () => {
        window.location.href = '/';
    });
</script>


