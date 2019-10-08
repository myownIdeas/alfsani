<?php

namespace App\Listeners\feature;

use App\Events\Event;
use App\Events\feature\featureJsonCreator;
use App\Models\CategoryFeatureJson;
use App\Repositories\Repositories\categories\categoriesRepo;
use App\Repositories\Repositories\CategorySection\CategorySectionRepo;
use App\Repositories\Repositories\Feature\CategoryFeaturesJsonRepo;
use App\Repositories\Repositories\Feature\FeatureRepo;


class CreateFeatureJsonDocument
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $basicStructurePrototype;
    public $featureRepo;
    public $categorySection;
    public $categoryFeatureJsonQueryBuilder,$categories;
    public function __construct()
    {
       $this->categoryFeature = new CategoryFeatureJson();
        $this->featureRepo = new FeatureRepo();
        //$this->categorySection = new CategorySectionRepo();
        $this->categories = new categoriesRepo();

        $this->categoryFeatureJsonQueryBuilder = new CategoryFeaturesJsonRepo();
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(FeatureJsonCreator $event)
    {
        //$sectionCategories = $this->categorySection->getSectionCategories($event->sectionId);
        $categories = $this->categories->all();
        foreach($categories as $category){
            $this->categoryFeature->categoryId = $category->id;
            $this->categoryFeature->json = $this->featureRepo->getCategorySectionsFeatures($category->id);
            $this->categoryFeatureJsonQueryBuilder->delete($this->categoryFeature);
            $this->categoryFeatureJsonQueryBuilder->store($this->categoryFeature);
        }
    }
}
