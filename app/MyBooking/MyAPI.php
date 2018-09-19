<?php

namespace App\MyBooking;

use App\Database\Connection;
use Wattanar\Sqlsrv;

class MyAPI
{
  public function load() {
    $conn = (new Connection)->dbConnect();
    $book_create = $_SESSION['user_id'];

    $data_session =  Sqlsrv::rows(
        $conn,
        "SELECT *,U.email FROM [user] U 
          LEFT JOIN permissioncompany P  ON U.permission_company=P.permission_id
          WHERE P.permission_id = ?",[$_SESSION['user_permissionid']]
    );

    $session_per = $data_session[0]['permission_company'];

    if ($_SESSION['user_status']=='A') {
      return Sqlsrv::rows(
        $conn,
        "SELECT B.book_number
                ,B.book_room
                ,BS.book_startdate
                ,BE.book_enddate
                ,B.book_starttime
                ,B.book_endtime
                ,TU.timeout_name
                ,B.book_title
                ,B.book_user
                ,B.book_seat
                ,B.book_support
                ,B.book_food
                ,B.book_dessert
                ,B.book_layout
                ,B.book_create
                ,B.book_remark
                ,R.room_name
                ,R.room_company
                ,B.book_weekly
                ,U.fname +' '+ U.lname [fullname] 
                ,(SELECT TOP 1 MIN(BS.book_status) FROM booking BS 
                WHERE  BS.book_number=B.book_number)[book_status]
                ,(SELECT TOP 1 S.status_description FROM booking BS 
                LEFT JOIN status S ON BS.book_status = S.status_id
                WHERE  BS.book_number=B.book_number ORDER BY S.status_id ASC)[book_statusname]
        FROM  booking B
        LEFT JOIN room R ON B.book_room = R.room_id
        LEFT JOIN status S ON B.book_status = S.status_id
        LEFT JOIN [user] U ON B.book_create = U.id
        LEFT JOIN timeout TU ON B.book_endtime = TU.timeout
        JOIN 
         (
          SELECT MIN(book_startdate)book_startdate,book_number
          FROM booking BS
          GROUP BY BS.book_number
         )BS
        ON BS.book_number = B.book_number
        JOIN 
         (
          SELECT MAX(book_enddate)book_enddate,book_number
          FROM booking BE
          GROUP BY BE.book_number
         )BE
        ON BE.book_number = B.book_number
        WHERE B.book_status <=4 
        AND R.room_company IN ($session_per) 
        -- OR B.book_create=($book_create)  
        GROUP BY B.book_number
                ,B.book_room
                ,BS.book_startdate
                ,BE.book_enddate
                ,B.book_starttime
                ,B.book_endtime
                ,TU.timeout_name
                ,B.book_title
                ,B.book_user
                ,B.book_seat
                ,B.book_support
                ,B.book_food
                ,B.book_dessert
                ,B.book_layout
                ,B.book_create
                ,B.book_remark
                ,R.room_name
                ,R.room_company
                ,B.book_weekly
                ,U.fname
                ,U.lname
        ORDER BY B.book_number DESC"
      );
    }else{
      return Sqlsrv::rows(
        $conn,
        "SELECT B.book_number
                ,B.book_room
                ,BS.book_startdate
                ,BE.book_enddate
                ,B.book_starttime
                ,B.book_endtime
                ,TU.timeout_name
                ,B.book_title
                ,B.book_user
                ,B.book_seat
                ,B.book_support
                ,B.book_food
                ,B.book_dessert
                ,B.book_layout
                ,B.book_create
                ,U.username
                ,B.book_remark
                ,R.room_name
                ,B.book_weekly
                ,U.fname +' '+ U.lname [fullname] 
                ,(SELECT TOP 1 MIN(BS.book_status) FROM booking BS 
                WHERE  BS.book_number=B.book_number)[book_status]
                ,(SELECT TOP 1 S.status_description FROM booking BS 
                LEFT JOIN status S ON BS.book_status = S.status_id
                WHERE  BS.book_number=B.book_number ORDER BY S.status_id ASC)[book_statusname]
        FROM  booking B
        LEFT JOIN room R ON B.book_room = R.room_id
        LEFT JOIN status S ON B.book_status = S.status_id
        LEFT JOIN [user] U ON B.book_create = U.id
        JOIN 
         (
          SELECT MIN(book_startdate)book_startdate,book_number
          FROM booking BS
          GROUP BY BS.book_number
         )BS
        ON BS.book_number = B.book_number
        JOIN 
         (
          SELECT MAX(book_enddate)book_enddate,book_number
          FROM booking BE
          GROUP BY BE.book_number
         )BE
        ON BE.book_number = B.book_number
        LEFT JOIN timeout TU ON B.book_endtime = TU.timeout
        WHERE book_create=$book_create AND B.book_status <=4
        GROUP BY B.book_number
                ,B.book_room
                ,BS.book_startdate
                ,BE.book_enddate
                ,B.book_starttime
                ,B.book_endtime
                ,TU.timeout_name
                ,B.book_title
                ,B.book_user
                ,U.username
                ,B.book_seat
                ,B.book_support
                ,B.book_food
                ,B.book_dessert
                ,B.book_layout
                ,B.book_create
                ,B.book_remark
                ,R.room_name
                ,B.book_weekly
                ,U.fname
                ,U.lname
        ORDER BY B.book_number DESC"
      );
    }
  }

  public function loadcancel($book_number) {
    $conn = (new Connection)->dbConnect();
    $book_create = $_SESSION['user_id'];

      return Sqlsrv::rows(
        $conn,
        "SELECT B.book_id
                ,B.book_number
                ,B.book_room
                ,B.book_startdate
                ,B.book_enddate
                ,B.book_starttime
                ,B.book_endtime
                ,B.book_title
                ,B.book_user
                ,B.book_seat
                ,B.book_support
                ,B.book_food
                ,B.book_dessert
                ,B.book_layout
                ,B.book_create
                ,U.username
                ,B.book_remark
                ,B.book_status
                ,R.room_name
                ,S.status_description
        FROM  booking B
        LEFT JOIN room R ON B.book_room = R.room_id
        LEFT JOIN status S ON B.book_status = S.status_id
        LEFT JOIN [user] U ON B.book_create = U.id
        WHERE B.book_number=?
        ORDER BY B.book_startdate DESC",[$book_number]
      );
    
  }

  public function loadfood($numbersequence){
    $conn = (new Connection)->dbConnect();
    $query = Sqlsrv::rows(
      $conn,
      "SELECT B.*,F.food_name,F.food_price,R.remark_name FROM booking_food B
      LEFT JOIN food F ON B.food_id=F.food_id
      LEFT JOIN remark R ON B.food_remark=R.remark_id
      WHERE  B.booking_id = ? AND B.food_type = ?",[$numbersequence,1]
    );
    return $query;
  }

  public function loaddessert($numbersequence){
    $conn = (new Connection)->dbConnect();
    $query = Sqlsrv::rows(
      $conn,
      "SELECT B.*,F.dessert_name,F.dessert_price,R.remark_name FROM booking_food B
      LEFT JOIN dessert F ON B.food_id=F.dessert_id
      LEFT JOIN remark R ON B.food_remark=R.remark_id
      WHERE  B.booking_id = ? AND B.food_type = ?",[$numbersequence,2]
    );
    return $query;
  }

  public function loadlayout($numbersequence){
    $conn = (new Connection)->dbConnect();
    $query = Sqlsrv::rows(
      $conn,
      "SELECT B.*,F.layout_name,R.remark_name,F.layout_picture
      FROM booking_layout B
      LEFT JOIN layout F ON B.layout_id=F.layout_id
      LEFT JOIN remark R ON B.layout_remark=R.remark_id
      WHERE  B.booking_id = ?",[$numbersequence]
    );
    return $query;
  }

  public function loadsupport($numbersequence){
    $conn = (new Connection)->dbConnect();
    $query = Sqlsrv::rows(
      $conn,
      "SELECT B.*,B.support_id,R.remark_name FROM booking_support B
      LEFT JOIN remark R ON B.support_remark=R.remark_id
      WHERE  B.booking_id = ?",[$numbersequence]
    );
    return $query;
  }

  public function mixs_approve($numbersequence){
    $layout   = self::loadlayout($numbersequence);
    $food     = self::loadfood($numbersequence);
    $dessert  = self::loaddessert($numbersequence);
    $support  = self::loadsupport($numbersequence);
    
    $mixs     = array();

    if (isset($layout)) {
      foreach ($layout as $key => $value) {
        array_push($mixs, "layout".$value['layout_id']);
      }
    }

    if (isset($food)) {
      foreach ($food as $key => $value) {
        array_push($mixs, "food".$value['food_id']);
      }
    }

    if (isset($dessert)) {
      foreach ($dessert as $key => $value) {
        array_push($mixs, "dessert".$value['food_id']);
      }
    }

    if (isset($support)) {
      foreach ($support as $key => $value) {
        array_push($mixs, "support".$value['support_id']);
      }
    }

    return $mixs;
  }

}