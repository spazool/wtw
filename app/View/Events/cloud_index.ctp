<div class='col-xs-12'>
        
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'>All Events</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <table class='table table-hover' id='usertable'>
                        <tbody>
                            <tr>
                                <th><?php echo $this->Paginator->sort('name', 'Event'); ?></th>
                                <th><?php echo $this->Paginator->sort('reference', '#Ref'); ?></th>
                                <th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
                                <th><?php echo $this->Paginator->sort('telephone', 'Phone'); ?></th>
                                <th><?php echo $this->Paginator->sort('start_date', 'Start Date'); ?></th>
                                <th><?php echo $this->Paginator->sort('end_date', 'End Date'); ?></th>
                                <th><?php echo $this->Paginator->sort('category_id', 'Category'); ?></th>
                                <th><?php echo $this->Paginator->sort('provider_id', 'Provider'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td><?php echo $this->Html->link(__($event['Event']['name']), array('action' => 'cloud_view_event', $event['Event']['id']), array('escape' => false)); ?></td>
                                        <td><?php echo h($event['Event']['reference']);?> &nbsp;</td>
                                        <td><?php echo h($event['Event']['email']); ?>&nbsp;</td>
                                        <td><?php echo h($event['Event']['telephone']); ?>&nbsp;</td>
                                        <td><?php echo h($event['Event']['start_date']); ?>&nbsp;</td>
                                        <td><?php echo h($event['Event']['end_date']); ?>&nbsp;</td>
                                        <td><?php echo h($this->Status->translateCategories($event['Event']['category_id'])); ?>&nbsp;</td>
                                        <td><?php echo h($this->Status->translateProvider($event['Event']['provider_id'])); ?>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Html->link(__('View'), array('action' => 'cloud_view_event', $event['Event']['id']), array('escape' => false)); ?>        
                                             | 
                                            <?php echo $this->Html->link(__('Edit'), array('action' => 'cloud_edit', $event['Event']['id']), array('escape' => false)); ?>    
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
