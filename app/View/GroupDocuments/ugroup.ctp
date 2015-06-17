<?php
?>
<div class="dash">
    <h2 style="margin-bottom: 0px;"><?php echo __('Assigned Documents'); ?></h2>
    
    <span class="actions" style="float: right; margin-bottom: 10px;"><?php echo $this->Html->link("Upload Document", array("controller" => "user_documents" ,"action" => "add")); ?></span>
    <span class="actions" style="float: right; margin-bottom: 10px;"><?php echo $this->Html->link("Dashboard", array("controller" => "user_documents","action" => "udash"), $uid); ?></span>
    <table id="gDocs">
        <thead>
            <tr>
                <th><?php echo "Assigned Documents"; ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gDocs as $gDoc): ?>
                <tr>
                    <td><?php echo h($gDoc['GroupDocument']['name']); ?>&nbsp;</td>
                    <td class="actions" style="text-align: center;">
                        <?php echo $this->Html->link(__('Download'), array('action' => 'download', $gDoc['GroupDocument']['id'])); ?>
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
        $("#gDocs").DataTable();
    });
</script>    