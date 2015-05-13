<?php
namespace Loyalty\Controller;
use \Loyalty\Datalayer\CustomerRepository;

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
        $this->app->requiresLogin;
        $searchText = $this->app->request->get('searchText');
        $this->app->render('search.html', array('searchText' => $searchText));
    }

    public function getCustomers() {
        $this->app->requiresLogin;
        $searchString = $this->app->request->params('searchString');
        if (strlen($searchString) < 2) {
            return;
        }

        $CustomerRepository = new CustomerRepository($this->app->db);
        $results = $CustomerRepository->RawFuzzySearch($searchString);

        if ($results){
            echo "<br>";
            echo "<div style='width:60%;margin-right:auto;margin-left:auto;'>";
            $counter = 0;
            $bgcolor = array("#D8D8D8", "#848484");
            foreach($results as $row){
                $counter++;
                $telephone = substr($row["Telephone"],0,3) . '-' . substr($row["Telephone"],3,3) . '-' . substr($row["Telephone"], 6);
                $freebieUrl = "/freebies/" . $row['CustomerID'];
                echo "<div style='background-color:" . $bgcolor[$counter % 2] . ";width:100%;'>";
                echo "<a href= '" . $freebieUrl . " ' style='text-decoration:none; color:black; font-size:30px;'>
                        <div style='display:inline-block;background-color:" . $bgcolor[$counter % 2] . ";padding:5px;'>
                        " . $row["FirstName"] . " " . $row["LastName"] . " " . $telephone. "
                        </div >
                    </a>";
                echo "<a href= '/customers/edit/". $row["CustomerID"] . "' style='float:right;text-decoration:none; color:black; font-size:30px;'><div style='background-color:" . $bgcolor[$counter % 2] . ";padding:5px;'>Edit</div></a>";
                echo "</div>";
            }
            echo "</div>";
        }
    }

    public function add() {
        $this->app->requiresLogin;
        $this->app->render('customer-add.html');
    }

    public function add_post() {
        $this->app->requiresLogin;
        $firstname = $this->app->request->post('firstname');
        $lastname = $this->app->request->post('lastname');
        $telephone = $this->app->request->post('telephone');
        $points = $this->app->request->post('points');
        $email = $this->app->request->post('email');
        if ($this->app->request->post('donor') === null) {
            $donor = false;
        } else {
            $donor = true;
        }

        $telephone = preg_replace("/[^0-9]/", "", $telephone); //remove any non-digit chars

        $databag = array('FirstName' => $firstname,
            'LastName' => $lastname,
            'Telephone' => $telephone,
            'Points' => $points,
            'Email' => $email,
            'Donor' => $donor,
            'posted' => true);

        if ($this->IsNullOrEmptyString($firstname) ||
            $this->IsNullOrEmptyString($lastname) ||
            $this->IsNullOrEmptyString($telephone)) {
            $this->app->render('customer-add.html', array('Customer' => $databag));
            $this->app->stop();
        }

        $Customer = new \Loyalty\Model\Customer($firstname, $lastname, $telephone, $email, $points, $donor);
        $CustomerRepository = new CustomerRepository($this->app->db);

        $queryComplete = $CustomerRepository->Save($Customer);

        if ($queryComplete){
            $this->app->redirect("/search?searchText=$firstname $lastname");
        } else {
            $this->app->render('customer-add.html', array('Customer' => $databag));
            $this->app->stop();
        }
    }

    public function edit($id) {
        $this->app->requiresLogin;
        $CustomerRepository = new CustomerRepository($this->app->db);
        $Customer = $CustomerRepository->Get($id);
        $this->app->render('customer-edit.html', array('id' => $id, 'Customer' => $Customer));
    }

    public function edit_post($id) {
        $this->app->requiresLogin;
        $firstname = $this->app->request->post('firstname');
        $lastname = $this->app->request->post('lastname');
        $telephone = $this->app->request->post('telephone');
        $points = $this->app->request->post('points');
        $email = $this->app->request->post('email');
        if ($this->app->request->post('donor') === null) {
            $donor = false;
        } else {
            $donor = true;
        }

        $databag = array('FirstName' => $firstname,
            'LastName' => $lastname,
            'Telephone' => $telephone,
            'Points' => $points,
            'Email' => $email,
            'Donor' => $donor,
            'posted' => true);

        if ($this->IsNullOrEmptyString($firstname) ||
            $this->IsNullOrEmptyString($lastname) ||
            $this->IsNullOrEmptyString($telephone)) {
            $this->app->render('customer-edit.html', array('id' => $id, 'Customer' => $databag));
            $this->app->stop();
        }

        $CustomerRepository = new CustomerRepository($this->app->db);

        if (isset($_POST['save'])) {
            $Customer = $CustomerRepository->Get($id);
            $Customer->FirstName = $firstname;
            $Customer->LastName = $lastname;
            $Customer->Telephone = $telephone;
            $Customer->Email = $email;
            $Customer->Points = $points;
            $Customer->Donor = $donor;

            $queryComplete = $CustomerRepository->Save($Customer);
            if ($queryComplete) {
                $this->app->redirect("/search?searchText=$firstname $lastname");
            } else {
                $this->app->render('customer-edit.html', array('Customer' => $databag));
                $this->app->stop();
            }
        }

        else if (isset($_POST['delete'])) {
            $queryComplete = $CustomerRepository->Delete($id);
            $this->app->redirect("/search");
        }

    }

    public function IsNullOrEmptyString($question){
        return (!isset($question) || trim($question)==='');
    }
}
