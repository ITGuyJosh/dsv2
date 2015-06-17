<div class="dash">
    
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
