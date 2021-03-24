<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component {

    public $menuArray;
    public $adminLogoArray;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        $this->adminLogoArray = array(
            'uri' => '#',
            'img' => 'https://www.google.com/url?sa=i&url=http%3A%2F%2Fclipart-library.com%2Fgood-student-cliparts.html&psig=AOvVaw25gBQIzv7anXv3xPpkFhfl&ust=1616603403630000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCJjb0JPrxu8CFQAAAAAdAAAAABAD'
        );
        
            //details for menu
            $this->menuArray = [
               
                'students' => [
                    'position' => 1,
                    'level' => 1,
                    'name' => 'Students',
                    'icon' => 'ti-user',
                    'uri' => route('student.get'),
                ],
                'marks' => [
                    'position' => 1,
                    'level' => 1,
                    'name' => 'Marks',
                    'icon' => 'ti-book',
                    'uri' => route('mark.get'),
                ],
            ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render() {
        return view('components.sidebar');
    }

}
