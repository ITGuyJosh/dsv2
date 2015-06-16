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
<h2><?php echo __('Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
