<?php
class OrderDetail
{
    private $init = array(
        "order_id" => null,
        "product_id" => null,
        "quantily" => null,
        "price" => null,
    );

    function __construct($init)
    {
        foreach ($init as $key => $val) {
            $this->init[$key] = $val;
        }
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
        $connec = new Connection;
        $i = 0;
        foreach ($this->init as $key => $val) {
            $init[$i++] = $val;
        }
        $sql = "INSERT INTO `order_detail`(
                            `order_id`, 
                            `product_id`, 
                            `quantily`, 
                            `price`) 
                VALUES ('$init[0]', '$init[1]','$init[2]','$init[3]')";
        $result = mysqli_query($connec->open(), $sql);
        $connec->close();
        return $result;
    }

    function select($order_id, $product_id)
    {
        $connec = new Connection;
        $sql = "SELECT * FROM `order_detail` WHERE `order_id` = '$order_id' AND `product_id` = '$product_id'";
        $result = mysqli_query($connec->open(), $sql);
        $object = new OrderDetail(array());
        while ($row = mysqli_fetch_assoc($result)) {
            foreach ($row as $key => $val) {
                $object->__set($key, $val);
            }
        }
        $connec->close();
        return $object;
    }

    function update($order_id, $product_id)
    {
        $connec = new Connection;
        $i = 0;
        foreach ($this->init as $key => $val) {
            $init[$i++] = $val;
        }
        $sql = "UPDATE `order_detail` 
                SET `order_id`='$init[0]',
                    `product_id`='$init[1]',
                    `quantily`='$init[2]',
                    `price`='$init[3]'
                WHERE `order_id` = '$order_id'
                AND `product_id` = '$product_id'";
        $result = mysqli_query($connec->open(), $sql);
        $connec->close();
        return $result;
    }
    function delete($order_id, $product_id)
    {
        $connec = new Connection;
        $sql = "DELETE FROM `order_detail` WHERE `order_id` = '$order_id' AND `product_id` = '$product_id'";
        $result = mysqli_query($connec->open(), $sql);
        $connec->close();
        return $result;
    }
}

// (new OrderDetail([
//     "order_id" => "1",
//     "product_id" => "60",
//     "quantily" => "13",
//     "price" => "99000",
// ]))->__to_string();

// (new OrderDetail([
//     "order_id" => "1",
//     "product_id" => "60",
//     "quantily" => "13",
//     "price" => "99000",
// ]))->__to_json();

// if ((new OrderDetail([
//     "order_id" => "1",
//     "product_id" => "60",
//     "quantily" => "13",
//     "price" => "99000",
// ]))->insert()) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }

// if ((new OrderDetail([
//     "order_id" => "1",
//     "product_id" => "60",
//     "quantily" => "2",
//     "price" => "99000",
// ]))->update("1", "60")) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }

// if ((new OrderDetail(array()))->delete("1", "60")) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }
