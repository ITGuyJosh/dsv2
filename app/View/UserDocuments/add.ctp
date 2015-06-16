<div class="addDoc">
    <?php 
        echo $this->Form->create('UserDocument', array(
            "type" => "file"
        )); 
    ?>
    <fieldset>
        <legend><?php echo __('Upload a Document'); ?></legend>
        <span class="actions" style="float: right; margin-bottom: 10px;"><?php echo $this->Html->link("Dashboard", array("controller" => "user_documents","action" => "udash"), $uid); ?></span>
        <?php
            echo $this->Form->file("Documents");
            echo $this->Form->input("Tags", array(
                "type" => "select",
                "multiple" => "checkbox",
                "options" => $tags
            ));
        ?>
    </fieldset>
        <?php echo $this->Form->end(__('Submit')); ?>
</div>
