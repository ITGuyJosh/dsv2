<div class="dash">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($user['User']['company']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>

<div class="related">
	<h3><?php echo __('Related User Documents'); ?></h3>
	<?php if (!empty($user['UserDocument'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Ver'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions" style="text-align: right"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserDocument'] as $userDocument): ?>
		<tr>
			<td><?php echo $userDocument['name']; ?></td>
			<td><?php echo $userDocument['ver']; ?></td>
			<td><?php echo $userDocument['created']; ?></td>
                        <td class="actions" style="text-align: right">
				<?php echo $this->Html->link(__('Download'), array('controller' => 'user_documents', 'action' => 'download', $userDocument['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_documents', 'action' => 'delete', $userDocument['id']), array(), __('Are you sure you want to delete : %s?', $userDocument['name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Document'), array('controller' => 'user_documents', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
</div>