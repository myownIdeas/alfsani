<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/16/2017
 * Time: 9:35 PM
 */

namespace App\json\creator\feature;

use App\QueryBuilder\UserQueryBuilder\FeatureQueryBuilder;

class CreateCategorySectionFeatureJson
{
    public $featureQueryBuilder;
    public $featureCreator;
    public function __construct()
    {
        $this->featureQueryBuilder = new FeatureQueryBuilder();

    }
    public function createCategorySectionsFeatureJson($categoryId)
    {
        $categorySections = $this->getAllCategorySections($categoryId);

        $sectionIds = [];
        foreach($categorySections as $categorySection)
        {
           $sectionIds[] = $categorySection->sectionId;
        }

        return $this->getRealFormOfResults($this->getSectionFeatures($sectionIds));
    }
    public function getAllCategorySections($categoryId)
    {
        return $this->featureQueryBuilder->getCategoryAllSections($categoryId);
    }
    public function getSectionFeatures($sectionIds)
    {
        return $this->featureQueryBuilder->getSectionFeatures($sectionIds);
    }
    public function getRealFormOfResults($results)
    {
        //dd($results->groupBy('sectionName'));
        $features= [];
        foreach($results->groupBy('sectionName') as $result)
        {
            $features[] = ((new FeatureJsonCreator($result))->creator());
        }
        return $features;
    }
}