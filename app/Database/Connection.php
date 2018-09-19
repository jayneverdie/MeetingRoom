<?php

namespace App\Database;

use Wattanar\Sqlsrv;

class Connection
{
  public function dbConnect()
  {
    // return Sqlsrv::connect(
    //   'mormont\develop',
    //   'sa',
    //   'c,]\'4^j',
    //   'MeetingRoom2018_TEST'
    // );
    return Sqlsrv::connect(
      'mormont\develop',
      'sa',
      'c,]\'4^j',
      'MeetingRoom2018'
    );
  }
}