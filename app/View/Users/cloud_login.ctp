
            <div class="header">Sign In</div>
            
                <?php echo $this->Form->create('User', array('action' => 'cloud_login')); ?>
            
                <div class="body bg-gray">
                    <div class="form-group">
                        <?php echo $this->Form->input('email', array('type' => 'text','class' => 'form-control','placeholder' => 'youremail@example.com')); ?>
<!--                        <input type="text" name="userid" class="form-control" placeholder="Email"/>-->
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password', array('type' => 'password','class' => 'form-control','placeholder' => 'your password')); ?>
                        <!--<input type="password" name="password" class="form-control" placeholder="Password"/>-->
                    </div>          
<!--                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>-->
                </div>
                <div class="footer">                                                               
<!--                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  -->
                    
                    <?php echo $this->Form->button('Login',array('type' => 'submit','class' => 'btn bg-olive btn-block'));?>
                    
                    <!--<p><a href="#">I forgot my password</a></p>-->
                    
                </div>
           

            <div class="margin text-center">
                <span>Where's the wine 2014</span>
                

            </div>
