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
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
