<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AddressBook_c extends CI_Controller {

    public function index() {
        $this->load->model('addressbook_m');
        $query = $this->addressbook_m->list_entries();

        $this->table->set_heading('Last Name', 'First Name', 'Middle Name', 'Address', 'Phone Number', '', '');

        foreach ($query as $row) {
            $edit = anchor(site_url("/addressbook_c/input/" . $row->id), "Edit");
            $delete = anchor("addressbook_c/delete/" . $row->id, "Delete", 
                    array('onclick' => "return confirm('Are you sure you want to delete this record?')"));
            $this->table->add_row(
                $row->last_name, 
                $row->first_name, 
                $row->middle_name, 
                $row->address, 
                $row->phone_number, 
                $edit, 
                $delete
            );
        }
        $tmpl = array('table_open' => '<table border="1" cellpadding="5" cellspacing="2" 
            style="width: 100%; margin: 0 auto; font-size: 12;">');
        $this->table->set_template($tmpl);
        $data['entries_list'] = $this->table->generate();
        $data['count'] = count($query) == 1 ? "<strong>" . count($query) . "</strong> Record" : 
            "<strong>" . count($query) . "</strong> records";
        $this->load->view('header_v');
        $this->load->view('listentries_v', $data);
    }

    public function input($id = 0) {
        $this->load->model('addressbook_m');
        $this->load->view('header_v');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_error_delimiters('<em>', '</em>');

        $id = $this->uri->segment(3);
        if ($this->input->post('submit')) {
            if ($this->form_validation->run()) {
                $current_id = $this->input->post( 'current_id' );
                if('' == $current_id) $this->addressbook_m->insert();
                else $this->addressbook_m->update($current_id);
                redirect('addressbook_c');
            }
        }
        if($id > 0) {
            $address_book = $this->addressbook_m->get_one($id);
            $data['address_book'] = $address_book;
        } else $data['address_book'] = false;
        $data['current_id'] = $id;
        $data['mode'] = ($id > 0 ? "Edit" : "Add");

        $this->load->view('entry_v', $data);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $this->load->model('addressbook_m');
        $this->addressbook_m->delete($id);
        $this->load->view('header_v');
        redirect('addressbook_c');
    }

}