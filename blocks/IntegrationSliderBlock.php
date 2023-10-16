<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Integration Slider Block.
 *
 * File has been created with `block/create` command. 
 */
class IntegrationSliderBlock extends PhpBlock
{
    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = true;

    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;
    
    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public function blockGroup()
    {
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Integration Slider Block';
    }
    
    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'extension'; // see the list of icons on: https://design.google.com/icons/
    }
 
    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                 ['var' => 'imagearray', 'label' => 'imagearray', 'type' => self::TYPE_IMAGEUPLOAD_ARRAY, 'options' => ['no_filter' => false]],
            ],
            'cfgs' => [
                 ['var' => 'link', 'label' => 'link', 'type' => self::TYPE_LINK],
            ],
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'imagearray' => BlockHelper::imageArrayUpload($this->getVarValue('imagearray'), false, true),
            'link' => BlockHelper::linkObject($this->getCfgValue('link'), false, true),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{cfgs.link}}
     * @param {{extras.imagearray}}
     * @param {{vars.imagearray}}
    */
    public function admin()
    {
        return '<h5 class="mb-3">Integration Slider Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.imagearray is not empty %}' .
            '<tr><td><b>imagearray</b></td><td>{{vars.imagearray}}</td></tr>' .
            '{% endif %}'.
            '{% if cfgs.link is not empty %}' .
            '<tr><td><b>link</b></td><td>{{cfgs.link}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}