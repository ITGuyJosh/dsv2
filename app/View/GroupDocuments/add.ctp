<div class="addDoc">
    <?php
    echo $this->Form->create('GroupDocument', array(
        "type" => "file"
    ));
    ?>
    <fieldset>
        <legend><?php echo __('Upload a Group Document'); ?></legend>
        <?php
        echo $this->Form->input('group_id');
        echo $this->Form->file("Documents");
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>