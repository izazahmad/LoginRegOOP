<?php
require_once 'core/init.php';
include 'layout/header.php';
?>

<div class="wrapper">

    <div class="container">

        <div class="card text-center">
            <h5 class="card-header">Change Password</h5>
            <div class="card-body">

                <?php
                $user=new User();
                if(!$user->isLoggedIn()) {
                    Redirect::to('index.php');
                }

                if(Input::exists()) {
                    if(Token::check(Input::get('token'))) {
                        $validate = new Validation();
                        $validation=$validate->check($_POST, array(

                            'password'=>array(
                                'required'=>true,
                                'min'=>6
                            ),
                            'new_password'=>array(
                                'required'=>true,
                                'min'=>6
                            ),
                            'new_confirm_password'=>array(
                                'required'=>true,
                                'min'=>6,
                                'matches'=>'new_password'
                            )
                        ));
                        if($validation-> passed()){
                            if(Hash::make(Input::get('password'),$user->data()->salt)!== $user->data()->password) {
                                echo '<p class="error">Your current password is wrong</p>';
                            }
                            else {
                                $salt=Hash::salt();
                                try {
                                    $user->update(array(
                                        'password' => Hash::make(Input::get('new_password'),$salt),
                                        'salt' => $salt
                                    ));
                                }
                                catch(Exception $e) {
                                    die($e->getMessage());
                                }
                                Session::flash('success','Password has been changed.');
                                // header('Location: index.php');
                                Redirect::to('index.php');
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
                <?php }

                    }
                }
                ?>

                <form action="" method="post">
                    <div class="form-group">
                        <lable for="password">Current Password</lable>
                        <input type="password" name="password" id="password">
                    </div>

                    <div class="form-group">
                        <lable for="new_password">New Password</lable>
                        <input type="password" name="new_password" id="new_password">
                    </div>

                    <div class="form-group">
                        <lable for="new_confirm_password">Confirm New Password</lable>
                        <input type="password" name="new_confirm_password" id="new_confirm_password">
                    </div>
                    <input type="submit" value="Change" class="btn btn-primary">
                    <input type="button" value="cancle" class="btn btn-danger" onclick="window.location='profile.php';">
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

                </form>
            </div>
        </div>
    </div>
</div>
 <?php 
 include 'layout/footer.php';
 ?>