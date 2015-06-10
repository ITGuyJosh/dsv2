<div class="userDocumentTags view">
<h2><?php echo __('User Document Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userDocumentTag['UserDocumentTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Document'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userDocumentTag['UserDocument']['name'], array('controller' => 'user_documents', 'action' => 'view', $userDocumentTag['UserDocument']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userDocumentTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $userDocumentTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userDocumentTag['UserDocumentTag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userDocumentTag['UserDocumentTag']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Document Tag'), array('action' => 'edit', $userDocumentTag['UserDocumentTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Document Tag'), array('action' => 'delete', $userDocumentTag['UserDocumentTag']['id']), array(), __('Are you sure you want to delete # %s?', $userDocumentTag['UserDocumentTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Document Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Document Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Documents'), array('controller' => 'user_documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Document'), array('controller' => 'user_documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
