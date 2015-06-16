<div class="dash">
    <div id="anav">
        <ul>
            <li><?php echo $this->Html->link("Dashboard", array("controller" => "users", "action" => "adash")); ?></li> |
            <li><?php echo $this->Html->link("Add User", array("controller" => "users", "action" => "add")); ?></li> |
            <li><?php echo $this->Html->link("View Users", array("controller" => "users", "action" => "index")); ?></li> |
            <li><?php echo $this->Html->link("Add Sector Document", array("controller" => "group_documents", "action" => "add")); ?></li> |
            <li><?php echo $this->Html->link("View Sector Documents", array("controller" => "group_documents", "action" => "index")); ?></li>
            <li>
                <ul>
                    <li><?php echo $this->Html->link("Add Tags", array("controller" => "tags", "action" => "add")); ?></li> |
                    <li><?php echo $this->Html->link("View Tags", array("controller" => "tags", "action" => "index")); ?></li> |
                    <li><?php echo $this->Html->link("Add Sectors", array("controller" => "groups", "action" => "add")); ?></li> |
                    <li><?php echo $this->Html->link("View Sectors", array("controller" => "groups", "action" => "index")); ?></li>
                </ul>
            </li>
        </ul>
    </div>
    <h2>Welcome to the Document Management Console</h2>
    <p>Site navigation is available using the above navigation bar.</p> 
    <p>User Data Analytics are available below:</p>
    <h3>Data Analytics</h3>
    <table>
        <thead>
            <tr>
                <th>Data Question</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Number of Users</td>
                <td>#data#</td>
            </tr>
            <tr>
                <td>Most popular Sector</td>
                <td>#data#</td>
            </tr>
            <tr>
                <td>Most popular Tag</td>
                <td>#data#</td>
            </tr>
            <tr>
                <td>Number of Support Page Clicks</td>
                <td>#data#</td>
            </tr>
        </tbody>
    </table>
</div>
<?php
//debug($uid);
?>