<?php
require_once 'core/init.php';
include 'layout/header.php';
?>


<div class="wrapper">

<div class="container">
  
    <div class="card text-center">
  <h5 class="card-header">Login</h5>
  <div class="card-body">
      
   <?php
if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate=new Validation();
        $validation=$validate->check($_POST,array(
            'username' => array('required'=>true),
            'password'=>array('required'=>true)
        ));
        if($validation->passed()) {
            $user = new User();
            $remember=(Input::get('remember')==='on') ? true : false;
            $login=$user->login(Input::get('username'),Input::get('password'),$remember);
            if($login){
                Redirect::to('index.php');
            }
            else {
                echo '<p  class="error">Sorry , Logging in failed</p>';

            }
        }
        else {
            ?>
                <p class="error">
                    <?php
                    foreach($validation->errors() as $error){
                    echo $error, '<br>';

                    }
                    ?>
                </p>
            
            <?php
        }
    }
}

?>
 
    <form action="" method="post" class="">
   <div class="form-group">
       <label for="username">Username</label>
       <input type="text" name="username" id="username" autocomplete="off">
   </div>
    <div class="form-group">
       <label for="remember">Password</label>
       <input type="password" name="password" id="password" autocomplete="off">
   </div>
   <div class="form-group form-check">
      <input class="form-check-input" type="checkbox" name="remember" id="remember">
       <label class="form-check-label" for="remember">
        Remember Me</label>
   </div>
   <input type="hidden" name="token" value="<?php echo Token::generate();?>">
   <input type="submit" value="Log In" class="btn btn-primary">
</form>
  </div>
</div>
</div>
</div>
<?php 
include 'layout/footer.php';
?>