<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/8/2017
 * Time: 4:54 PM
 */

namespace App\Models;


class Home
{
    public $id="";


    public $createdAt = "0000-00-00 00:00:00";
    public $updatedAt = "0000-00-00 00:00:00";
    public $currentTime ="";

    public function __construct()
    {
        $this->createdAt = date("Y-m-d h:i:s");
        $this->updatedAt = $this->createdAt;
        $this->currentTime =date("h:i A", strtotime(date("Y-m-d h:i:s")));
    }
}