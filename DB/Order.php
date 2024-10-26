<?php
class Order
{
    private $conn;
    private $table = 'orders';
    private $table1 = "order_items";

    public $phone;
    public $order_no;
    public $pname;
    public $place;
    public $qty;
    public $amount;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Insert order record
    public function insertOrder()
    {
        try {
            $query = "INSERT INTO " . $this->table . " (phone) VALUES (:phone);";

            $stmt = $this->conn->prepare($query);

            $this->phone = htmlspecialchars(strip_tags($this->phone));

            $stmt->bindParam(':phone', $this->phone);

            if ($stmt->execute()) {
                $this->order_no = $this->conn->lastInsertId();
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo "Error inserting order: " . $e->getMessage();
            return false;
        }
    }

    public function insertOrderItems()
    {
        try {
            $query = "INSERT INTO " . $this->table1 . "(order_no, pname, place, qty, amount) VALUES (:order_no, :pname, :place, :qty, :amount)";
            $stmt = $this->conn->prepare($query);

            $this->pname = htmlspecialchars(strip_tags($this->pname));
            $this->place = htmlspecialchars(strip_tags($this->place));
            $this->qty = htmlspecialchars(strip_tags($this->qty));
            $this->amount = htmlspecialchars(strip_tags($this->amount));

            $stmt->bindParam(":order_no", $this->order_no);
            $stmt->bindParam(":pname", $this->pname);
            $stmt->bindParam(":place", $this->place);
            $stmt->bindParam(":qty", $this->qty);
            $stmt->bindParam(":amount", $this->amount);

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo "Error inserting order: " . $e->getMessage();
            return false;
        }
    }

    public function displayOrders() {
        try {
            $database = new Database();
            $db = $database->connect();
    
            $query = "SELECT " . $this->table . ".order_no, " . $this->table . ".phone, " .
                     $this->table1 . ".pname, " . $this->table1 . ".place, " .
                     $this->table1 . ".qty, " . $this->table1 . ".amount " .
                     "FROM " . $this->table . " " .
                     "RIGHT JOIN " . $this->table1 . " ON " . $this->table . ".order_no = " . $this->table1 . ".order_no";
    
            $stmt = $db->prepare($query);
            $stmt->execute();
    
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Group results by order_no and phone
            $groupedResults = [];
            foreach ($results as $row) {
                $orderKey = $row['order_no'] . '|' . $row['phone']; // Unique key for grouping
                if (!isset($groupedResults[$orderKey])) {
                    $groupedResults[$orderKey] = [
                        'order_no' => $row['order_no'],
                        'phone' => $row['phone'],
                        'items' => []
                    ];
                }
                // Add item details to the grouped result
                $groupedResults[$orderKey]['items'][] = [
                    'pname' => $row['pname'],
                    'place' => $row['place'],
                    'qty' => $row['qty'],
                    'amount' => $row['amount']
                ];
            }
    
            // Display the results
           return $groupedResults;
    
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
}
