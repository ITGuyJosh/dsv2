<div class="groupDocuments view">
<h2><?php echo __('Group Document'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupDocument['GroupDocument']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupDocument['Group']['name'], array('controller' => 'groups', 'action' => 'view', $groupDocument['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($groupDocument['GroupDocument']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($groupDocument['GroupDocument']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ver'); ?></dt>
		<dd>
			<?php echo h($groupDocument['GroupDocument']['ver']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($groupDocument['GroupDocument']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($groupDocument['GroupDocument']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group Document'), array('action' => 'edit', $groupDocument['GroupDocument']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group Document'), array('action' => 'delete', $groupDocument['GroupDocument']['id']), array(), __('Are you sure you want to delete # %s?', $groupDocument['GroupDocument']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Documents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
