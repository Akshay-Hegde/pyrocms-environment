<section class="title">
    <h4><?php echo lang('global:' . $this->method) . ' ' . $filename;?> </h4>
</section>

<section class="item">
    <fieldset>
        <?php echo form_open('admin/logs/delete_row/'.$filename);?>

        <pre class="scrollable">
            <table>
                <thead>
                    <tr>
                        <th><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all'));?></th>
                        <th><?php echo lang('logs:label:error');?></th>
                        <th><?php echo lang('logs:label:actions');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($log as $key => $value):?>
                        <tr>
                            <td><?php echo form_checkbox('action_to[]', $key);?></td>
                            <td><?php echo $value;?></td>
                            <td class="actions">
                                <?php
                                echo
                                anchor('admin/logs/delete_row/'.$filename.'/'.$key, lang('logs:label:delete'), array('class' => 'button confirm'));
                                ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </pre>

        <div class="table_action_buttons">
            <?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete', 'cancel')));?>
        </div>

        <?php echo form_close();?>
    </fieldset>
</section>