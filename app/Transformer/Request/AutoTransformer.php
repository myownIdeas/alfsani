<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/29/2016
 * Time: 7:43 PM
 */

namespace App\Transformer\Request;

use App\Transformer\RequestTransformer;

class AutoTransformer extends RequestTransformer
{
    public $getWantedValues= "";
    public $final = [];
    public function __construct($params,$shouldTransform = true)
    {
        $this->transform = $shouldTransform;
        parent::__construct($params,$this->transform);
        $this->params = $params;
    }
    public function transform()
    {
        if($this->switch) {

            foreach($this->params as $myKey=>$val) {

                $capitalKeys=[];
                if (strchr($myKey, '_') != false) {
                    $values = explode('_', $myKey);
                    foreach ($values as $value) {
                        $capitalKeys[] = ucfirst($value);
                    }
                    $this->final[lcfirst(implode('',$capitalKeys))]=$val;

                }else{
                    $this->final[$myKey]=$val;
                }

            }
            return $this->final;
        }
        return  $this->params;

    }

}