<?php 

    $serverName = "Mormont\Develop";
    $uid = "sa";
    $pwd = "c,]'4^j";
    $dbname = "CarPool";

    $connectionInfo = array( "Database"=>"$dbname", 
        "UID"=>"$uid", "PWD"=>"$pwd",
        "CharacterSet" => "UTF-8",
        "ReturnDatesAsStrings"=>true,
        "MultipleActiveResultSets"=>true);
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    //return $conn;

    $sql = " SELECT 
               A.CarID
              ,A.CarRegistration
              ,A.CarTypeID
              ,A.CarColor
              ,A.CarStatus
              ,T.CarTypeName
            FROM CarMaster A
            LEFT JOIN CarTypeMaster T ON A.CarTypeID=T.CarTypeID";
            $result=sqlsrv_query($conn,$sql);
            $rows = array();
           // $parent_arr = array();
            while($res = sqlsrv_fetch_object($result)) {
                //$rows[] = $res;
                $rows[] = array(
                        "id" => $res->CarID,
                        "title" => $res->CarRegistration." (". $res->CarTypeName .")",
                        "eventColor" => $res->CarColor
                    );
              /*  $parent_arr = array("id" => $res->CarTypeID,
                        "title" => $res->CarTypeName,
                        "children" =>$rows
                    );*/

            }

            echo json_encode($rows);

 ?>