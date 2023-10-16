<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;

/**
 * Hrm Integration Block.
 *
 * File has been created with `block/create` command. 
 */
class HrmIntegrationBlock extends PhpBlock
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
        return 'Hrm Integration Block';
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
                 ['var' => 'hrmimage', 'label' => 'hrmimage', 'type' => self::TYPE_IMAGEUPLOAD_ARRAY, 'options' => ['no_filter' => false]],
            ],
        ];
    }
    
    /**
     * @inheritDoc
     */
    public function extraVars()
    {
        return [
            'hrmimage' => BlockHelper::imageArrayUpload($this->getVarValue('hrmimage'), false, true),
        ];
    }

    /**
     * {@inheritDoc} 
     *
     * @param {{extras.hrmimage}}
     * @param {{vars.hrmimage}}
    */
    public function admin()
    {
        return '<h5 class="mb-3">Hrm Integration Block</h5>' .
            '<table class="table table-bordered">' .
            '{% if vars.hrmimage is not empty %}' .
            '<tr><td><b>hrmimage</b></td><td>{{vars.hrmimage}}</td></tr>' .
            '{% endif %}'.
            '</table>';
    }
}