<?php
class Product
{
    private $id, $name, $sale_price, $price, $description, $type_id, $display;
    function __construct($id = null, $name = null, $price = null, $sale_price = null, $description = null, $type_id = null, $display = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sale_price = $sale_price;
        $this->price = $price;
        $this->description = $description;
        $this->type_id = $type_id;
        $this->display = $display;
    }
    function get($id)
    {
        $connection = new Connection;
        $sql = "SELECT * FROM `product`
                    WHERE `id`='$id'";
        $result = mysqli_query($connection->open(), $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->sale_price = $row['sale_price'];
            $this->price = $row['price'];
            $this->type_id = $row['type_id'];
            $this->description = $row['description'];
            $this->display = $row['display'];
        }
        $connection->close();
        return $this;
    }

    function get_newest($display, $amount) {
        $connection = new Connection;
        $sql = "SELECT * FROM `product` WHERE `display` = '$display' ORDER BY `id` DESC LIMIT 0, $amount";
        $result = mysqli_query($connection->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new product)->get($row['id']);
        }
        $connection->close();
        return $data;
    }

    function get_by_category($display, $id) {
        $connection = new Connection;
        $sql = "SELECT `product_id`, `category_id` `display` 
                FROM `category_and_product` 
                JOIN `product` ON `id` = `product_id` 
                WHERE `category_id` = '$id' 
                AND `display` = '$display'";
        $result = mysqli_query($connection->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Product)->get($row['product_id']);
        }
        $connection->close();
        return $data;
    }

    function get_all($display) {
        $connection = new Connection;
        $sql = "SELECT * FROM `product` WHERE `display` = '$display'";
        $result = mysqli_query($connection->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new product)->get($row['id']);
        }
        $connection->close();
        return $data;
    }
    
    function insert()
    {
        $connection = new Connection;
        $sql = "INSERT INTO `product`(`name`, `price`, `sale_price`, `description`, `type_id`, `display`)
                    VALUES ('$this->name','$this->price', '$this->sale_price', '$this->description', '$this->type_id', '$this->display')";
        $result = mysqli_query($connection->open(), $sql);
        $connection->close();
        return $result;
    }

    function update()
    {
        $connection = new Connection;
        $sql = "UPDATE `product` 
                    SET `id`='$this->id',`name`='$this->name', `image_avatar`='$this->price',`description`='$this->description',`display`='$this->display', `sale_price` = '$this->sale_price', `type_id`='$this->type_id' 
                    WHERE `id` = '$this->id'";
        $result = mysqli_query($connection->open(), $sql);
        $connection->close();
        return $result;
    }

    function delete()
    {
        $connection = new Connection;
        $sql = "DELETE FROM `product` WHERE `id` = '$this->id'";
        $result = mysqli_query($connection->open(), $sql);
        $connection->close();
        return $result;
    }

    function get_id()
    {
        return $this->id;
    }
    function set_id($id)
    {
        $this->id = $id;
    }
    function get_name()
    {
        return $this->name;
    }
    function set_name($name)
    {
        $this->name = $name;
    }
    function get_description()
    {
        return $this->description;
    }
    function set_description($description)
    {
        $this->description = $description;
    }
    function get_sale_price()
    {
        return $this->sale_price;
    }
    function set_sale_price($sale_price)
    {
        $this->sale_price = $sale_price;
    }
    function get_display()
    {
        return $this->display;
    }
    function set_display($display)
    {
        $this->display = $display;
    }
    function get_price() {
        return $this->price;
    }
    function set_price($price) {
        $this->price = $price;
    }
    function get_type_id() {
        return $this->type_id;
    }
    function set_type_id($type_id) {
        $this->type_id = $type_id;
    }
}