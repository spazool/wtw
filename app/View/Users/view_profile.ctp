<h3><?php echo $user['User']['first_name']; ?></h3>
<p><?php echo $user['User']['last_name']; ?></p>
<p><?php echo $user['User']['email']; ?></p>
<p><?php echo $this->Status->translateUserStatus($user['User']['status']); ?><p>