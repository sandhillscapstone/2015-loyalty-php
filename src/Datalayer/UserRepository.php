<?php
namespace Loyalty\Datalayer;
use \Loyalty\Model\User;

class UserRepository {
    protected $db;

    public function __construct(\PDO &$db) {
        $this->db = $db;
    }

    public function Get($id) {
        $sql = <<<EOT
            select id, UserName, Password, Admin from Users
            where id = :id
EOT;

        $statement = $this->db->prepare($sql);
        $dbresult = $statement->execute(array("id" => $id));
        if ($dbresult == null) {
            return new User("","","",0);
        }
        $dbrow = $statement->fetch();
        $result = \Loyalty\Model\User::Hydrate($id,
            $dbrow['UserName'], $dbrow['Password'], $dbrow['Admin']);
        return $result;
    }

    public function GetAll() {
        $sql = <<<EOT
            select id, UserName, Password, Admin from Users
EOT;

        $statement = $this->db->prepare($sql);

        $dbresult = $statement->execute();
        if ($dbresult) {
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function GetByUserName($username) {
        $sql = <<<EOT
            select id, UserName, Password, Admin from Users
            where UserName = :UserName
EOT;
        $statement = $this->db->prepare($sql);
        $dbresult = $statement->execute(array("UserName" => $username));
        if ($dbresult == null) {
            return new User("","","",0);
        }
        $dbrow = $statement->fetch();
        $result = User::Hydrate($dbrow['id'],
            $dbrow['UserName'], $dbrow['Password'], $dbrow['Admin']);
        return $result;
    }

    public function Save(\Loyalty\Model\User $record) {
        if ($record->id() == null) {
            $sql = <<<EOT
                insert into Users (UserName, Password, Admin)
                values (:UserName, :Password, :Admin)
EOT;

            $statement = $this->db->prepare($sql);

            $params = array('UserName' => $record->UserName,
                'Password' => $record->Password,
                'Admin' => $record->Admin);

        } else {
            $sql = <<<EOT
                UPDATE Users
                SET `Time` = :Time, `User` = :User, `Point` = :Point
                where id = :id
EOT;

            $statement = $this->db->prepare($sql);

            $params = array('UserName' => $record->UserName,
                'Password' => $record->Password,
                'Admin' => $record->Admin,
                'id' => $record->id());
        }

        return $statement->execute($params);
    }

    public function Delete($id) {
        $sql = "delete from Users where id = :id";
        $statement = $this->db->prepare($sql);

        $params = array('id' => $id);

        return $statement->execute($params);
    }
}
