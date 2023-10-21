<!-- Menu -->
@php
    // function isActive($child)
    // {
    //     foreach ($child as $item) {
    //         if (url()->current() == route($item['route'])) {
    //             return true;
    //         }
    //     }
    // }
    $menu = [
        [
            'name' => 'Tổng quan',
            'classIcon' => 'menu-icon tf-icons bx bx-home-circle',
            'route' => 'dashboard.index',
            'children' => [],
        ],
        [
            'name' => 'Quản lý địa điểm',
            'classIcon' => 'menu-icon tf-icons bx bxs-edit-location',

            'route' => '#',
            'children' => [['name' => 'Thêm mới địa điểm', 'route' => 'dashboard.destination.add'], ['name' => 'Danh sách địa điểm', 'route' => 'dashboard.destination.index']],
        ],
        [
            'name' => 'Quản lý chuyến đi',
            'classIcon' => 'menu-icon tf-icons bx bx-car',

            'route' => '#',
            'children' => [['name' => 'Thêm mới chuyến đi', 'route' => 'dashboard.tour.add'], ['name' => 'Danh sách chuyến đi', 'route' => 'dashboard.tour.index'], ['name' => 'Danh sách các xe hiện tại', 'route' => 'dashboard.vehicle.index']],
        ],
        [
            'name' => 'Quản lý đặt tour',
            'classIcon' => 'menu-icon tf-icons bx bx-category',

            'route' => '#',
            'children' => [['name' => 'Tất cả', 'route' => 'dashboard.book-tour.index']],
        ],

        [
            'name' => 'Quản lý bài viết',
            'classIcon' => 'menu-icon tf-icons bx bx-news',
            'route' => '#',
            'children' => [['name' => 'Danh sách bài viết', 'route' => 'dashboard.post.index'], ['name' => 'Tags', 'route' => 'dashboard.tag.index']],
        ],
        [
            'name' => 'Quản lý nhóm',
            'classIcon' => 'menu-icon tf-icons bx bxs-group',
            'route' => '#',
            'children' => [['name' => 'Thêm nhóm mới', 'route' => 'dashboard.group.add'], ['name' => 'Danh sách nhóm', 'route' => 'dashboard.group.index']],
        ],
        [
            'name' => 'Quản lý người dùng',
            'classIcon' => 'menu-icon tf-icons bx bxs-user-account',
            'route' => '#',
            'children' => [['name' => 'Thêm mới thành viên', 'route' => 'dashboard.user.add'], ['name' => 'Danh sách người dùng', 'route' => 'dashboard.user.index']],
        ],
    ];
    $menuDevelopment = [
        [
            'name' => 'Account Settings',
            'classIcon' => 'menu-icon tf-icons bx bx-dock-top',
            'route' => '#',
            'children' => [['name' => 'Account', 'route' => 'dashboard.templates.account-settings.account'], ['name' => 'Notifications', 'route' => 'dashboard.templates.account-settings.notifications'], ['name' => 'Connections', 'route' => 'dashboard.templates.account-settings.connections']],
        ],
        [
            'name' => 'Authentications',
            'classIcon' => 'menu-icon tf-icons bx bx-lock-open-alt',
            'route' => '#',
            'children' => [['name' => 'Login', 'route' => 'dashboard.templates.auth.login'], ['name' => 'Register', 'route' => 'dashboard.templates.auth.register'], ['name' => 'Forgot Password', 'route' => 'dashboard.templates.auth.forgot-password']],
        ],
        [
            'name' => 'Misc',
            'classIcon' => 'menu-icon tf-icons bx bx-cube-alt',
            'route' => '#',
            'children' => [['name' => 'Error', 'route' => 'dashboard.templates.misc.error'], ['name' => 'Under Maintenance', 'route' => 'dashboard.templates.misc.under-maintenance']],
        ],
        [
            'name' => 'User interface',
            'classIcon' => 'menu-icon tf-icons bx bx-box',
            'route' => '#',
            'children' => [
                ['name' => 'Accordion', 'route' => 'dashboard.templates.components.accordion'],
                ['name' => 'Alerts', 'route' => 'dashboard.templates.components.alerts'],
                ['name' => 'Badges', 'route' => 'dashboard.templates.components.badges'],
                ['name' => 'Buttons', 'route' => 'dashboard.templates.components.buttons'],
                ['name' => 'Carousel', 'route' => 'dashboard.templates.components.carousel'],
                ['name' => 'Collapse', 'route' => 'dashboard.templates.components.collapse'],
                ['name' => 'Dropdowns', 'route' => 'dashboard.templates.components.dropdowns'],

                ['name' => 'Footer', 'route' => 'dashboard.templates.components.footer'],
                ['name' => 'List groups', 'route' => 'dashboard.templates.components.list-groups'],
                ['name' => 'Modals', 'route' => 'dashboard.templates.components.modals'],
                ['name' => 'Navbar', 'route' => 'dashboard.templates.components.navbar'],
                ['name' => 'Offcanvas', 'route' => 'dashboard.templates.components.offcanvas'],
                ['name' => 'Pagination & Breadcrumbs', 'route' => 'dashboard.templates.components.pagination-breadcrumbs'],
                ['name' => 'Progress', 'route' => 'dashboard.templates.components.progress'],

                ['name' => 'Spinners', 'route' => 'dashboard.templates.components.spinners'],
                ['name' => 'Tabs & Pills', 'route' => 'dashboard.templates.components.tabs-pills'],
                ['name' => 'Toasts', 'route' => 'dashboard.templates.components.toasts'],
                ['name' => 'Tooltips & popovers', 'route' => 'dashboard.templates.components.tooltips-popovers'],

                ['name' => 'Typography', 'route' => 'dashboard.templates.components.typography'],
            ],
        ],

        [
            'name' => 'Boxicons',
            'classIcon' => 'menu-icon tf-icons bx bx-crown',
            'route' => 'dashboard.templates.components.boxicons',
            'children' => [],
        ],
        [
            'name' => 'Cards',
            'classIcon' => 'menu-icon tf-icons bx bx-collection',
            'route' => 'dashboard.templates.components.cards',
            'children' => [],
        ],
        [
            'name' => 'Extended UI',
            'classIcon' => 'menu-icon tf-icons bx bx-copy',
            'route' => '#',
            'children' => [['name' => 'Perfect scrollbar', 'route' => 'dashboard.templates.extended-ui.perfect-scrollbar'], ['name' => 'Text Divider', 'route' => 'dashboard.templates.extended-ui.text-divider']],
        ],
        [
            'name' => 'Form Elements',
            'classIcon' => 'menu-icon tf-icons bx bx-detail',
            'route' => '#',
            'children' => [['name' => 'Basic Inputs', 'route' => 'dashboard.templates.form-elements.basic-inputs'], ['name' => 'Input groups', 'route' => 'dashboard.templates.form-elements.input-groups']],
        ],
        [
            'name' => 'Form Layouts ',
            'classIcon' => 'menu-icon tf-icons bx bx-detail',
            'route' => '#',
            'children' => [['name' => 'Vertical Form', 'route' => 'dashboard.templates.form-layouts.vertical'], ['name' => 'Horizontal Form', 'route' => 'dashboard.templates.form-layouts.horizontal']],
        ],
        [
            'name' => 'Tables',
            'classIcon' => 'menu-icon tf-icons bx bx-table',
            'route' => 'dashboard.templates.tables.index',
            'children' => [],
        ],
    ];

@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: uppercase">Royal Boy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        @foreach ($menu as $item)
            @if (empty($item['children']))
                <li class="menu-item {{ url()->current() == route($item['route']) ? 'active' : '' }}">
                    <a href="{{ url()->current() == route($item['route']) ? 'javascript:void(0)' : route($item['route']) }}"
                        class="menu-link">
                        <i class="{{ $item['classIcon'] }}"></i>
                        <div data-i18n="{{ $item['name'] }}">{{ $item['name'] }}</div>
                    </a>
                </li>
            @else
                <li class="menu-item  ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="{{ $item['classIcon'] }}"></i>
                        <div data-i18n="{{ $item['name'] }}">{{ $item['name'] }} </div>
                    </a>
                    <ul class="menu-sub">
                        @foreach ($item['children'] as $children)
                            <li class="menu-item {{ url()->current() == route($children['route']) ? 'active' : '' }}">
                                <a href="{{ url()->current() == route($children['route']) ? 'javascript:void(0)' : route($children['route']) }}"
                                    class="menu-link">
                                    <div data-i18n="{{ $children['name'] }}">{{ $children['name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </li>
            @endif
        @endforeach
        {{-- Nơi dành cho routes mode development --}}
        @if (getEnv('APP_ENV') == 'local')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">development</span></li>
            @foreach ($menuDevelopment as $item)
                @if (empty($item['children']))
                    <li class="menu-item {{ url()->current() == route($item['route']) ? 'active' : '' }}">
                        <a href="{{ url()->current() == route($item['route']) ? 'javascript:void(0)' : route($item['route']) }}"
                            class="menu-link">
                            <i class="{{ $item['classIcon'] }}"></i>
                            <div data-i18n="{{ $item['name'] }}">{{ $item['name'] }}</div>
                        </a>
                    </li>
                @else
                    <li class="menu-item ">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="{{ $item['classIcon'] }}"></i>
                            <div data-i18n="{{ $item['name'] }}">{{ $item['name'] }} </div>
                        </a>
                        <ul class="menu-sub">
                            @foreach ($item['children'] as $children)
                                <li
                                    class="menu-item {{ url()->current() == route($children['route']) ? 'active' : '' }}">
                                    <a href="{{ url()->current() == route($children['route']) ? 'javascript:void(0)' : route($children['route']) }}"
                                        class="menu-link">
                                        <div data-i18n="{{ $children['name'] }}">{{ $children['name'] }}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </li>
                @endif
            @endforeach
        @endif
    </ul>
</aside>
<!-- / Menu -->
