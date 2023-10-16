<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Imagesliderblock Block.
 *
 * File has been created with `block/create` command. 
 */
class ImagesliderblockBlock extends PhpBlock
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
        return 'Imagesliderblock Block';
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
                 ['var' => 'image', 'label' => 'image', 'type' => self::TYPE_IMAGEUPLOAD_ARRAY, 'options' => ['no_filter' => false]],
            ],
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'image' => BlockHelper::imageArrayUpload($this->getVarValue('image'), false, true),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{extras.image}}
     * @param {{vars.image}}
    */
    public function admin()
    {
        return '<h5 class="mb-3">Imagesliderblock Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.image is not empty %}' .
            '<tr><td><b>image</b></td><td>{{vars.image}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}