<?php

namespace Netflex\NewsletterFoundation\View\Components;

use Illuminate\View\Component;
use Netflex\NewsletterFoundation\Contracts\NewsletterEntryListContract;

class EntryContent extends Component
{

    public $entry;
    public $withContent;
    public $withImage;
    public $withTitle;
    public $imageWidth;
    public $area;
    public $settings;
    public $withDescription;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(NewsletterEntryListContract $entry, array $settings = [], bool $withContent = true, bool $withImage = true, bool $withDescription = true, bool $withTitle = true, int $imageWidth = 640)
    {
        $this->entry = $entry;
        $this->withContent = $withContent;
        $this->withImage = $withImage;
        $this->withTitle = $withTitle;
        $this->withDescription = $withDescription;
        $this->imageWidth = $imageWidth;
        $this->area = '__' . $entry->id;

        $default_settings = [
            'alignment' => 'left',
            'titleHeaderSelector' => 'h2',
            'showSubTitle' => false,
            'buttonClass' => 'entry-content-button',
            'metaClass' => 'entry-content-meta',
            'titleClass' => 'entry-content-title',
            'contentClass'=> 'entry-content-text',
            'imageClass' => 'entry-content-image',
        ];

        $this->settings = array_merge($default_settings, $settings);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('nnf::components.entry-content');
    }
}
