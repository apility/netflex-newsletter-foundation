<?php

namespace Netflex\NewsletterFoundation\View\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Image extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $area;
    public $size;
    public $mode;
    public $styles;
    public $default;
    public $dimensions;
    public $src;
    public $alt;
    public $title;
    public $class;
    public $href;

    public function __construct($area, $size, $mode = '4:3', $styles = null, $default = null, $class = null, $href = null)
    {
        $this->area = $area;
        $this->size = $size;
        $this->mode = content($area . '__mode', 'select') ?? $mode;
        $this->styles = $styles;
        $this->default = $default;
        $this->dimensions = $this->getDimensions();
        $this->src = $this->getImageSrc();
        $this->alt = $this->getAlt();
        $this->title = $this->getTitle();
        $this->class = $class;
        $this->href = $href;
    }

    public function imageFormats()
    {
        return array_merge(Config::get('newsletter-foundation.image_formats'), ['custom' => 'Velg eget format']);
    }

    public function getHeight()
    {
        if($this->mode === 'custom')
        {
            if(!Str::contains(content($this->area . '__customMode', 'text'), ':')) {
                $prop = ['4', '3'];
            } else {
                $prop = explode(':', content($this->area . '__customMode', 'text') ?? '4:3');
            }

        } elseif(Str::contains($this->mode, ':')) {
            $prop = explode(':', $this->mode);
        } else {
            $prop = ['4', '3'];
        }

        return floor(($this->size / ((int) $prop[0])) * ((int) $prop[1]));

    }

    public function getAlt()
    {
        if(content($this->area, 'image')) {
            return content($this->area, 'image')->description;
        }

        return null;
    }

    public function getTitle()
    {
        if(content($this->area, 'image')) {
            return content($this->area, 'image')->title;
        }

        return null;
    }

    public function getDimensions()
    {
        $width = $this->size * 3;
        $height = $this->getHeight() * 3;
        return $width . 'x' . floor($height);
    }

    public function getImageSrc()
    {
        if(content($this->area, 'image'))
        {
            return media_url(content($this->area, 'image'), $this->getDimensions());
        } elseif($this->default) {
            return media_url($this->default, $this->getDimensions());
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('nnf::components.image');
    }
}
