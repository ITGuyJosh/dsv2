<div class="dash">
    <div id="anav">
        <ul>
            <li><?php echo $this->Html->link("Dashboard", array("controller" => "users", "action" => "adash")); ?></li> |
            <li><?php echo $this->Html->link("Add User", array("controller" => "users", "action" => "add")); ?></li> |
            <li><?php echo $this->Html->link("View Users", array("controller" => "users", "action" => "index")); ?></li> |
            <li><?php echo $this->Html->link("Add Sector Document", array("controller" => "group_documents", "action" => "add")); ?></li> |
            <li><?php echo $this->Html->link("View Sector Documents", array("controller" => "group_documents", "action" => "index")); ?></li>
            <li>
                <ul>
                    <li><?php echo $this->Html->link("Add Tags", array("controller" => "tags", "action" => "add")); ?></li> |
                    <li><?php echo $this->Html->link("View Tags", array("controller" => "tags", "action" => "index")); ?></li> |
                    <li><?php echo $this->Html->link("Add Sectors", array("controller" => "groups", "action" => "add")); ?></li> |
                    <li><?php echo $this->Html->link("View Sectors", array("controller" => "groups", "action" => "index")); ?></li>
                </ul>
            </li>
        </ul>
    </div>
    <h2><?php echo __('Users'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th><?php echo $this->Paginator->sort('email'); ?></th>
                <th><?php echo $this->Paginator->sort('company'); ?></th>
                <th><?php echo $this->Paginator->sort('password'); ?></th>
                <th><?php echo $this->Paginator->sort('role'); ?></th>
                <th><?php echo $this->Paginator->sort('group_id'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['company']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['password']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                    </td>
                    <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>