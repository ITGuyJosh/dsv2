<?php 
    //debug($gDocs); 
?>

<table>
        <thead>
            <tr>
                <th><?php echo "Assigned Documents"; ?></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gDocs as $gDoc): ?>
                <tr>
                    <td><?php echo h($gDoc['GroupDocument']['name']); ?>&nbsp;</td>
                    <td class="actions" style="text-align: center;">
                        <?php echo $this->Html->link(__('Download'), array('action' => 'download', $gDoc['GroupDocument']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>