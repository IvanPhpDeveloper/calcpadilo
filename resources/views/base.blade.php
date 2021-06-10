@include('head.head')
<body>

<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper row m-0" style="    min-height: 82px;">
            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="header-logo-wrapper col-auto p-0">
                <div class="logo-wrapper">
                    <a href="padilo.pro" target="_blank">
                        <img class="img-fluid" src="/img/logo.png" alt="">
                    </a>
                </div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
            </div>
            <div class="left-header col horizontal-wrapper ps-0">
<!--                <label for="text">Стоимость часа для клиента</label>
                <input type="number" class="form-control" placeholder="введите стоимость часа" step="1" min="15">-->
            </div>
            <div class="nav-right col-8 pull-right right-header p-0">
                <ul class="nav-menus"></ul>

            </div>
            <script class="result-template" type="text/x-handlebars-template">
                <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName"></div>
                    </div>
                </div>
            </script>
            <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
            <div>
                <div class="logo-wrapper">
                    <a href="index.html">
                        <img class="img-fluid for-light" src="/img/logo.png" alt="" style="    width: 100%;object-fit: contain;height: 52px;">
                    </a>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>

                </div>
                <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="sidebar-menu">
                        <ul class="sidebar-links" id="simple-bar">
                            <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>

                            <li class="sidebar-main-title">
                                <div>
                                    <h6 class="lan-8">Выбор категории</h6>
                                </div>
                            </li>

                            @foreach($categories as $category)
                                <li class="sidebar-list ">
                                    <a class=" showAreaTable sidebar-link sidebar-title link-nav" href="#" data-tableid="{{$category->id}}" >
                                        <i data-feather="sunrise"> </i>
                                        <span>{{$category->title}}</span>
                                    </a>
                                </li>
                            @endforeach




                            @if(Auth::user())
                                <li class="sidebar-list">
                                    <form action="{{route('category.new')}}"  method="post" style="    display: flex;flex-direction: column;margin: 20px 0;height: 90px;justify-content: space-between;">
                                        @csrf
                                        <input type="text" name="title" placeholder="Название категории" class="form-control" required >
                                        <button class="btn btn-success btn-lg" type="submit">Создать</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </nav>
            </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
            @yield('content')
        </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0"><a href="padilo.pro">padilo.pro</a> 2021   </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="/assets/js/jquery-3.5.1.min.js"></script>
<script src="/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="/assets/js/icons/feather-icon/feather-icon.js"></script>
<script src="/assets/js/scrollbar/simplebar.js"></script>
<script src="/assets/js/scrollbar/custom.js"></script>
<script src="/assets/js/config.js"></script>
<script src="/assets/js/sidebar-menu.js"></script>
<script src="/assets/js/tooltip-init.js"></script>
<script src="/js/custom.js"></script>
<!--
мешает выводить свой текст в меню
<script src="../assets/js/script.js"></script>
<script src="../assets/js/theme-customizer/customizer.js"></script>
-->

</body>
@include('footer.footer')
