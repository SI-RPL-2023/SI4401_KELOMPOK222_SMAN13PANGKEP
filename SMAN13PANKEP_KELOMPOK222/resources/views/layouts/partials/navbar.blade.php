<nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color: #ffffff;">
    <div class="container-md">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/backend/logo.png') }}" width="200" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}" style="font-family:San-serif">DASHBOARD</a>
                </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            MASTER
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ekstrakulikuler.index') }}"
                                    style="font-family:San-serif">EKSTRAKULIKULER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('aktivitas.index') }}"
                                    style="font-family:San-serif">AKTIVITAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('siswa.index') }}"
                                    style="font-family:San-serif">SISWA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('absensi.index') }}"
                                    style="font-family:San-serif">ABSEN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('buku.index') }}"
                                    style="font-family:San-serif">BUKU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('peminjaman-buku.index') }}"
                                    style="font-family:San-serif">PEMINJAMAN BUKU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('metode-pembayaran.index') }}"
                                    style="font-family:San-serif">METODE PEMBAYARAN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pembayaran-asrama.index') }}"
                                    style="font-family:San-serif">PEMBAYARAN ASRAMA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pembayaran-siswa.index') }}"
                                    style="font-family:San-serif">PEMBAYARAN SISWA</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (auth()->user()->role === 'guru')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ekstrakulikuler.index') }}"
                            style="font-family:San-serif">EKSTRAKULIKULER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aktivitas.index') }}"
                            style="font-family:San-serif">AKTIVITAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.index') }}" style="font-family:San-serif">SISWA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('absensi.index') }}" style="font-family:San-serif">ABSEN</a>
                    </li>
                @endif
                @if (auth()->user()->role === 'pustakawan')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('buku.index') }}" style="font-family:San-serif">BUKU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peminjaman-buku.index') }}"
                            style="font-family:San-serif">PEMINJAMAN BUKU</a>
                    </li>
                @endif
                @if (auth()->user()->role === 'bendaharawan')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('metode-pembayaran.index') }}"
                            style="font-family:San-serif">METODE PEMBAYARAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pembayaran-asrama.index') }}"
                            style="font-family:San-serif">PEMBAYARAN ASRAMA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pembayaran-siswa.index') }}"
                            style="font-family:San-serif">PEMBAYARAN SISWA</a>
                    </li>
                @endif

                @if (auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}" style="font-family:San-serif">USER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create')}}" style="font-family:San-serif">Tampilan</a>
                    </li>
                @endif


                {{-- level user --}}
                @if (auth()->user()->role === 'siswa')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list-aktivitas.index') }}"
                            style="font-family:San-serif">AKTIVITAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list-ekstrakulikuler.index') }}"
                            style="font-family:San-serif">EKSTRAKULIKULER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list-buku.index') }}"
                            style="font-family:San-serif">BUKU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list-absensi.index') }}"
                            style="font-family:San-serif">ABSENSI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list-pembayaran-asrama.index') }}"
                            style="font-family:San-serif">PEMBAYARAN ASRAMA</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a button class="btn btn-outline-dark rounded-3" type="button" style="width:120px;height:40px"
                        data-bs-toggle="dropdown">
                        <p style="font-family:San-serif;margin-left:3px"><b>{{ auth()->user()->name }}<img
                                    src="https://cdn1.iconfinder.com/data/icons/ios-11-ui-elements-vol-1/29/25_dropdown_menu_down_arrow-512.png"
                                    alt="Logo" width="25" height="25"></b></p>
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
                        @if(auth()->user()->role !=='guru')
                        <a class="dropdown-item" href="">Notification</a>
                        @endif
                        <a class="dropdown-item" href="javascript:void(0)"
                            onclick="document.getElementById('formLogout').submit()">Logout</a>
                        <form action="{{ route('logout') }}" method="post" id="formLogout">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
</nav>
