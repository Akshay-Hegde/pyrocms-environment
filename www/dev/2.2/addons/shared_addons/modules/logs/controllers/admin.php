<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->language('logs');
        $this->load->helper('file');
        $this->load->helper('directory');
        $this->_folder = APPPATH . 'logs/';
    }

    public function index()
    {
        $logs = directory_map($this->_folder, 1);

        $logs = array_diff($logs, array('.', '..', 'index.php', 'index.html'));
        sort($logs);
        $logs = array_reverse($logs);

        $this->template->title($this->module_details['name'])
        ->set('folder', $this->_folder)
        ->set('logs', $logs)
        ->build('admin/index');
    }

    public function view($item = '')
    {
        $content = read_file($this->_folder.$item);
        $content OR redirect('admin/logs');

        $log = explode('ERROR - ', $content);
        unset($log[0]);

        $this->template->title($this->module_details['name'].': '.$item)
        ->set('log', $log)
        ->set('filename', $item)
        ->build('admin/view');
    }

    public function collapsed_view($item = '')
    {
        $content = read_file($this->_folder.$item);
        $content OR redirect('admin/logs');

        $log = explode('ERROR - ', $content);
        unset($log[0]);
        $i = 0;
        $new_log = array();
        foreach($log as $row)
        {
            $array = explode('  --> ', $row);
            if(!isset($array[1]))
                $array = explode(' --> ', $array[0]);
            $new_log[] = $array[1];
            //$new_log[$i]['date'] = $array[0];
            //$new_log[$i]['type'] = $array[1];
            $i++;
        }

        $log = array_unique($new_log);

        $this->template->title($this->module_details['name'].': '.$item)
        ->set('log', $log)
        ->set('filename', $item)
        ->build('admin/collapsed_view');
    }

    public function delete($item = '')
    {
        if ($this->input->post('action_to') && is_array($this->input->post('action_to')))
        {
            $array = $this->input->post('action_to');
            foreach ($array as $value)
            {
                if (file_exists($this->_folder . $value))
                    unlink($this->_folder . $value);
            }
            $this->session->set_flashdata('success', sprintf(lang('logs:message:delete_files:success'), count($array)));
        }
        else if (file_exists($this->_folder . $item))
        {
            if (unlink($this->_folder . $item))
                $this->session->set_flashdata('success', sprintf(lang('logs:message:delete_file:success'), $item));
            else
                $this->session->set_flashdata('error', lang('logs:message:delete_file:error'));
        }
        else
            $this->session->set_flashdata('error', lang('logs:message:error'));

        redirect('admin/logs');
    }

    public function delete_row($item = '', $row = '')
    {
        $content = read_file($this->_folder . $item);
        $content OR redirect('admin/logs');
        $log = explode('ERROR - ', $content);

        if($row != '')
            unset($log[$row]);
        else
        {
            foreach($_POST['action_to'] as $row)
                unset($log[$row]);
        }
        $content = implode('ERROR - ', $log);

        if ( ! write_file($this->_folder.$item, $content))
            $this->session->set_flashdata('error', lang('logs:message:delete_file:error'));
        else
            $this->session->set_flashdata('success', lang('logs:message:delete_file:success'));

        redirect('admin/logs/view/'.$item);
    }

}
