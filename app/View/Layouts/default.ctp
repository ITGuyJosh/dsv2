<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Document Store');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('docstore.generic');
        echo $this->Html->script('jquery');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="container">            
            <div id="header">
                <h1><?php echo $this->Html->link($cakeDescription, array("controller" => "Users", "action" => "login")); ?></h1>
                <div class="top-nav-container">
                    <div id="anav">
                        <ul>
                            <li><?php echo $this->Html->link("Dashboard", array("controller" => "users", "action" => "adash"));?></li> 
                            <li><?php echo $this->Html->link("Add User", array("controller" => "users", "action" => "add")); ?></li>
                            <li><?php echo $this->Html->link("View Users", array("controller" => "users", "action" => "index")); ?></li>
                            <li><?php echo $this->Html->link("Add Group Document", array("controller" => "group_documents", "action" => "add"));?></li>
                            <li><?php echo $this->Html->link("Add Tags", array("controller" => "tags", "action" => "add"));?></li>
                            <li>
                                <ul>                                    
                                    <li><?php echo $this->Html->link("View Tags", array("controller" => "tags", "action" => "index"));?></li>
                                    <li><?php echo $this->Html->link("Add Groups", array("controller" => "groups", "action" => "add"));?></li>
                                    <li><?php echo $this->Html->link("View Groups", array("controller" => "groups", "action" => "index"));?></li>
                                    <li><?php echo $this->Html->link("Logout", array("controller" => "users", "action" => "logout"));?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="content">

                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">

            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>
