
    
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
                                <th><?php echo $this->Paginator->sort('name', 'Provider'); ?></th>
                                <th><?php echo $this->Paginator->sort('contact_name', 'Contact'); ?></th>
                                <th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
                                <th><?php echo $this->Paginator->sort('website', 'Website'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                                <?php foreach ($providers as $provider): ?>
                                    <tr>
                                        <td><?php echo $this->Html->link(__($provider['Provider']['name']), array('action' => 'cloud_view', $provider['Provider']['id']), array('escape' => false)); ?></td>
                                        <td><?php echo h($provider['Provider']['contact_name']);?> &nbsp;</td>
                                        <td><?php echo h($provider['Provider']['email']); ?>&nbsp;</td>
                                        <td><?php echo h($provider['Provider']['website']); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link(__('View'), array('action' => 'cloud_view', $provider['Provider']['id']), array('escape' => false)); ?>        
                                             | 
                                                <?php echo $this->Html->link(__('Edit'), array('action' => 'cloud_edit', $provider['Provider']['id']), array('escape' => false)); ?>    
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
