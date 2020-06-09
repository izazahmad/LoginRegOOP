<?php
require_once 'core/init.php';
include 'layout/header.php';
?>


<div class="wrapper">

<div class="container">
  
    <div class="card text-center">
  <h5 class="card-header">Update</h5>
  <div class="card-body">
      
   <?php
$user= new User();

if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {
        $validate=new Validation();
        $validation=$validate->check($_POST,array(
            'name'=>array(
                'required'=>true,
                'min'=>2,
                'max'=>50
            )
        ));
        
        if($validation->passed()) {
            try {
                $user->update(array(
                    'name'=>Input::get('name')
                ));
                Session::flash('success','your details have been updated!');
                Redirect::to('index.php');
            }
            catch(Exception $e) {
                die($e->getMessage());
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


<form action="" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo escape($user->data()->name)?>">
        </div>
        <input type="submit" value="update" class="btn btn-primary">
        <input type="button" value="cancle" class="btn btn-danger" onclick="window.location='profile.php';">
        <input type="hidden" name="token" value="<?php echo Token::generate();?>">
    
</form>
  </div>
</div>
</div>
</div>
<?php 
include 'layout/footer.php';
?>