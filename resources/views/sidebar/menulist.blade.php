<nav id="sidebar">
    <div class="navbar-nav theme-brand flex-row  text-center">
        <div class="nav-logo">
            <div class="nav-item theme-logo">
                <a href="#">
                    <img src="{{ asset('backend/images/company_logo/dummy-logo.jpg') }}" class="navbar-logo" alt="logo">
                </a>
            </div>
            <div class="nav-item theme-text">
                <a href="#" class="nav-link"> Redlep IT </a>
            </div>
        </div>
        <div class="nav-item sidebar-toggle">
            <div class="btn-toggle sidebarCollapse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
            </div>
        </div>
    </div>
    <div class="shadow-bottom"></div>
    @if(Auth::check())
    <ul class="list-unstyled menu-categories" id="accordionExample" >
        @if(Auth::check() && Auth::user()->role=='admin' || Auth::user()->role=='manager')
        <li class="menu {{ (!empty($blog) && $blog==true)?'active':'' }}">
            <a href="#blog_menu" data-bs-toggle="collapse" aria-expanded="{{ (!empty($settings) && $settings==true)?'true':'false' }}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                    <span>Blogs</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
            </a>
            <ul class="{{ (!empty($blog) && $blog==true)?'collapse show':'collapse' }} submenu list-unstyled" id="blog_menu" data-bs-parent="#accordionExample">
                <li class="{{ (!empty($add_blog) && $add_blog==true)?'active':'' }}">
                    <a href="{{ URL::to('create-blog') }}"> Create Blog </a>
                </li>
                <li class="{{ (!empty($blog_categories_menu) && $blog_categories_menu==true)?'active':'' }}">
                    <a href="{{ URL::to('blog-categories') }}"> Blog Categories </a>
                </li>
                <li class="{{ (!empty($blog_list_menu) && $blog_list_menu==true)?'active':'' }}">
                    <a href="{{ URL::to('list-blog') }}"> Blog List </a>
                </li>
            </ul>
        </li>
        @endif
        @if(Auth::check() && Auth::user()->role=='admin' || Auth::user()->role=='manager')
        <li class="menu {{ (!empty($settings) && $settings==true)?'active':'' }}">
            <a href="#settings" data-bs-toggle="collapse" aria-expanded="{{ (!empty($settings) && $settings==true)?'true':'false' }}" class="dropdown-toggle">
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings "><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    <span>Settings</span>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </div>
            </a>
            <ul class="{{ (!empty($settings) && $settings==true)?'collapse show':'collapse' }} submenu list-unstyled" id="settings" data-bs-parent="#accordionExample">
                <li class="{{ (!empty($company_settings) && $company_settings==true)?'active':'' }}">
                    <a href="{{ URL::to('company-settings') }}"> Software Settings </a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
    @endif
</nav>
