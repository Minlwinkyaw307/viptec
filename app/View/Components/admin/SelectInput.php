<?php

namespace App\View\Components\admin;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class SelectInput extends Component
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
     * @var array|Collection
     */
    public $options;

    /**
     * @var string|array|null
     */
    public $value;

    /**
     * @var string
     */
    public $type;

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
    public $required;

    /**
     * @var boolean
     */
    public $disabled;

    /**
     * @var boolean
     */
    public $multiple;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string|null $label
     * @param $options
     * @param string|array|null $value
     * @param string|null $type
     * @param string|null $placeholder
     * @param null|string $id
     * @param null|string $input_class
     * @param bool $required
     * @param bool $disabled
     * @param bool $multiple
     */
    public function __construct(string $name, ?string $label,
                                $options, $value, $type='text',
                                $placeholder='Please Fill The Form',
                                $id=null, $input_class=null,
                                $required=true, $disabled=false, $multiple=false)
    {
        $this->name = $name;

        $this->label = $label;

        $this->options = $options;

        $this->value = $value;

        $this->type = $type;

        $this->placeholder = $placeholder;

        if($id == null)
        {
            $this->id = Str::random();
        }

        $this->input_class = $input_class;

        $this->required = $required;

        $this->disabled = $disabled;

        $this->multiple = $multiple;
    }

    /**
     * Return give options was selected or not
     *
     * @param $option
     * @return string
     */
    public function is_selected($option): string
    {
        if($option == null && $this->value == '')
            return 'selected';
        if($this->multiple ? in_array($option, $this->value) : $option == $this->value)
            return 'selected';
        return '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.select-input');
    }
}
