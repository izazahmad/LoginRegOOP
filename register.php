<?php 
require_once 'core/init.php';
include 'layout/header.php';

?>
<div class="wrapper">
   
    <div class="container">
        <div class="card text-center">
             <h5 class="card-header">Registration</h5>

            <div class="card-body">
        <?php
if(Input::exists()){
    if(Token::check(Input::get('token'))) {
        $validate = new Validation();
        $validation=$validate->check($_POST, array(
            'username'=>array(
                'required'=> true,
                'min'=> 2,
                'max'=> 20,
                'unique'=> 'users'
            ),
            'password'=>array(
                'required'=>true,
                'min'=>6
            ),
            'confirm_password'=>array(
                'required'=>true,
                'matches'=>'password'
            ),
            'name'=>array(
                'required'=>true,
                'min'=>2,
                'max'=>50
            )
        ));
        if($validation-> passed()){
            $user=new User();
            $salt=Hash::salt();
            try {
                $user->create(array(
                   'username' => Input::get('username'),
                   'password' => Hash::make(Input::get('password'),$salt),
                   'salt' => $salt,
                   'name' => Input::get('name'),
                   'joined' => date('Y-m-d H:i:s'),
                   'group' => 1
                ));
            }
            catch(Exception $e) {
                die($e->getMessage());
            }
            Session::flash('success','Registration is Successful');
           // header('Location: index.php');
            Redirect::to('index.php');
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
        <lable for="username">Username</lable>
        <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username'));?>" autocomplete="off">
    </div>

    <div class="form-group">
        <lable for="password">Password</lable>
        <input type="password" name="password" id="password">
    </div>

    <div class="form-group">
        <lable for="confirm_password">Confirm Password</lable>
        <input type="password" name="confirm_password" id="confirm_password">
    </div>

    <div class="form-group">
        <lable for="name">Name</lable>
        <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name'));?>">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
    <input type="submit" value="Register" class="btn btn-primary">

</form>
            </div>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';

?>