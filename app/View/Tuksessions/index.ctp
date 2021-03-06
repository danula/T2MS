<div class="tuksessions index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Tuksessions'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->



    <div class="row">

        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Tuksession'), array('action' => 'add'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Vehicles'), array('controller' => 'vehicles', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Vehicle'), array('controller' => 'vehicles', 'action' => 'add'), array('escape' => false)); ?> </li>
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('vehicleID'); ?></th>
                    <th><?php echo $this->Paginator->sort('localityID'); ?></th>
                    <th><?php echo $this->Paginator->sort('startTime'); ?></th>
                    <th><?php echo $this->Paginator->sort('endTime'); ?></th>
                    <th><?php echo $this->Paginator->sort('status'); ?></th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tuksessions as $tuksession): ?>
                    <tr>
                        <td>
                            <?php echo $this->Html->link($tuksession['Vehicle']['vehicleNum'], array('controller' => 'vehicles', 'action' => 'view', $tuksession['Vehicle']['id'])); ?>
                        </td>
                        <td>
                            <?php echo $this->Html->link($tuksession['Locality']['name'], array('controller' => 'localities', 'action' => 'view', $tuksession['Locality']['id'])); ?>
                        </td>
                        <td><?php echo h($tuksession['Tuksession']['startTime']); ?>&nbsp;</td>
                        <td><?php echo h($tuksession['Tuksession']['endTime']); ?>&nbsp;</td>
                        <td><?php if($tuksession['Tuksession']['endTime']!=null) echo 'Finished'; else if($tuksession['Tuksession']['status']==null) echo 'Not on a trip'; else{echo 'On a trip';} ?>&nbsp;</td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $tuksession['Tuksession']['vehicleID'],str_replace(':','-',h($tuksession['Tuksession']['startTime']))
                            ), array('escape' => false)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $tuksession['Tuksession']['vehicleID'],str_replace(':','-',h($tuksession['Tuksession']['startTime']))
                            ), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $tuksession['Tuksession']['vehicleID'],str_replace(':','-',h($tuksession['Tuksession']['startTime']))), array('escape' => false), __('Are you sure you want to delete tuksession of %s?', $tuksession['Vehicle']['vehicleNum'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
            </p>

            <?php
            $params = $this->Paginator->params();
            if ($params['pageCount'] > 1) {
                ?>
                <ul class="pagination pagination-sm">
                    <?php
                    echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
                    ?>
                </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->