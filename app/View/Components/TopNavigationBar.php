<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class TopNavigationBar extends Component
{
    /**
     * The authenticated user
     */
    public $user;

    /**
     * Links to display on the navigation bar
     */
    public $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?User $user, Array $links)
    {
        $this->user = $user;
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.top-navigation-bar');
    }
}
