<?php
namespace Loyalty\Controller;

class Customers {

    protected $app;

    public function __construct(&$app) {
        $this->app = $app;
        $app->get('/search', array($this, 'search'));
        $app->post('/search/getcustomers', array($this, 'getCustomers'));
        $app->get('/search/getcustomers', array($this, 'getCustomers'));
        $app->get('/customers/add', array($this, 'add'));
        $app->post('/customers/add', array($this, 'add_post'));
        $app->get('/customers/edit/:id', array($this, 'edit'));
        $app->post('/customers/edit/:id', array($this, 'edit_post'));
    }

    public function search() {
        $searchText = $this->app->request->get('searchText');
        $this->app->render('search.html', array('searchText' => $searchText));
    }

    public function getCustomers() {
        $searchString = $this->app->request->params('searchString');
        if (strlen($searchString) < 2) {
            return;
        }

        $sql = <<<EOT
            select CustomerID, FirstName, LastName, Telephone, Points from Customers
            where CONCAT(FirstName, ' ', LastName) like :searchString 
            or LastName like :searchString or Telephone like :searchString LIMIT 10
EOT;

        $statement = $this->app->db->prepare($sql);
        $params = array('searchString' => $searchString . '%');

        $statement->execute($params);
        if ($statement){
            foreach($statement as $row){
                $freebieUrl = "/freebies/" . $row['CustomerID'];
                echo "<table><tr>" .
                    "<td><a href='" . $freebieUrl . "'>" . $row["FirstName"] . " " . $row["LastName"] ."</a></td>" .
                    "<td><a href='" . $freebieUrl . "'>" . $row["Telephone"]. "</a></td>" .
                    "<td><a href='/customers/edit/".$row['CustomerID']."'>(Edit)</a></td>" .
                    "</tr></table>";
            }
        }
    }

    public function add() {
        $this->app->render('customer-add.html');
    }

    public function add_post() {
        $firstname = $this->app->request->post('firstname');
        $lastname = $this->app->request->post('lastname');
        $telephone = $this->app->request->post('telephone');
        $points = $this->app->request->post('points');
        $email = $this->app->request->post('email');

        $telephone = preg_replace("/[^0-9]/", "", $telephone); //remove any non-digit chars

        //TODO mysql_real_escape_string would not work for me
        //$firstname = mysql_real_escape_string($firstname);
        //$lastname = mysql_real_escape_string($lastname);
        //$telephone = mysql_real_escape_string($telephone);
        //$points = mysql_real_escape_string($points);
        //$email = mysql_real_escape_string($email);

        $sql = "insert into Customers (Firstame, LastName, Points, Telephone, Email)" .
            "values (:fname, :lname, :points, :telephone, :email)";
        $statement = $this->app->db->prepare($sql);

        $params = array( 'fname' => $firstname,
            'lname' => $lastname,
            'points' => $points,
            'telephone' => $telephone,
            'email' => $email);

        $queryComplete = $statement->execute($params);

        if ($queryComplete){
            echo "<h1>Success</h1>" .
                "<p>You have added a customer to the database, their name is $firstname $lastname, " .
                "with $points points, and number $telephone, with email $email</p>";
        } else {
            echo "<h1>Error:</h1>" .
                "<h2>SQL statement:</h2>" .
                "<pre>" .$sql. "</pre>" .
                "<h2>PDO::errorInfo():</h2>" .
                "<pre>";
            print_r($statement->errorInfo());
            echo "</pre>";
        }
        echo "<h2>Back to <a href='/customers/add'>Add Customer</a>";
    }

    public function edit($id) {
        $sql = "select FirstName, LastName, Points, Telephone, Email, Points from Customers " .
            " where CustomerID = :customerid;";
        $statement = $this->app->db->prepare($sql);
        $params = array('customerid' => $id);
        $queryComplete = $statement->execute($params);
        $row = $statement->fetch();
        $this->app->render('customer-edit.html', array('id' => $id, 'Customer' => $row));
    }

    public function edit_post($id) {
        $firstname = $this->app->request->post('firstname');
        $lastname = $this->app->request->post('lastname');
        $telephone = $this->app->request->post('telephone');
        $points = $this->app->request->post('points');
        $email = $this->app->request->post('email');

        //$firstname = mysql_real_escape_string($firstname);
        //$lastname = mysql_real_escape_string($lastname);
        //$telephone = mysql_real_escape_string($telephone);
        //$points = mysql_real_escape_string($points);
        //$email = mysql_real_escape_string($email);

        if (isset($_POST['save'])) {

            $sql = <<<EOT
                UPDATE Customers
                SET FirstName = :fname, LastName = :lname, Points = :points, Telephone = :telephone, Email= :email
                where CustomerID = :customerid
EOT;

            $statement = $this->app->db->prepare($sql);

            $params = array('fname' => $firstname,
                'lname' => $lastname,
                'points' => $points,
                'telephone' => $telephone,
                'email' => $email,
                'customerid' => $id);

            $queryComplete = $statement->execute($params);
        }

        else if (isset($_POST['delete'])) {
            $sql = "delete from Customers where CustomerID = :customerid";
            $statement = $this->app->db->prepare($sql);

            $params = array('customerid' => $id);

            $queryComplete = $statement->execute($params);
        }

        if ($queryComplete) {
            header("refresh:3;url=/search?searchText=$firstname $lastname");
            echo "<h1>You will be redirected in 3 seconds.  <br>  You have updated a customer in the database, their name is $firstname $lastname , with $points points, and number $telephone, with email $email</h1>";
        } else {
            echo "Error: " .$sql. "<br>" . "PDO::errorInfo():\n";
            print_r($statement->errorInfo());
        }
    }
}
