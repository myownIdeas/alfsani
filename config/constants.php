<?php
/**
 * Created by PhpStorm.
 * User: waqas
 * Date: 3/17/2016
 * Time: 2:30 PM
 */

return [
    'mainUrl'=>'http://localhost/alifsani/public/',
    'SUCCESS_MESSAGE'=>'Request completed successfully',
    'ERROR_MESSAGE'=>'Request Failed',
    'category'=>['school'=>1,'academy'=>2],

    'PROPERTY_PURPOSES' => [1 => 'for sale',2 => 'rent',3 => 'wanted'],
    'LAND_UNITS'=>['1'=>'square feet','2'=>'square yards','3'=>'marla','4'=>'kanal','5'=>'square meters','6'=>'Acre'],
    'PROPERTIES_LIMIT' => 10,
    'AGENTS_LIMIT' => 10,
    'Banners_Limit' => [
        'property_listing'=>[
            'left'=>10,
            'right'=>10,
            'between'=>4,
            'top'=>4
        ],
        'agent-profile'=>[
            'left'=>10,
            'right'=>10,
            'between'=>4,
            'top'=>4
        ],
        'property_detail'=>[
            'left'=>10,
            'right'=>10,
            'top'=>4
        ],
        'agent_listing'=>[
            'left'=>10,
            'right'=>10,
            'top'=>4
        ],
        'index'=>[
            'slider'=>10,
            'left'=>10,
            'right'=>10,
            'between'=>4,
            'top'=>4
        ],
    ],
    'defaultBannerLimit'=>10,
    'Pagination' => 10,
    'PROPERTIES_SortOn' => 'id',
    'PROPERTIES_SortBy' => 'asc',
    'REGISTRATION_EMAIL_FROM'=>'info@nugree.com',
    'REGISTRATION_EMAIL_TO'=>'info@nugree.com',


];