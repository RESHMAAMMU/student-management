<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo">
                <a href="{{$adminLogoArray['uri']}}">
                    <img src="{{$adminLogoArray['img']}}" class="img-fluid img-fluid-01">
                </a>
            </div>
            <ul class="slide">
                @foreach ( $menuArray as $menu )
                @if ($menu['level'] == 1)
                @if(!empty($menu['inner_uri']) && request()->url() == $menu['inner_uri'])
                <li class="active">
                    <a href="{{$menu['uri']}}">
                        <i class="{{$menu['icon']}}"></i> {{$menu['name']}}
                    </a>
                </li>
                @else
                <li @if(request()->url() == $menu['uri']) class="active" @endif>
                    <a href="{{$menu['uri']}}">
                        <i class="{{$menu['icon']}}"></i> {{$menu['name']}}
                    </a>
                </li>
                @endif
                @elseif($menu['level'] > 1)

                @php $uri = Arr::pluck($menu['submenus'], 'uri') @endphp
                @php $isActive = in_array(request()->url(), $uri) @endphp

                <li @if($isActive) class="active open" @endif>
                    <a class="sidebar-sub-toggle">
                        <i class="{{$menu['icon']}}"></i>
                            {{$menu['name']}}
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>

                    <ul @if($isActive) style="display: block;" @endif>
                        @foreach ($menu['submenus'] as $submenu )
                        <li @if(request()->url() == $submenu['uri']) class="active" @endif>
                            <a href="{{$submenu['uri']}}">{{$submenu['name']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>