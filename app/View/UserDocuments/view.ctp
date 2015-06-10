<div class="userDocuments view">
<h2><?php echo __('User Document'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userDocument['UserDocument']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userDocument['User']['id'], array('controller' => 'users', 'action' => 'view', $userDocument['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($userDocument['UserDocument']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($userDocument['UserDocument']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ver'); ?></dt>
		<dd>
			<?php echo h($userDocument['UserDocument']['ver']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userDocument['UserDocument']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userDocument['UserDocument']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Document'), array('action' => 'edit', $userDocument['UserDocument']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Document'), array('action' => 'delete', $userDocument['UserDocument']['id']), array(), __('Are you sure you want to delete # %s?', $userDocument['UserDocument']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Documents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Document Tags'), array('controller' => 'user_document_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Document Tag'), array('controller' => 'user_document_tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related User Document Tags'); ?></h3>
	<?php if (!empty($userDocument['UserDocumentTag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Document Id'); ?></th>
		<th><?php echo __('Tag Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userDocument['UserDocumentTag'] as $userDocumentTag): ?>
		<tr>
			<td><?php echo $userDocumentTag['id']; ?></td>
			<td><?php echo $userDocumentTag['user_document_id']; ?></td>
			<td><?php echo $userDocumentTag['tag_id']; ?></td>
			<td><?php echo $userDocumentTag['created']; ?></td>
			<td><?php echo $userDocumentTag['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_document_tags', 'action' => 'view', $userDocumentTag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_document_tags', 'action' => 'edit', $userDocumentTag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_document_tags', 'action' => 'delete', $userDocumentTag['id']), array(), __('Are you sure you want to delete # %s?', $userDocumentTag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Document Tag'), array('controller' => 'user_document_tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
