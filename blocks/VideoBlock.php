<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;
use luya\cms\frontend\blockgroups\MediaGroup;
use luya\bootstrap3\Module;

/**
 * Video Block.
 *
 * File has been created with `block/create` command. 
 */
class VideoBlock extends PhpBlock
{
    const PROVIDER_YOUTUBE = 'youtube';
    
    const PROVIDER_YOUTUBE_EMBED_URL = 'https://www.youtube.com/embed/';
    
    const PROVIDER_VIMEO = 'vimeo';
    
    const PROVIDER_VIMEO_EMBED_URL = 'https://player.vimeo.com/video/';
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
        return 'Video Block';
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
                ['var' => 'url', 'label' => Module::t('block_video_url_label'), 'type' => self::TYPE_TEXT],
            ],
            'cfgs' => [
                ['var' => 'controls', 'label' => Module::t('block_video_controls_label'), 'type' => self::TYPE_CHECKBOX],
                ['var' => 'width', 'label' => Module::t('block_video_width_label'), 'type' => self::TYPE_NUMBER],
            ],
        ];
    }
    public function getFieldHelp()
    {
        return [
            'url' => Module::t('block_video_help_url'),
            'controls' => Module::t('block_video_help_controls'),
            'width' => Module::t('block_video_help_width'),
        ];
    }
    
    /**
     * Ensure the emebed youtube url based on url var.
     *
     * @return string
     */
    public function embedYoutube()
    {
        parse_str(parse_url($this->getVarValue('url'), PHP_URL_QUERY), $args);
        // ensure if v argument exists
        if (isset($args['v'])) {
            $params['rel'] = 0;
            if ($this->getCfgValue('controls')) {
                $params['controls'] = 0;
            }
            return self::PROVIDER_YOUTUBE_EMBED_URL . $args['v'] . '?' . http_build_query($params);
        }
    }
    
    /**
     * Ensure the emebed vimeo url based on url var.
     *
     * @return string
     */
    public function embedVimeo()
    {
        return self::PROVIDER_VIMEO_EMBED_URL . ltrim(parse_url($this->getVarValue('url'), PHP_URL_PATH), '/');
    }

    /**
     * Construct the url based on url input.
     *
     * @return string
     */
    public function constructUrl()
    {
        if ($this->getVarValue('url')) {
            preg_match('/(?:www\.)?([a-z]+)(?:\.[a-z]+)?/', parse_url($this->getVarValue('url'), PHP_URL_HOST), $match);
            if (isset($match[1])) {
                switch ($match[1]) {
                    case self::PROVIDER_YOUTUBE: return $this->embedYoutube();
                    case self::PROVIDER_VIMEO: return $this->embedVimeo();
                }
            }
        }
        
        return null;
    }
    
    /**
     * @inheritdoc
     */
    public function extraVars()
    {
        return [
            'url' => $this->constructUrl(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function admin()
    {
        return '{% if extras.url is not empty %}<div class="iframe-container"><iframe src="{{ extras.url }}" frameborder="0" allowfullscreen></iframe></div>{% else %}<span class="block__empty-text">' . Module::t('block_video_no_video') . '</span>{% endif %}';
    }
}

