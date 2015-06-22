<div class="dash">
    
<h2><?php echo __('Group'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($group['Group']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</dd>
	</dl>

<div class="related">
	<h3><?php echo __('Related Group Documents'); ?></h3>
	<?php if (!empty($group['GroupDocument'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th class="actions" style="text-align: right;"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($group['GroupDocument'] as $groupDocument): ?>
		<tr>
			<td><?php echo $groupDocument['name']; ?></td>
			<td class="actions" style="text-align: right;">
				<?php echo $this->Html->link(__('Download'), array('controller' => 'group_documents', 'action' => 'download', $groupDocument['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'group_documents', 'action' => 'delete', $groupDocument['id']), array(), __('Are you sure you want to delete # %s?', $groupDocument['name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Group Document'), array('controller' => 'group_documents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($group['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Company'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th class="actions" style="text-align: right;"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['company']; ?></td>
			<td><?php echo $user['role']; ?></td>
                        <td class="actions" style="text-align: right;">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['username'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
</div>