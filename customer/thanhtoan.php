<?php
include "../model/connect.php";
echo "<pre>";
var_dump($_SESSION['gio_hang']);
// var_dump($_SESSION['user']);exit();
$name ="";
$email ="";
$sdt = "";
$location = "";
$note = $_POST['orderNote'];
$userid='';
$ngay_nhap = date("Y-m-d");
if(!empty($_SESSION['user'])){
    $name = $_SESSION['user']['userName'];
    $email = $_SESSION['user']['userEmail'];
    $userid=$_SESSION['user']['userId'];
    $sdt = $_POST['orderSdt'];
    $location = $_POST['orderLocation'];
}else{
$name =$_POST['userName'];
$email =$_POST['userEmail'];
$sdt = $_POST['orderSdt'];
$location = $_POST['orderLocation'];
$userid= 0;
}
//tính tổng tiền
$total = 0;
$arrayProduct = array();
foreach ($_SESSION['gio_hang'] as $key => $value){
    $arrayProduct[] = $value;
    $total += $value['productPrice'] * $value['so_luong'];
}
$query = "INSERT INTO `orders`(`orderId`, `userId`, `orderDate`, `totalMoney`, `orderNote`, `location`, `sdt`) VALUES (null,'$userid','$ngay_nhap','$total','$note','$location','$sdt')";
// lấy id order và thêm dữ liệu vào bảng order
$last_id = getOrderId($query);
$queryString="";
$num = count($arrayProduct);
foreach ($arrayProduct as $key => $value){
    $totalProduct =$value['productPrice'] * $value['so_luong'];
    $queryString .="(null,'".$last_id."','".$value['productId']."','".$value['so_luong']."','".$totalProduct."')";
    if($key != $num -1){
        $queryString .=",";
    }
}
var_dump($queryString);

$queryDetail = "INSERT INTO `orderdetail`(`orderDetailId`, `orderId`, `productId`, `quantity`, `totalMoney`) VALUES ".$queryString.";";

connect($queryDetail);
foreach ($_SESSION['gio_hang'] as $key => $value){
    unset($_SESSION['gio_hang'][$key]);
}
header("Location:http://localhost/WEB17301/Du_an_1/views/index.php?act=giohang&success");
?>