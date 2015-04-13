<?php
namespace Loyalty\Controller;

class Accounting {

    protected $app;

    public function __construct(&$app) {
        $this->app = $app;
        $app->get('/accounting', array($this, 'accounting'));
        $app->post('/accounting/deleteAll', array($this, 'deleteAll'));
        //$app->post('/freebies/calculateadd', array($this, 'calculateAdd'));
        //$app->post('/freebies/calculatesubtract', array($this, 'calculateSubtract'));
    }

    public function accounting() {
        $sql = "select sum(Point) as 'Points' from RedeemLog";
        $statement = $this->app->db->prepare($sql);
        $queryComplete = $statement->execute();
        $totalrow = $statement->fetch(\PDO::FETCH_ASSOC);

        $sql = "select Time,User,Point from RedeemLog;";
        $statement = $this->app->db->prepare($sql);
        $queryComplete = $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $this->app->render('accounting.html', array('totalPointsFromRedeemLog' => $totalrow['Points'],
            'redeemlog' => $rows));
    }

    public function deleteAll() {
        $sql = "delete from RedeemLog where 1=1";
        $statement = $this->app->db->prepare($sql);
        $queryComplete = $statement->execute();

        if ($queryComplete){
            echo "<h1>You have deleted every entry in the redeem table</h1><br><h2>You will now be redirected...</h2>";
            header( "refresh:3;url=/accounting");
        }
        else {
            echo "Error: " .$sql. "<br>" . "PDO::errorInfo():\n";
            print_r($statement->errorInfo());
        }
    }
}
