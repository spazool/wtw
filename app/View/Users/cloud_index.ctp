
    
    <div class='col-xs-12'>
        
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'>All Users</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <table class='table table-hover' id='usertable'>
                        <tbody>
                            <tr>
                                <th><?php echo $this->Paginator->sort('first_name', 'Name'); ?></th>
                                <th><?php echo $this->Paginator->sort('last_name', 'Surname'); ?></th>
                                <th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
                                <th><?php echo $this->Paginator->sort('status', 'Status'); ?></th>
                                <th><?php echo $this->Paginator->sort('api_key', 'ApiKey'); ?></th>
                                <th><?php echo $this->Paginator->sort('permission_id', 'Permission'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $this->Html->link(__($user['User']['first_name']), array('action' => 'cloud_edit', $user['User']['id']), array('escape' => false)); ?></td>
                                        <td><?php echo $this->Html->link(__($user['User']['last_name']), array('action' => 'cloud_edit', $user['User']['id']), array('escape' => false)); ?></td>
                                        <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                                        <td><?php echo h($this->Status->translateUserStatus($user['User']['status'])); ?>&nbsp;</td>
                                        <td><?php echo h($user['User']['api_key']); ?>&nbsp;</td>
                                        <td><?php echo h($this->Status->translatePermissionStatus($user['User']['permission_id'])); ?>&nbsp;</td>
                                        <td>
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'cloud_edit', $user['User']['id']), array('escape' => false)); ?>    
                                            
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                        </tbody>

                    </table>
            
                    <?php echo $this->element('pagination_controls'); ?> 
                </div>
                
            </div>
            
            
           
        </div>
        
    </div>


<!--<script type="text/javascript">
            $(function() {
                $("#usertable").dataTable();
                
            });
        </script>-->
