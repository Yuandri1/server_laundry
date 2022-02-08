<?php
    require_once "conn.php";
    $sql = "SELECT * FROM list_pengada";
    if(!$conn->query($sql)){
        echo "Error in Connecting to Database";
    }
    else{
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $return_arr['list_pengada'] = array();
            while($row = $result->fetch_array()){
                array_push($return_arr['list_pengada'], array(
                    'id_pengada'=>$row['id_pengada'],
                    'pengada'=>$row['pengada'],
                ));
            }
            echo json_encode($return_arr);
        }
    }
?>
