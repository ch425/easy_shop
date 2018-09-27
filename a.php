<?php
    $conn = new mysqli("localhost","root","","shop_db","3306");
    if(!$conn){
        echo "连接失败!";
    }
    // 设置字符集
    $conn -> query("SET CHARACTER SET 'utf8'");//读库 
    $conn -> query("set names 'utf8'"); //写库
    $sql = "select img,pinpai,name,price from shop_db";
    $result = $conn -> query($sql);
    $arr = array();
    // 得到所有数据
    // 能找到数据，返回对象
    // 找不到返回null， 就结束循环
    while($rows = $result -> fetch_assoc()) {
        array_push($arr, $rows);
    }
    // 把数组转换为json字符串返回给客户端
    // echo json_encode($arr);
    $str = json_encode($arr);
    $arr = json_decode($str);
    $arrTable = array();
    array_push($arrTable, "<table border='1' width='1000' cellspacing='0' align='center'>");
    array_push($arrTable, "<tr height='30'><th>图片</th><th>电脑品牌</th><th>电脑型号</th><th>价格</th><th>数量</th><th>操作</th></tr>");
    for($i = 0; $i < count($arr); $i++) {
        // 生成tr
        // array_push: 数组添加元素， 第一个参数是数组本身， 第二个是要添加的元素
        array_push($arrTable, "<tr>");
        foreach($arr[$i] as $key => $val) {
            // 添加td
            array_push($arrTable, "<td align='center'>$val</td>");
        }
        array_push($arrTable,"<td align='center'><input value='1' type='number' min='1'></td>");
        array_push($arrTable, "<td align='center'><button>加入购物车</button></td>");
        array_push($arrTable, "</tr>");
    }
    array_push($arrTable,"</table>");
    echo join($arrTable);
?>