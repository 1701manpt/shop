<?php
class ImageProduct
{
    private $connec;
    private $init = array("id" => null, "product_id" => null, "href" => null, "alt" => null, "index" => null);

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
        $sql = "INSERT INTO `image_product`(`product_id`, `href`, `alt`, `index`) 
                VALUES ('$init[1]','$init[2]','$init[3]','$init[4]')";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function select($id)
    {
        $sql = "SELECT * FROM `image_product` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $object = new ImageProduct(array());
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
        $sql = "UPDATE `image_product` 
                SET `product_id`='$init[1]',`href`='$init[2]',`alt`='$init[3]',`index`='$init[4]' 
                WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }
    function delete($id)
    {
        $sql = "DELETE FROM `image_product` WHERE `id` = '$id'";
        $result = mysqli_query($this->connec->open(), $sql);
        $this->connec->close();
        return $result;
    }

    function get_by_product($product_id)
    {
        $sql = "SELECT * FROM `image_product` WHERE `product_id` = '$product_id' ORDER BY `index` ASC";
        $result = mysqli_query($this->connec->open(), $sql);
        $list = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = (new ImageProduct([]))->select($row['id']);
        }
        $this->connec->close();
        return $list;
    }
}

// (new ImageProduct(array("id" => "1", "product_id" => "999", "href" => "https://cf.shopee.vn/file/91f955d5a46d4e1210b8fa1374194583_xxhdpi", "alt" => "Ảnh sản phẩm", "index" => "123")))->__to_string();
// (new ImageProduct(array("id" => "1", "product_id" => "999", "href" => "https://cf.shopee.vn/file/91f955d5a46d4e1210b8fa1374194583_xxhdpi", "alt" => "Ảnh sản phẩm", "index" => "123")))->__to_json();
// if ((new ImageProduct(array("id" => null, "product_id" => "60", "href" => "https://cf.shopee.vn/file/91f955d5a46d4e1210b8fa1374194583_xxhdpi", "alt" => "Ảnh sản phẩm", "index" => "123")))->insert()) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }
// (new ImageProduct(array()))->select(3)->__to_string();
// if ((new ImageProduct(array("id" => null, "product_id" => "60", "href" => "http://nghiquan.shop", "alt" => "Ảnh thích", "index" => "0")))->update(3)) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }
// if ((new ImageProduct(array()))->delete(3)) {
//     echo "OK";
// } else {
//     echo "FAIL";
// }