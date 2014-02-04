<section class="title">
    <h4><?php echo lang('logs:label:logs'); ?></h4>
</section>

<section class="item">
    <?php echo form_open('admin/logs/delete'); ?>
    <fieldset>
        <?php if (!empty($logs)): ?>
            <div class="scrollable">
                <table>
                    <thead>
                        <tr>
                            <th><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all')); ?></th>
                            <th><?php echo lang('logs:label:name'); ?></th>
                            <th><?php echo lang('logs:label:size'); ?></th>
                            <th><?php echo lang('logs:label:date'); ?></th>
                            <th><?php echo lang('logs:label:actions'); ?></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php for ($i = 0; $i < count($logs); $i++): ?>
                            <tr>
                                <td><?php echo form_checkbox('action_to[]', $logs[$i]); ?></td>
                                <td><?php echo $logs[$i]; ?></td>
                                <td><?php echo filesize($folder . $logs[$i]); ?></td>
                                <td><?php echo format_date(filemtime($folder . $logs[$i])); ?></td>
                                <td class="actions">
                                    <?php
                                    echo
                                    anchor('admin/logs/view/' . $logs[$i], lang('logs:label:view'), 'class="button"') . ' ' .
                                    anchor('admin/logs/collapsed_view/' . $logs[$i], lang('logs:label:collapsed_view'), 'class="button"') . ' ' .
                                    anchor('admin/logs/delete/' . $logs[$i], lang('logs:label:delete'), array('class' => 'button confirm'));
                                    ?>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>

            <div class="table_action_buttons">
                <?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete'))); ?>
            </div>

        <?php else: ?>
            <div class="no_data"><?php echo lang('logs:message:no_items'); ?></div>
        <?php endif; ?>
    </fieldset>
    <?php echo form_close(); ?>
</section>