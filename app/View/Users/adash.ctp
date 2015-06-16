<div class="dash">
<div id="anav">
    <ul>
        <li><?php echo $this->Html->link("Dashboard", array("controller" => "users", "action" => "adash")); ?></li> |
        <li><?php echo $this->Html->link("Add User", array("controller" => "users", "action" => "add")); ?></li> |
        <li><?php echo $this->Html->link("View Users", array("controller" => "users", "action" => "index")); ?></li> |
        <li><?php echo $this->Html->link("Add Sector Document", array("controller" => "group_documents", "action" => "add")); ?></li> |
        <li><?php echo $this->Html->link("View Sector Documents", array("controller" => "group_documents", "action" => "index")); ?></li>
    </ul>
</div>
</div>    