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
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="container">            
            <div id="header">
                <h1><?php echo $this->Html->link($cakeDescription, array("controller" => "Assets", "action" => "index")); ?></h1>
                <div class="top-nav-container">
                    <div class="top-nav">
                        <ul class="top-nav-links">
                        <li><?= $this->Html->link("users", array("controller" => "users", "action" => "index")) ?></li>
                        <li><?= $this->Html->link("user docs", array("controller" => "user_documents", "action" => "index")) ?></li>
                        <li><?= $this->Html->link("user dash", array("controller" => "user_documents", "action" => "udash")) ?></li>
                        <li><?= $this->Html->link("groups", array("controller" => "groups", "action" => "index")) ?></li>
                        <li><?= $this->Html->link("group docs", array("controller" => "group_documents", "action" => "index")) ?></li>
                        <li><?= $this->Html->link("tags", array("controller" => "tags", "action" => "index")) ?></li>
                        <li><?= $this->Html->link("user doc tags", array("controller" => "user_document_tags", "action" => "index")) ?></li>
                        <li><?= $this->Html->link("login", array("controller" => "users", "action" => "login")) ?></li>
                        <li><?= $this->Html->link("logout", array("controller" => "users", "action" => "logout")) ?></li>                                
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
