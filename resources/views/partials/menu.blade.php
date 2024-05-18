<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/audit-logs*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.audit-logs.index') }}"
                                        class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('person_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.people.index') }}"
                            class="nav-link {{ request()->is('admin/people') || request()->is('admin/people/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-user-alt">

                            </i>
                            <p>
                                {{ trans('cruds.person.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('tafsir_menu_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/surahs*') ? 'menu-open' : '' }} {{ request()->is('admin/ayas*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-language">

                            </i>
                            <p>
                                {{ trans('cruds.tafsirMenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('surah_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.surahs.index') }}"
                                        class="nav-link {{ request()->is('admin/surahs') || request()->is('admin/surahs/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-dice-one">

                                        </i>
                                        <p>
                                            {{ trans('cruds.surah.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('aya_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.ayas.index') }}"
                                        class="nav-link {{ request()->is('admin/ayas') || request()->is('admin/ayas/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-bars">

                                        </i>
                                        <p>
                                            {{ trans('cruds.aya.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('blog_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.blogs.index') }}"
                            class="nav-link {{ request()->is('admin/blogs') || request()->is('admin/blogs/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-edit">

                            </i>
                            <p>
                                {{ trans('cruds.blog.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('audio_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.audios.index') }}"
                            class="nav-link {{ request()->is('admin/audios') || request()->is('admin/audios/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-volume-up">

                            </i>
                            <p>
                                {{ trans('cruds.audio.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('book_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.books.index') }}"
                            class="nav-link {{ request()->is('admin/books') || request()->is('admin/books/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-book-open">

                            </i>
                            <p>
                                {{ trans('cruds.book.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('audio_book_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.audio-books.index') }}"
                            class="nav-link {{ request()->is('admin/audio-books') || request()->is('admin/audio-books/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fab fa-audible">

                            </i>
                            <p>
                                {{ trans('cruds.audioBook.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('question_access')
                    <li class="nav-item">
                        <a href="{{ route('admin.questions.index') }}"
                            class="nav-link {{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                            <i class="fa-fw nav-icon fas fa-question">

                            </i>
                            <p>
                                {{ trans('cruds.question.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('others_menu_access')
                    <li
                        class="nav-item has-treeview {{ request()->is('admin/categories*') ? 'menu-open' : '' }} {{ request()->is('admin/pages*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw nav-icon fas fa-file">

                            </i>
                            <p>
                                {{ trans('cruds.othersMenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('category_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}"
                                        class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon fas fa-list">

                                        </i>
                                        <p>
                                            {{ trans('cruds.category.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('page_access')
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.index') }}"
                                        class="nav-link {{ request()->is('admin/pages') || request()->is('admin/pages/*') ? 'active' : '' }}">
                                        <i class="fa-fw nav-icon far fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.page.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                <li class="nav-item">
                    <a href="{{ route('admin.attentions.index') }}"
                       class="nav-link {{ request()->is('admin/attentions') || request()->is('admin/attentions/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-bell">

                        </i>
                        <p>
                            {{ trans('app.attentions') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.suggestions.index') }}"
                       class="nav-link {{ request()->is('admin/suggestions') || request()->is('admin/suggestions/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-plus">

                        </i>
                        <p>
                            {{ trans('app.suggestions') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.donations.index') }}"
                       class="nav-link {{ request()->is('admin/donations') || request()->is('admin/donations/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-heart">

                        </i>
                        <p>
                            {{ trans('app.donations') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.advice.index') }}"
                       class="nav-link {{ request()->is('admin/advice') || request()->is('admin/advice/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-file">

                        </i>
                        <p>
                            {{ trans('app.advice') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.youtubevideos.index') }}"
                       class="nav-link {{ request()->is('admin/youtubevideos') || request()->is('admin/youtubevideos/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-video">

                        </i>
                        <p>
                            {{ trans('app.youtubevideos') }}
                        </p>
                    </a>
                </li>


                <li
                        class="nav-item has-treeview {{ request()->is('admin/hadith*') ? 'menu-open' : '' }} {{ request()->is('admin/chapters*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw nav-icon fas fa-file">

                        </i>
                        <p>
                            {{ trans('app.hadith') }}
                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{ route('admin.chapters.index') }}"
                                   class="nav-link {{ request()->is('admin/chapters') || request()->is('admin/chapters/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-list">

                                    </i>
                                    <p>
                                        {{ trans('app.chapters') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.hadith.index') }}"
                                   class="nav-link {{ request()->is('admin/hadith') || request()->is('admin/hadith/*') ? 'active' : '' }}">
                                    <i class="fa-fw nav-icon fas fa-list">

                                    </i>
                                    <p>
                                        {{ trans('app.hadith') }}
                                    </p>
                                </a>
                            </li>


                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.prayer.index') }}"
                       class="nav-link {{ request()->is('admin/prayer') || request()->is('admin/prayer/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-book">

                        </i>
                        <p>
                            {{ trans('app.prayer books') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tajweeds.index') }}"
                       class="nav-link {{ request()->is('admin/tajweeds') || request()->is('admin/tajweeds/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-book">

                        </i>
                        <p>
                            {{ trans('app.tajweeds books') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}"
                       class="nav-link {{ request()->is('admin/product') || request()->is('admin/product/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-box">

                        </i>
                        <p>
                            {{ trans('app.products') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}"
                       class="nav-link {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-list">

                        </i>
                        <p>
                            {{ trans('app.orders') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.contact_us.index') }}"
                       class="nav-link {{ request()->is('admin/contact_us') || request()->is('admin/contact_us/*') ? 'active' : '' }}">
                        <i class="fa-fw nav-icon fas fa-phone">

                        </i>
                        <p>
                            {{ trans('app.contact_us') }}
                        </p>
                    </a>
                </li>

                @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                                href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
