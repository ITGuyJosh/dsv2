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
