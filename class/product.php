<?php
class Product
{
    private $connec;
    private $init = [
        "id" => null,
        "name" => null,
        "price" => null,
        "price_sale" => null,
        "description" => null,
        "type_id" => null,
        "display" => null,
    ];
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
        $sql = "INSERT INTO `product`(
                            `name`, 
                            `price`, 
                            `price_sale`, 
                            `type_id`, 
                            `description`, 
                            `display`) 
                VALUES ('$init[1]','$init[2]','$init[3]','$init[4]','$init[5]','$init[6]')";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function select($id)
    {
        $sql = "SELECT * FROM `product` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $object = new Product([]);
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
        $sql = "UPDATE `product` 
                SET
                    `name`='$init[1]',
                    `price`='$init[2]',
                    `price_sale`='$init[3]',
                    `description`='$init[4]',
                    `type_id`='$init[5]',
                    `display`='$init[6]'
                WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `product` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function get_newest($display, $amount = null)
    {
        $sql = "";
        if ($amount == null) {
            $sql = "SELECT * FROM `product` WHERE `display` = '$display'";
        } else {
            $sql = "SELECT * FROM `product` WHERE `display` = '$display' ORDER BY `id` DESC LIMIT 0, $amount";
        }
        $result = mysqli_query($this->connec->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Product([]))->select($row['id']);
        }
        $this->connec->close();
        return $data;
    }

    function get_sortby_price($display, $order)
    {
        $sql = "SELECT * FROM `product` WHERE `display` = '$display' ORDER BY `price` $order";
        $result = mysqli_query($this->connec->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Product([]))->select($row['id']);
        }
        $this->connec->close();
        return $data;
    }

    function get_by_category($display, $id)
    {
        $sql = "SELECT `product_id`, `category_id` `display` 
                FROM `category_and_product` 
                JOIN `product` ON `id` = `product_id` 
                WHERE `category_id` = '$id' 
                AND `display` = '$display'";
        $result = mysqli_query($this->connec->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Product([]))->select($row['product_id']);
        }
        $this->connec->close();
        return $data;
    }

    function get_all($display = null)
    {
        $sql = "";
        if ($display == null) {
            $sql = "SELECT * FROM `product`";
        } else {
            $sql = "SELECT * FROM `product` WHERE `display` = '$display'";
        }
        $result = mysqli_query($this->connec->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Product([]))->select($row['id']);
        }
        $this->connec->close();
        return $data;
    }
}
