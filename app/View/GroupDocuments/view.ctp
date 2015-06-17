<div class="dash">
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
