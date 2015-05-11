<?php
namespace Loyalty\Model;

class User {
    protected $_table = "Users";
    protected $_id;
    var $UserName;
    var $Password;
    var $Admin;

    public function __construct($UserName, $Password, $Admin) {
        $this->UserName = $UserName;
        $this->Password = password_hash($Password, PASSWORD_DEFAULT);
        $this->Admin = $Admin;
    }

    public static function Hydrate($id, $UserName, $Password, $Admin) {
        $result = new User($UserName, $Password, $Admin);
        $result->_id = $id;
        $result->Password = $Password;
        return $result;
    }

    public function id() {
        return $this->_id;
    }

    public function table() {
        return $this->_table;
    }
}
