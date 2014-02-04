<section class="title">
    <h4><?php echo lang('global:' . $this->method) . ' ' . $filename; ?> </h4>
</section>

<section class="item">
    <fieldset>
        <pre class="scrollable">
            <table>
                <thead>
                    <tr>
                        <th><?php echo lang('logs:label:error'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($log as $key => $value):?>
                        <tr>
                            <td><?php echo $value; ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </pre>
        <div class="buttons">
            <?php $this->load->view('admin/partials/buttons', array('buttons' => array('cancel'))); ?>
        </div>
    </fieldset>
</section>