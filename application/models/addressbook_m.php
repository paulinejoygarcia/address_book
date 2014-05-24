<?php

class Addressbook_m extends CI_Model {

    function list_entries() {
        $this->create_table();
        $query = $this->db->get('address_books');
        return $query->result();
    }
    
    function insert() {
        $address_book = array(
            'first_name' => $this->input->post( 'first_name' ),
            'middle_name' => $this->input->post( 'middle_name' ),
            'last_name' => $this->input->post( 'last_name' ),
            'address' => $this->input->post( 'address' ),
            'phone_number' => $this->input->post( 'phone_number' )
        );
        $this->db->insert('address_books',$address_book);
    }
    
    function update($id) {
        $address_book = array(
            'first_name' => $this->input->post( 'first_name' ),
            'middle_name' => $this->input->post( 'middle_name' ),
            'last_name' => $this->input->post( 'last_name' ),
            'address' => $this->input->post( 'address' ),
            'phone_number' => $this->input->post( 'phone_number' )
        );
        $this->db->where('id', $id);
        $this->db->update('address_books', $address_book); 
    }
    
    function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('address_books');
    }
    
    function get_one($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('address_books');
        return $query->row();
    }

    function create_table() {
        $this->load->dbforge();

        $fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'middle_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'address' => array(
                'type' => 'VARCHAR',
                'constraint' => '1000'
            ),
            'phone_number' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            )
        );
        $this->dbforge->add_field($fields);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('address_books', TRUE);
    }

}

?>
