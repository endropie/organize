<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WebsiteLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {

        // routename: '{{ request()->route()->getName() }}',
        // routeprefix: '{{ request()->route()->getPrefix() }}',
        return view('layouts.website', [
            "menus" => [
                [
                    "name" => "IK2T",
                    "link" => url("/"),
                    "hidden" => false,
                    "visited" => request()->route()->getName() == "welcome",
                ],
                [
                    "name" => "Keanggotaan",
                    "link" => route("members.index"),
                    "hidden" => false,
                    "visited" => request()->route()->getPrefix() == "/members",
                ],
                [
                    "name" => "Alek",
                    "link" => false,
                    "hidden" => false,
                    "visited" => request()->route()->getPrefix() == "/events",
                ],
                [
                    "name" => "Keuangan",
                    "link" => route('finances.index'),
                    "hidden" => false,
                    "visited" => request()->route()->getPrefix() == "/finances",
                ],
                [
                    "name" => "ADMIN",
                    "link" => "#",
                    "hidden" => true
                ],
            ]
        ]);
    }
}
