<?php

namespace App\View\Components\admin;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class FileInput extends Component
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string
     */
    public $old;

    /**
     * @var string
     */
    public $placeholder;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $input_class;

    /**
     * @var bool
     */
    public $multiple;

    /**
     * @var bool
     */
    public $show_preview;

    public $imageId;

    /**
     * @var bool|mixed
     */
    public $previewable;

    /**
     * @var string
     */
    public $type;

    /**
     * @var bool
     */
    public $required;

    /**
     * @var boolean
     */
    public $disabled;


    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string|null $label
     * @param string|null $old
     * @param string $placeholder
     * @param null $id
     * @param null $input_class
     * @param bool $multiple
     * @param string $type
     * @param bool $required
     * @param bool $show_preview
     * @param bool $previewable
     */
    public function __construct(string $name, ?string $label,?string $old,
                                $placeholder = 'Please Fill The Form',
                                $id = null, $input_class = null,
                                $multiple=false, $type='*/*', $required=true,
                                $show_preview=true, $previewable=true, $disabled=false)
    {
        $this->name = $name;

        $this->label = $label;

        $this->old = $old;

        $this->placeholder = $placeholder;

        if ($id == null) {
            $this->id = Str::random();
        } else {
            $this->id = $id;
        }

        $this->imageId = Str::random();

        $this->input_class = $input_class;

        $this->multiple = $multiple;

        $this->type = $type;

        $this->show_preview = $show_preview;

        $this->previewable = $previewable;

        $this->required = $required;

        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.file-input');
    }
}
