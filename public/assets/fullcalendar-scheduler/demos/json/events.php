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

    $sql = "SELECT 
               A.CarApproveID
              ,A.CarID
              ,A.Remark
              ,A.StartDate
              ,A.EndDate
              ,A.StartTime
              ,A.EndTime
              ,A.Seat
              ,C.CarRegistration
              ,C.CarTypeID
              ,CT.CarTypeName
              ,A.DriverID
              ,D.DriverName
            FROM CarApproveTrans A
            LEFT JOIN CarMaster C ON A.CarID = C.CarID
            LEFT JOIN CarTypeMaster CT ON C.CarTypeID = CT.CarTypeID
            LEFT JOIN DriverMaster D ON A.DriverID = D.DriverID";
            $result=sqlsrv_query($conn,$sql);
            $rows = array();
            while($res = sqlsrv_fetch_object($result)) {
                //$rows[] = $res;
                $rows[] = array(
                        "id" => $res->CarApproveID,
                        "resourceId" => $res->CarID,
                        "cartype" => $res->CarTypeName,
                        "carname" => $res->CarRegistration,
                        "seatname" => $res->Seat,
                        "start" => $res->StartDate." ".$res->StartTime,
                        "end" => $res->EndDate." ".$res->EndTime,
                        "title" => $res->Remark,
                        "driver" => $res->DriverName
                    );
            }
            echo json_encode($rows);
 ?>