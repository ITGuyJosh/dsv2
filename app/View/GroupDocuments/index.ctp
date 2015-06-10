<div class="groupDocuments index">
	<h2><?php echo __('Group Documents'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('dir'); ?></th>
			<th><?php echo $this->Paginator->sort('ver'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($groupDocuments as $groupDocument): ?>
	<tr>
		<td><?php echo h($groupDocument['GroupDocument']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($groupDocument['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupDocument['Group']['id'])); ?>
		</td>
		<td><?php echo h($groupDocument['GroupDocument']['name']); ?>&nbsp;</td>
		<td><?php echo h($groupDocument['GroupDocument']['dir']); ?>&nbsp;</td>
		<td><?php echo h($groupDocument['GroupDocument']['ver']); ?>&nbsp;</td>
		<td><?php echo h($groupDocument['GroupDocument']['created']); ?>&nbsp;</td>
		<td><?php echo h($groupDocument['GroupDocument']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $groupDocument['GroupDocument']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $groupDocument['GroupDocument']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $groupDocument['GroupDocument']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $groupDocument['GroupDocument']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Group Document'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
