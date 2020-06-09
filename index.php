<?php
require_once 'core/init.php';
include 'layout/header.php';
?>
<div class="wrapper">
   
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
        <?php
        if(Session::exists('success')) {
    echo '<p class="error">'.Session::flash('success').'</p>';
    }
    $user=new User();
        if($user->isLoggedIn()) {
        ?>
                Hello <?php echo escape($user->data()->name)?>
        <?php
        }
        else {
        ?>
                Login First
        <?php
        }
        ?>
            </div>
            <div class="card-body">
        <?php
        if($user->isLoggedIn()) {
        ?>
                <h5 class="card-title">
        <?php
        if($user->hasPermission('admin')) {
            echo ' you are an Administrator';
        }
        else {
            echo 'You are a Standard user';   
        }
        ?>
                </h5>
                <p class="card-text">Go to your <a href="profile.php" class="btn btn-primary">profile</a></p>
                <a href="logout.php" class="btn btn-danger">Log out</a>
        <?php
        }
        else {
        ?>
                <h5 class="card-title">
                    Click here to <a href="login.php" class="btn btn-primary">login</a> or <a href="register.php" class="btn btn-primary">register</a>
                </h5>
        <?php
        }
        ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';

?>