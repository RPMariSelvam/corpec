<?php

namespace app\modules\site\frontend\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Get Startbutton Block.
 *
 * File has been created with `block/create` command. 
 */
class GetStartbuttonBlock extends PhpBlock
{
    /**
     * @var string The module where this block belongs to in order to find the view files.
     */
    public $module = 'site';

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
        return 'Get Startbutton Block';
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
                 ['var' => 'getStart', 'label' => 'GetStart', 'type' => self::TYPE_LINK],
            ],
        ];
    }
    
    /**
     * {@inheritDoc} 
     *
     * @param {{vars.getStart}}
    */
    public function admin()
    {
        return '<h5 class="mb-3">Get Startbutton Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.getStart is not empty %}' .
            '<tr><td><b>GetStart</b></td><td>{{vars.getStart}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}