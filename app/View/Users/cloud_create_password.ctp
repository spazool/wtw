
            <div class="header">Create Password</div>
            
                <?php echo $this->Form->create('User', array('action' => 'cloud_create_password')); ?>
            
                <div class="body bg-gray">
                    <div class="form-group">
                        <?php echo $this->Form->input('password', array('type' => 'password','class' => 'form-control','placeholder' => 'New Password')); ?>
<!--                        <input type="text" name="userid" class="form-control" placeholder="Email"/>-->
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('confirm_password', array('type' => 'password','class' => 'form-control','placeholder' => 'Confirm Password')); ?>
                        
                        <!--<input type="password" name="password" class="form-control" placeholder="Password"/>-->
                    </div>          
<!--                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>-->
                </div>
                <div class="footer">                                                               
<!--                    <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  -->
                    
                    <?php echo $this->Form->button('Change Password',array('type' => 'submit','class' => 'btn bg-olive btn-block'));?>
                    
                    <!--<p><a href="#">I forgot my password</a></p>-->
                    
                </div>
           

            <div class="margin text-center">
                <span>Where's the wine 2014</span>
                

            </div>
