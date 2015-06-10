<div class="groupDocuments form">
<?php echo $this->Form->create('GroupDocument'); ?>
	<fieldset>
		<legend><?php echo __('Edit Group Document'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('name');
		echo $this->Form->input('dir');
		echo $this->Form->input('ver');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GroupDocument.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('GroupDocument.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Group Documents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
