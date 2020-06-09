<?php
    require_once 'core/init.php';
$user=new User();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tag -->
    <meta charset="UTF-8">
    <meta name="description" content="Login and Registration with PHP  OOP technique">
    <meta name="keywords" content="HTML5, CSS3, javaScript, Bootstrap4, jQuery, Web Design, Web Development, Responsive Website, Registration, Login, PHP, OOP technique">
    <meta name="author" content="Izaz Shaikh">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="veiwport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Bootstrap minified CSS-->
    <link rel="stylesheet" href="/LoginRegOOP/content/css/bootstrap.min.css">
    
    <!-- Custome CSS for the site -->
    <link rel="stylesheet" href="/LoginRegOOP/content/css/custom.css">
</head>

<body>
    <header>
       
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="index.php">
                PHP Login and Registration with OOP Technique
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#lms-nav-content" aria-controls="lms-nav-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="lms-nav-content">
                 <ul class="navbar-nav navbar-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                <?php if($user->isLoggedIn()) {
                ?>
                     
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                 
                <?php }
                else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Registration</a>
                    </li>
               <?php }
                ?>
                </ul>
                <?php if($user->isLoggedIn()) {
                ?>
                    <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Hello <?php echo escape($user->data()->username)?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">logout</a>
                    </li>
                </ul>
                <?php }
                 ?>

            </div>
        </nav>
    </header>
    
    <!-- jQuery library-->
    <script src="/LoginRegOOP/content/js/jquery-3.5.1.min.js"></script>
    

    <!-- Bootstrap JavaScript-->
    <script src="/LoginRegOOP/content/js/bootstrap.min.js"></script>
</body>

</html>
