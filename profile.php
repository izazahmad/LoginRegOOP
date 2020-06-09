<?php
require_once 'core/init.php';
include 'layout/header.php';
$user=new User();
//if(!$username=Input::get('user')) {
if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
    
}
else {
   // if(!$user->exists()) {
    //    Redirect::to(404);
    //}
    //else {
        $data=$user->data();
    //}
?>
   <div class="wrapper">

<div class="container">
  
    <div class="card text-center">
  <h5 class="card-header">Profile</h5>
  <div class="card-body">
   
    <h3 class="card-title"><?php echo escape($data->username);?></h3>
    <p class="card-text">Full Name: <?php echo escape($data->name);?></p>
    <ul class="profile-list">
        <li><a class="btn btn-primary" href="update.php">Update Details</a></li>
        <li><a class="btn btn-primary" href="changepassword.php">Change Password</a></li>
    </ul>
        </div>
    </div>
       </div>
</div>
<?php
}
include 'layout/footer.php';