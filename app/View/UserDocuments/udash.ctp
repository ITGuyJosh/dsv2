<div class="dash">
    <h2 style="margin-bottom: 0px;"><?php echo __('Documents'); ?></h2>
    
    <span class="actions" style="float: right; margin-bottom: 10px;"><?php echo $this->Html->link("Upload Document", array("action" => "add")); ?></span>
    <span class="actions" style="float: right; margin-bottom: 10px;"><?php echo $this->Html->link("Assigned Documents", array("controller" => "group_documents", "action" => "ugroup", $uid)); ?></span>
    <table id="uDocs">
        <thead>
            <tr>
                <th><?php echo "Document"; ?></th>
                <th style="text-align: center;"><?php echo "Tags"; ?></th>
                <th style="text-align: center;"><?php echo "Version"; ?></th>
                <th class="actions" style="text-align: center;"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uDocs as $uDoc): ?>
                <tr>
                    <td><?php echo h($uDoc['UserDocument']['name']); ?>&nbsp;</td>
                    <td style="text-align: center;"><?php echo h(implode(", ", $uDoc['Tags']));   ?>&nbsp;</td>
                    <td style="text-align: center;"><?php echo h($uDoc['UserDocument']['ver']); ?>&nbsp;</td>
                    <td class="actions" style="text-align: center;">
                        <?php echo $this->Html->link(__('Download'), array('action' => 'download', $uDoc['UserDocument']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uDoc['UserDocument']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $uDoc['UserDocument']['name']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
echo $this->Html->css('jquery.dataTables.min');
echo $this->Html->script('jquery.dataTables.min');
?>    
<script>
    $(document).ready(function () {
        $("#uDocs").DataTable();
    });
</script>    