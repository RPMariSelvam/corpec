<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Linkbutton Block.
 *
 * File has been created with `block/create` command. 
 */
class LinkbuttonBlock extends PhpBlock
{
    /**
     * @var boolean Choose whether block is a layout/container/segmnet/section block or not, Container elements will be optically displayed
     * in a different way for a better user experience. Container block will not display isDirty colorizing.
     */
    public $isContainer = true;

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
        return 'Linkbutton Block';
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
            'cfgs' => [
                 ['var' => 'link', 'label' => 'linl\k', 'type' => self::TYPE_LINK],
            ],
        ];
    }
    
    /**
     * {@inheritDoc} 
     *
     * @param {{cfgs.link}}
    */
    public function admin()
    {
        return '<h5 class="mb-3">Linkbutton Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if cfgs.link is not empty %}' .
            '<tr><td><b>linl\k</b></td><td>{{cfgs.link}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}