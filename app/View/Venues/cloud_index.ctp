
    
    <div class='col-xs-12'>
        
        <div class='box'>
            <div class='box-header'>
                <h3 class='box-title'>All Venues</h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <table class='table table-hover' id='usertable'>
                        <tbody>
                            <tr>
                                <th><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
                                <th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
                                <th><?php echo $this->Paginator->sort('website', 'Website'); ?></th>
                                <th><?php echo $this->Paginator->sort('phone', 'Phone'); ?></th>
                                <th><?php echo $this->Paginator->sort('province_id', 'Province'); ?></th>
                                <th><?php echo $this->Paginator->sort('city_id', 'City'); ?></th>
                                <th><?php echo $this->Paginator->sort('type', 'Type'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                                <?php foreach ($venues as $venue): ?>
                                    <tr>
                                        <td><?php echo $this->Html->link(__($venue['Venue']['name']), array('action' => 'cloud_view', $venue['Venue']['id']), array('escape' => false)); ?></td>
                                        <td><?php echo h($venue['Venue']['email']); ?>&nbsp;</td>
                                        <td><?php echo h($venue['Venue']['website']); ?>&nbsp;</td>
                                        <td><?php echo h($venue['Venue']['phone']); ?>&nbsp;</td>
                                        <td><?php echo h($this->Status->translateProvince($venue['Venue']['province_id'])); ?>&nbsp;</td>
                                        <td><?php echo h($this->Status->translateCity($venue['Venue']['city_id'])); ?>&nbsp;</td>
                                        <td><?php echo h($this->Status->translateVenueType($venue['Venue']['type'])); ?>&nbsp;</td>
                                        <td>
                                        <?php echo $this->Html->link(__('View'), array('action' => 'cloud_view', $venue['Venue']['id']), array('escape' => false)); ?>    
                                        <?php echo $this->Html->link(__('Edit'), array('action' => 'cloud_edit', $venue['Venue']['id']), array('escape' => false)); ?>    
                                        <?php echo $this->Html->link(__('Delete'), array('action' => 'cloud_delete', $venue['Venue']['id']), array('escape' => false)); ?>
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
