<div class='row-fluid'>
  <div class="span8 left-side">

    <?php
//    echo $this->Paginator->counter(array(
//        'format' => __('Showing {:current} of {:count} records')
//    ));
    ?>

  </div>



  <div class="span4 right-side right" style="text-align: right;">

    <?php echo $this->Paginator->prev(__('Previous'), array('class' => 'prev')); ?>
    | <?php echo $this->Paginator->numbers(array('separator' => ' | ')); ?> |

    <?php echo $this->Paginator->next(__('Next'), array('class' => 'next'));
    ;
    ?>



  </div>

</div>
