<?php
// require "../connection.php";
class Order
{
    private $connec;
    private $init = array(
        "id" => null,
        "customer_id" => null,
        "number_phone" => null,
        "address" => null,
        "quantily"=> null,
        "price" => null,
        "transport_fee" => null,
        "date_start" => null,
        "date_end" => null,
        "description" => null,
        "purchase_id" => null
    );

    function __construct($init)
    {
        foreach ($init as $key => $val) {
            $this->init[$key] = $val;
        }
        $this->connec = new Connection;
    }

    function __to_string()
    {
        foreach ($this->init as $key => $val) {
            echo $key . " : " . $val . "<br>";
        }
    }

    function __to_json()
    {
        $json = $this->init;
        echo json_encode($json);
    }

    function __get($property_name)
    {
        return $this->init[$property_name];
    }

    function __set($property_name, $property_value)
    {
        $this->init[$property_name] = $property_value;
    }

    function insert()
    {
        $i = 0;
        foreach ($this->init as $key => $val) {
            $init[$i++] = $val;
        }
        $sql = "INSERT INTO `order`(
                            `customer_id`, 
                            `number_phone`, 
                            `address`, 
                            `price`, 
                            `transport_fee`, 
                            `date_start`, 
                            `date_end`, 
                            `description`, 
                            `purchase_id`) 
                VALUES ('$init[1]','$init[2]','$init[3]','$init[4]','$init[5]','$init[6]','$init[7]','$init[8]','$init[9]')";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function select($id)
    {
        $sql = "SELECT * FROM `order` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $object = new Order(array());
        while ($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $key => $val) {
                $object->__set($key, $val);
            }
        }
        $this->connec->close();
        return $object;
    }

    function update($id)
    {
        $i = 0;
        foreach ($this->init as $key => $val) {
            $init[$i++] = $val;
        }
        $sql = "UPDATE `order` 
                SET `customer_id`='$init[1]',
                    `number_phone`='$init[2]',
                    `address`='$init[3]',
                    `price`='$init[4]',
                    `transport_fee`='$init[5]',
                    `date_start`='$init[6]',
                    `date_end`='$init[7]',
                    `description`='$init[8]',
                    `purchase_id`='$init[9]'
                WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }
    
    function delete($id)
    {
        $sql = "DELETE FROM `order` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function get($customer_id = null, $purchase_id = null)
    {
        $sql = "";
        if ($customer_id == null && $purchase_id == null) {
            $sql = "SELECT * FROM `order`";
        } else {
            if ($purchase_id == null) {
                $sql = "SELECT * FROM `order` WHERE `customer_id` = '$customer_id'";
            }
            if ($customer_id == null) {
                $sql = "SELECT * FROM `order` WHERE `purchase_id` = '$purchase_id'";
            }
        }
        if($customer_id != null && $purchase_id != null) {
            $sql = "SELECT * FROM `order` WHERE `purchase_id` = '$purchase_id' AND `customer_id` = '$customer_id'";
        }
        $result = mysqli_query($this->connec->open(), $sql);
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = (new Order([]))->select($row['id']);
        }
        $this->connec->close();
        return $list;
    }

    function auto_quantily($id) {
        $sql = "SELECT count(*) FROM `order_detail` WHERE `order_id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $quantily = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $quantily = $row['count(*)'];
        }
        $this->connec->close();
        return $quantily;
    }

    function auto_price($id) {
        $sql = "SELECT sum(`price`) FROM `order_detail` WHERE `order_id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $price = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $price = $row['sum(`price`)'];
        }
        $this->connec->close();
        return $price;
    }
}

// (new Order([
//     "id" => "1",
//     "customer_id" => "111",
//     "number_phone" => "0337948940",
//     "address" => "273 An Dương Vương, Bình Tân, Hồ Chí Minh",
//     "price" => "99000",
//     "transport_fee" => "15000",
//     "date_start" => "19/03/2022",
//     "date_end" => "22/03/2022",
//     "description" => "Ok",
//     "purchase_id" => "4",
// ]))->__to_string();

// (new Order([
//     "id" => "1",
//     "customer_id" => "111",
//     "number_phone" => "0337948940",
//     "address" => "273 An Dương Vương, Bình Tân, Hồ Chí Minh",
//     "price" => "99000",
//     "transport_fee" => "15000",
//     "date_start" => "19/03/2022",
//     "date_end" => "22/03/2022",
//     "description" => "Ok",
//     "purchase_id" => "4",
// ]))->__to_json();

// if ((new Order(array(
//     "id" => "1",
//     "customer_id" => "1",
//     "number_phone" => "0337948940",
//     "address" => "273 An Dương Vương, Bình Tân, Hồ Chí Minh",
//     "price" => "99000",
//     "transport_fee" => "15000",
//     "date_start" => "2022-03-19",
//     "date_end" => "2022-03-22",
//     "description" => "Ok",
//     "purchase_id" => "4",
// )))->insert()) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }

// if ((new Order(array(
//     "id" => "3",
//     "customer_id" => "1",
//     "number_phone" => "0337948940",
//     "address" => "Bình Định",
//     "price" => "99000",
//     "transport_fee" => "15000",
//     "date_start" => "2022-03-19",
//     "date_end" => "2022-03-22",
//     "description" => "Ok",
//     "purchase_id" => "4"
// )))->update("3")) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }

// if ((new Order(array()))->delete("3")) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }

// echo (new Order([]))->select(4)->__get("customer_id");