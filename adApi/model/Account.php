<?php 
    namespace AdApi;

    use mysqli;

    Class Account {
        private $accountNo;
        private $amount;
        private $name;

        public function __construct($accountNo, $amount, $name){
            $this->accountNo = $accountNo;
            $this->amount = $amount;
            $this->name = $name;
        }

        public static function getAccount(int $accountNo, mysqli $db) : Account {
            $result = $db->query("SELECT * FROM accounts WHERE accountNo = $accountNo");
            $account = $result->fetch_assoc();
            $account = new Account($account['accountNo'], $account['amount'], $account['name']);
            return $account;
        }

        public function getArray() : array {
            $array = [
                'accountNo' => $this->accountNo,
                'amount' => $this->amount,
                'name' => $this->name
            ];
            return $array;
        }
    }
?>