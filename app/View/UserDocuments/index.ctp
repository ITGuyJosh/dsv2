<div class="userDocuments index">
	<h2><?php echo __('User Documents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('dir'); ?></th>
			<th><?php echo $this->Paginator->sort('ver'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($userDocuments as $userDocument): ?>
	<tr>
		<td><?php echo h($userDocument['UserDocument']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userDocument['User']['id'], array('controller' => 'users', 'action' => 'view', $userDocument['User']['id'])); ?>
		</td>
		<td><?php echo h($userDocument['UserDocument']['name']); ?>&nbsp;</td>
		<td><?php echo h($userDocument['UserDocument']['dir']); ?>&nbsp;</td>
		<td><?php echo h($userDocument['UserDocument']['ver']); ?>&nbsp;</td>
		<td><?php echo h($userDocument['UserDocument']['created']); ?>&nbsp;</td>
		<td><?php echo h($userDocument['UserDocument']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userDocument['UserDocument']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userDocument['UserDocument']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userDocument['UserDocument']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userDocument['UserDocument']['id']))); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Document'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Document Tags'), array('controller' => 'user_document_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Document Tag'), array('controller' => 'user_document_tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
