<?php
class Category
{
    private  $connec;
    private $init = [
        "id" => null,
        "name" => null,
        "image_avatar" => null,
        "description" => null,
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
        $sql = "INSERT INTO `category`
                        (
                            `name`, 
                            `image_avatar`, 
                            `description`, 
                            `display`, 
                        ) 
                VALUES ('$init[1]','$init[2]','$init[3]','$init[4]'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function select($id)
    {
        $sql = "SELECT * FROM `category` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $object = new Category([]);
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
        $sql = "UPDATE `category` 
                SET `id`='$init[0]',
                    `name`='$init[1]',
                    `image_avatar`='$init[2]',
                    `description`='$init[3]',
                    `display`='$init[4]',
                WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `category` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function get_all($display = null)
    {
        $sql = "";
        if($display == null) {
            $sql = "SELECT * FROM `category`";
        } else {
            $sql = "SELECT * FROM `category` WHERE `display` = '$display'";
        }
        $result = mysqli_query($this->connec->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Category([]))->select($row['id']);
        }
        $this->connec->close();
        return $data;
    }

    function get_limit($display = null, $amount)
    {
        $sql = "SELECT * FROM `category` WHERE `display` = '$display' LIMIT 0, $amount";
        $result = mysqli_query($this->connec->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Category([]))->select($row['id']);
        }
        $this->connec->close();
        return $data;
    }
}
