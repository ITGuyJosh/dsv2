<div class="userDocumentTags form">
<?php echo $this->Form->create('UserDocumentTag'); ?>
	<fieldset>
		<legend><?php echo __('Add User Document Tag'); ?></legend>
	<?php
		echo $this->Form->input('user_document_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List User Document Tags'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Documents'), array('controller' => 'user_documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Document'), array('controller' => 'user_documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
