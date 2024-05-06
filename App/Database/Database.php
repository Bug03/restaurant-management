<?php
use MongoDB\Client;
use MongoDB\Exception\Exception;

require_once $_SERVER['DOCUMENT_ROOT'] . '/app_csdl/vendor/autoload.php';
       
class Database {
    private $local = "mongodb://127.0.0.1:27017";
    private $conn; 
    private $db;
    public function __construct($db){
        try {
            $this->conn = new Client($this->local);
           //select databae
            $this->db = $this->conn->$db;
        }
        catch(Exception $e)
        {                    
        die( 'Connection Failed' );
        }
    }
      
    public function insert($collectionName, $data) {
        // lấy ra collection
        $collection = $this->db->$collectionName;
        $resultInsert = $collection->insertOne($data);
          // Kiểm tra xem dữ liệu đã được thêm thành công hay không
        if ($resultInsert->getInsertedCount() > 0) {
        $message = urlencode( "Dữ liệu đã được thêm vào MongoDB thành công.");
        } else {
        $message = urlencode("Có lỗi xảy ra khi thêm dữ liệu vào MongoDB.");
        }
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?Message='. $message);
        die();
    }

    function update($collectionName,$id,$data) {
         // lấy ra collection
        $collection = $this->db->$collectionName;
         // Query
        $collection->updateOne(["_id" =>  new MongoDB\BSON\ObjectId($id)],$data);
        $message = "Đã cập nhật thành công dữ liệu";
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?Message='. $message);
        die();
    }

    public function findById($collectionName,$id) {
        $collection = $this->db->$collectionName;
        $result = $collection->find(["_id" =>  new MongoDB\BSON\ObjectId($id)]);
        return $result;
    }

    public function findbyEmail($collectionName, $email)
    {
        // lấy ra collection
        $collection = $this->db->$collectionName; // $collection = $db->"User"
        // Query
        $result = $collection->find(['Email' => $email]); // $result = $collection->find()
        return $result;
    }

    public function findByRegex($collectionName, $column, $regex, $filter)
    {
        // lấy ra collection
        $collection = $this->db->$collectionName;
        // Query
        if ($filter != '') {
            $condition = [
                $column => [
                    '$regex' => $regex,
                    '$options' => 'i', // Chế độ không phân biệt chữ hoa thường
                ],
                "category" => $filter
            ];
        }
        else{
            $condition = [
                $column => [
                    '$regex' => $regex,
                    '$options' => 'i', // Chế độ không phân biệt chữ hoa thường
                ]
            ];
        }
        $options = ['collation' => ['locale' => 'vi', 'strength' => 2]];
//        var_dump($condition);
        // Truy vấn MongoDB
        $result = $collection->find($condition, $options);
        return $result;
    }

    public function findByLab11($collectionName, $filterField, $regex)
    {
        // lấy ra collection
        $collection = $this->db->$collectionName;
        $filter = [
            $filterField => [
                '$regex' => $regex,
                '$options' => 'i', // 'i' để không phân biệt chữ hoa chữ thường
            ],
        ];
        // Query
        $result = $collection->find($filter);
        return $result;
    }


    public function findLimit($collectionName,$limit, $skip) {
        $collection = $this->db->$collectionName;
        $result = $collection->find([],['limit'=>$limit, 'skip'=>$skip]);
        return $result;
    }

    
    public function findAll($collectionName) {    
        // lấy ra collection
        $collection = $this->db->$collectionName; // $collection = $db->"User"
        // Query
        $result = $collection->find(); // $result = $collection->find()
        return $result;
    }

    function deleteById($collectionName,$id) {
        $collection = $this->db->$collectionName;
        $collection->deleteOne(["_id" =>  new MongoDB\BSON\ObjectId($id)]);
        $message = "Đã xóa thành công dữ liệu";
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?Message='. $message);
        die();
    }

}
  
  


?>