<?php
class Customer
{
    private $connec;
    private $init = array(
        "id" => null,
        "name" => null,
        "gender" => null,
        "address" => null,
        "number_phone" => null,
        "email" => null,
        "password" => null,
        "date_create" => null,
        "state" => null,
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
        $sql = "INSERT INTO `customer`
                        (
                            `name`, 
                            `gender`, 
                            `address`, 
                            `number_phone`, 
                            `email`, 
                            `password`, 
                            `date_create`,
                            `state`
                        ) 
                VALUES ('$init[1]','$init[2]','$init[3]','$init[4]','$init[5]','$init[6]','$init[7]','$init[8]')";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function select($id)
    {
        $sql = "SELECT * FROM `customer` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $object = new customer(array());
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
        $sql = "UPDATE `customer` 
                SET `id`='$init[0]',
                    `name`='$init[1]',
                    `gender`='$init[2]',
                    `address`='$init[3]',
                    `number_phone`='$init[4]',
                    `email`='$init[5]',
                    `password`='$init[6]',
                    `date_create`='$init[7]',
                    `state` = '$init[8]'
                WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }
    
    function delete($id)
    {
        $sql = "DELETE FROM `customer` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function get_all($state = null)
    {
        $sql = "SELECT * FROM `customer`";
        $result = mysqli_query($this->connec->open(), $sql);
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = (new Customer([]))->select($row['id']);
        }
        $this->connec->close();
        return $list;
    }

    function is_signin($number_phone, $email, $password)
    {
        $result = "false";
        $accounts = (new Customer([]))->get_all();
        foreach ($accounts as $key => $account) {
            if (
                $account->__get("number_phone") == $number_phone &&
                $account->__get("email") == $email &&
                $account->__get("password") == $password
            ) {
                $result = $account->__get("id");
                break;
            }
        }
        return $result;
    }
}

// (new Customer([
//     "id" => "1",
//     "name" => "Thái Phương Nam",
//     "number_phone" => "0337948940",
//     "address" => "273 An Dương Vương, Bình Tân, Hồ Chí Minh",
//     "gender" => "Female",
//     "date_birth" => "2022-11-11",
//     "date_create" => "2022-03-22",
//     "state" => "normal",
//     "email" => "email@gmail.com",
//     "password" => "123456789",
// ]))->__to_string();

// (new Customer([
//     "id" => "1",
//     "name" => "Thái Phương Nam",
//     "number_phone" => "0337948940",
//     "address" => "273 An Dương Vương, Bình Tân, Hồ Chí Minh",
//     "gender" => "Female",
//     "date_birth" => "2022-11-11",
//     "date_create" => "2022-03-22",
//     "state" => "normal",
//     "email" => "email@gmail.com",
//     "password" => "123456789",
// ]))->__to_json();

// if ((new Customer([
//     "id" => "1",
//     "name" => "Thái Phương Nam",
//     "gender" => "Female",
//     "date_birth" => "2022-11-11",
//     "address" => "273 An Dương Vương, Bình Tân, Hồ Chí Minh",
//     "number_phone" => "0337948940",
//     "email" => "email@gmail.com",
//     "password" => "123456789",
//     "date_create" => "2022-03-22",
//     "state" => "normal",
// ]))->insert()) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }

// if ((new Customer([
//     "id" => "1",
//     "name" => "Thái Phương Nam",
//     "gender" => "Female",
//     "date_birth" => "2022-11-11",
//     "address" => "Bình Định",
//     "number_phone" => "0337948940",
//     "email" => "email@gmail.com",
//     "password" => "123456789",
//     "date_create" => "2022-03-22",
//     "state" => "normal",
// ]))->update("6")) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }

// if ((new Customer(array()))->delete("1")) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }