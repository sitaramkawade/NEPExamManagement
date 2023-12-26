<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProgressLink extends Component
{
   public $last;
   public $step;
   public $current;
   public $name;


    public function __construct($name,$current,$step,$last=null )
    {
        $this->last=$last;
        $this->step=$step;
        $this->current=$current;
        $this->name=$name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.progress-link');
    }
}
