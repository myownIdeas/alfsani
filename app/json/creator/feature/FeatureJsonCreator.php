<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 5/16/2017
 * Time: 9:35 PM
 */

namespace App\json\creator\feature;
use App\json\creator\jsonCreator;
use App\json\jsonInterface\Creator;
use App\json\prototype\feature\featurePrototype\featurePrototype;
use App\json\prototype\feature\FeatureSectionPrototype\FeatureSectionPrototype;

class FeatureJsonCreator extends jsonCreator implements Creator
{
    public $results;
    public $featureSection,$featureProtoType;
    public function __construct($results)
    {
        $this->results = $results;
        $this->featureSection = new FeatureSectionPrototype();
        $this->featureProtoType = new featurePrototype();
    }
    public function creator()
    {
       $this->featureSection->id =(isset($this->results[0]))?$this->results[0]->section_id:'No Id';
        $this->featureSection->sectionName = (isset($this->results[0]))?$this->results[0]->sectionName:'No Name';
        $this->featureSection->features = $this->getFeature($this->results);
        return $this->featureSection;
    }
    public function makeHtml($feature){
       //dd(explode(',',$feature->possibleValues));
        static $ABC = 0;
        $record = "";
        if( $feature->htmlType === 'textbox' )
               $record =  '<input type="'.$feature->htmlType.'" id ="'.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$ABC.'__'.$feature->htmlType).'" name="features['.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$ABC.'__'.$feature->htmlType).']">';

        elseif(  $feature->htmlType === 'radio' ){
            $finalRecord = [];
            foreach(explode(',',$feature->possibleValues) as $record){
                $val = $ABC++;
                $finalRecord[] = '<input type="'.$feature->htmlType.'" id = "'.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$val.'__'.$feature->htmlType).'" name="features['.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.'__'.$feature->htmlType).']" value="'.$record.'_'.$val.'">'.$record;
            }
            $record =  implode(' ',$finalRecord);
        }
        else if( $feature->htmlType === 'checkbox')
            $record =  '<input type="'.$feature->htmlType.'" id = "'.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$ABC.'__'.$feature->htmlType).'" name="features['.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$ABC++.'__'.$feature->htmlType).'] value="'.$feature->value.'">';

        elseif($feature->htmlType === 'textarea' )
            $record =  '<textarea name="features['.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$ABC.'__'.$feature->htmlType).']" id = "'.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$ABC.'__'.$feature->htmlType).'"></textarea>';

        elseif($feature->htmlType === 'selectbox' ){
            $finalRecord =[];
            foreach(explode(',',$feature->possibleValues) as $record){
                $finalRecord[] = '<option value="'.$record.'">'.$record.'</option>';
            }
            $record =   '<select name="features['.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$ABC.'__'.$feature->htmlType).']" id = "'.str_replace(' ','',$feature->sectionName.'_'.$feature->sectionId.'_'.$feature->label.'_'.$feature->id.$ABC.'__'.$feature->htmlType).'">
                               <option value="">Please Select</option>
                                '.implode(' ',$finalRecord).'
                                </select>';
        }


        return $record;
        }
    public function getFeature($results)
    {
        $final = [];
        foreach ($results as $result)
        {

            $protoType = clone($this->featureProtoType);
            $protoType->id = $result->id;
            $protoType->htmlType = $result->htmlName;
            $protoType->name = $result->feature_name;
            $protoType->label = $result->feature_label;
            $protoType->value = $result->feature_value;
            $protoType->sectionId = $result->sectionId;
            $protoType->sectionName = $result->sectionName;
            $protoType->possibleValues = $result->possible_values;
            $protoType->html = $this->makeHtml($protoType);
            $final[] = $protoType;
        }
        return $final;
    }

}