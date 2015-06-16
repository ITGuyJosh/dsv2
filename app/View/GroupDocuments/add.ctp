<div class="addDoc">
    
    <?php 
        echo $this->Form->create('GroupDocument', array(
            "type" => "file"
        )); 
    ?>
    <fieldset>
        <legend><?php echo __('Upload a Sector Document'); ?></legend>
        <span class="actions" style="float: right; margin-bottom: 10px;"><?php echo $this->Html->link("Dashboard", array("controller" => "users","action" => "adash"), $uid); ?></span>
        <?php
            echo $this->Form->input('group_id');
            echo $this->Form->file("Documents");
        ?>
    </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
</div>