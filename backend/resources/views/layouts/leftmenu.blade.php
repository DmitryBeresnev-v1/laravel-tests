<div class="sticky">
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<div class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="index.html">
            <img src="{{secure_asset('assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{secure_asset('assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{secure_asset('assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{secure_asset('assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <div class="main-sidemenu">
        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
        <ul class="side-menu">
            <li class="sub-category">
                <h3>Общая информация</h3>
            </li>
            <li class="slide">
                <a class="side-menu__item has-link" data-bs-toggle="slide" href="/admin/topic/all"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Все темы</span></a>
            </li>
            <li class="sub-category">
                <h3>Мои действия</h3>
            </li>
            <li class="slide">
                <a class="side-menu__item has-link" data-bs-toggle="slide" href="/admin/topic"><i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Мои темы</span></a>
                <a class="side-menu__item has-link" data-bs-toggle="slide" href="/admin/test/create"><i class="side-menu__icon fe fe-package"></i><span class="side-menu__label">Создать тест</span></a>
            </li>
            <li class="sub-category">
                <h3>Просмотр</h3>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Клиент</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="slide-menu">
                    <li class="side-menu-label1"><a href="javascript:void(0)">Предметы</a></li>
                    <li><a href="/cards" class="slide-item"> Общий</a></li>
                    <li><a href="/cards/create" class="slide-item"> Предмет 1</a></li>
                    <li><a href="/cards/create" class="slide-item"> Предмет 2</a></li>
                </ul>
            </li>

            <li class="sub-category">
                <h3>Администратор</h3>
            </li>
            <li class="slide">

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="/admin/users"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Пользователи</span></a>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="/admin/subject"><i class="side-menu__icon fe fe-cpu"></i><span class="side-menu__label">Создать предмет</span></a>
                </li>
            </li>

        </ul>
        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/></svg></div>
    </div>
</div>
<!--/APP-SIDEBAR-->
</div>