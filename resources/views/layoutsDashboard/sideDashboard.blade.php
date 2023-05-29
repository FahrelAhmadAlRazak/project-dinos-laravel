<main class="flex">
        <div id="sidebar" class="bg-admin-secondary hidden sm:flex flex-col gap-5 lg:w-1/6 pt-28 h-screen">
            <div class="flex items-center gap-3 mx-4">
                <img src="{{ asset('images/user.svg') }}" class="h-12" alt="">
                <p class="text-white hidden lg:block">{{ auth()->user()->nama }}</p>
                {{-- @if(Str::length(Auth::guard('dataAkunAdmin')->user()) > 0)
                <p class="text-white hidden lg:block">{{ Auth::guard('dataAkunAdmin')->user()->nama }}</p>
                @elseif(Str::length(Auth::guard('dataAkunMitra')->user()) > 0)
                <p class="text-white hidden lg:block">{{ Auth::guard('dataAkunMitra')->user()->nama }}</p>
                @elseif(Str::length(Auth::guard('dataAkunKurir')->user()) > 0)
                <p class="text-white hidden lg:block">{{ Auth::guard('dataAkunKurir')->user()->nama }}</p>
                @endif --}}

            </div>
            <hr>
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/home_active.svg') }}" class="w-5" alt="">
                <p class="text-yellow hidden lg:block">Dashboard</p>
            </a>

            <a href="{{ route('show_akun') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/person.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Akun</p>
            </a>
            @can('admin')
            <a href="{{ route('pengajuan') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/document.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Pengajuan</p>
            </a>
            @endcan

            @can('mitra')
            <a href="{{ route('pengajuan') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/document.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Pengajuan</p>
            </a>
            @endcan
           
            @can('admin')
            <a href="{{ route('pengiriman') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/truck.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Pengiriman</p>
            </a>
            @endcan

            @can('mitra')
            <a href="{{ route('pengiriman') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/truck.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Pengiriman</p>
            </a>
            @endcan

            @can('kurir')
            <a href="{{ route('lihatPengiriman') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/truck.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Pengiriman</p>
            </a>
            @endcan

            <!-- <a href="/test/pages/admin/" class="flex items-center gap-3 px-8">
                <img src="images/monitor.svg" class="w-5" alt="">
                <p class="text-white hidden lg:block">Monitor</p>
            </a> -->
            @can('admin')
            <a href="{{ route('monitor') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/monitor.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Monitor</p>
            </a>
            @endcan
            @can('mitra')
            <a href="{{ route('monitor') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/monitor.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Monitor</p>
            </a>
            @endcan

            @can('mitra')
            <a href="{{ route('pencatatan') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/pencatatan.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Pencatatan</p>
            </a>
            @endcan

           

            @can('admin')
            <a href="{{ route('artikel') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/blog.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Artikel</p>
            </a>
            @endcan
            
            @can('mitra')
            <a href="{{ route('artikel') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/blog.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Artikel</p>
            </a>
            @endcan


            @can('admin')
            <a href="{{ route('dataPartner') }}" class="flex items-center gap-3 px-8">
                <img src="{{ asset('images/hand.svg') }}" class="w-5" alt="">
                <p class="text-white hidden lg:block">Partner</p>
            </a>
           @endcan
        </div>