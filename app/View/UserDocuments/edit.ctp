<div class="userDocuments form">
<?php echo $this->Form->create('UserDocument'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Document'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserDocument.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UserDocument.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Documents'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Document Tags'), array('controller' => 'user_document_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Document Tag'), array('controller' => 'user_document_tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
