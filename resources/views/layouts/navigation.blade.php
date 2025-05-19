<!-- resources/views/layouts/navigation.blade.php -->

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.support.reception.create') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    <!-- 顧客登録 -->
                    <x-nav-link :href="route('admin.customer.create')" :active="request()->routeIs('admin.customer.create')">
                        顧客登録
                    </x-nav-link>

                    <x-nav-link :href="route('admin.customer.index')" :active="request()->routeIs('admin.customer.index')">
                        顧客一覧
                    </x-nav-link>

                    <!-- 対応受付 -->
                    <x-nav-link :href="route('admin.support.reception.create')" :active="request()->routeIs('admin.support.reception.*')">
                        対応受付
                    </x-nav-link>

                    <!-- 対応一覧 -->
                    <x-nav-link :href="route('admin.support.index')" :active="request()->routeIs('admin.support.index')">
                        対応一覧
                    </x-nav-link>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path d="M5.25 7L10 11.75 14.75 7z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        {{-- Breeze標準のプロフィール編集リンク（将来的な管理者設定画面用として保持） --}}
                        <x-dropdown-link :href="route('profile.edit')">
                            プロフィール
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                ログアウト
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
