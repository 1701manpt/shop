<?php
class Category
{
    private $id, $name, $image_avatar, $description, $display;
    function __construct($id = null, $name = null, $image_avatar = null, $description = null, $display = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image_avatar = $image_avatar;
        $this->description = $description;
        $this->display = $display;
    }
    function get($id)
    {
        $connection = new Connection;
        $sql = "SELECT * FROM `category`
                    WHERE `id`='$id'";
        $result = mysqli_query($connection->open(), $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->image_avatar = $row['image_avatar'];
            $this->description = $row['description'];
            $this->display = $row['display'];
        }
        $connection->close();
        return $this;
    }

    function get_all($display = null)
    {
        $connection = new Connection;
        $sql = "SELECT * FROM `category` WHERE `display` = '$display'";
        $result = mysqli_query($connection->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Category)->get($row['id']);
        }
        $connection->close();
        return $data;
    }

    function get_limit($display = null, $amount)
    {
        $connection = new Connection;
        $sql = "SELECT * FROM `category` WHERE `display` = '$display' LIMIT 0, $amount";
        $result = mysqli_query($connection->open(), $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = (new Category)->get($row['id']);
        }
        $connection->close();
        return $data;
    }

    function insert()
    {
        $connection = new Connection;
        $sql = "INSERT INTO `category`(`name`, `image_avatar`, `description`, `display`)
                    VALUES ('$this->name','$this->image_avatar','$this->description','$this->display')";
        $result = mysqli_query($connection->open(), $sql);
        $connection->close();
        return $result;
    }

    function update()
    {
        $connection = new Connection;
        $sql = "UPDATE `category` 
                    SET `id`='$this->id',`name`='$this->name', `image_avatar`='$this->image_avatar',`description`='$this->description',`display`='$this->display' 
                    WHERE `id` = '$this->id'";
        $result = mysqli_query($connection->open(), $sql);
        $connection->close();
        return $result;
    }

    function delete()
    {
        $connection = new Connection;
        $sql = "DELETE FROM `category` WHERE `id` = '$this->id'";
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
    function get_image_avatar()
    {
        return $this->image_avatar;
    }
    function set_image_avatar($image_avatar)
    {
        $this->image_avatar = $image_avatar;
    }
    function get_display()
    {
        return $this->display;
    }
    function set_display($display)
    {
        $this->display = $display;
    }
}
