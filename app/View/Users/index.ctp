<div class="dash">
    <h2><?php echo __('Users'); ?></h2>
    <table id="uTable">
        <thead>
            <tr>
                <th><?php echo "Username";?></th>
                <th><?php echo "Email";?></th>
                <th><?php echo "Company";?></th>
                <th><?php echo "Role"; ?></th>
                <th><?php echo "Group" ?></th>
                <th class="actions" style="text-align: center;"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['company']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete : %s?', $user['User']['username']))); ?>
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
        $("#uTable").DataTable();
    });
</script>    