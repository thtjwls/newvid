<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->dbforge();
    }

    public function dbforge()
    {
        $sql = "CREATE TABLE 
                IF NOT EXISTS `ci_session` (
                session_id varchar(40) DEFAULT '0' NOT NULL,
                ip_address varchar(16) NOT NULL,
                user_agent varchar(50) NOT NULL,
                last_activity int unsigned DEFAULT 0 NOT NULL,
                user_data text NOT NULL,
                PRIMARY KEY (session_id)
                );
                ";

        $this->db->query($sql,TRUE);
        $this->db->result();
    }

    public function members()
    {

    }

    public function membersTable()
    {

    }

}
