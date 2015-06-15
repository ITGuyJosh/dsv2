<div class="udash">
	<h2><?php echo __('Documents'); ?></h2>
        <div class="actions" style="float: right;"><?php echo $this->Html->link("Upload Document", array("action" => "add")); ?></div>
	<table>
	<thead>
	<tr>
			<th><?php echo "Document"; ?></th>
			<th><?php echo "Tags"; ?></th>
			<th><?php echo "Version"; ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($uDocs as $uDoc): ?>
	<tr>
		<td><?php echo h($uDoc['UserDocument']['name']); ?>&nbsp;</td>
		<td><?php //echo h($userDocument['UserDocument']['dir']); ?>&nbsp;</td>
		<td><?php echo h($uDoc['UserDocument']['ver']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Download'), array('action' => 'download', $uDoc['UserDocument']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uDoc['UserDocument']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $uDoc['UserDocument']['name']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>

<?php
    //debug($uDocs);

?>
