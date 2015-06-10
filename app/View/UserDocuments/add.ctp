<div class="userDocuments form">
    <?php 
        echo $this->Form->create('UserDocument', array(
            "type" => "file"
        )); 
    ?>
    <fieldset>
        <legend><?php echo __('Add User Document'); ?></legend>
        <?php
//		echo $this->Form->input('user_id');
//		echo $this->Form->input('name');
//		echo $this->Form->input('dir');
//		echo $this->Form->input('ver');
            echo $this->Form->file("Documents");
        ?>
    </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List User Documents'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List User Document Tags'), array('controller' => 'user_document_tags', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User Document Tag'), array('controller' => 'user_document_tags', 'action' => 'add')); ?> </li>
    </ul>
</div>
