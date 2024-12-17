<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Posyandu</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">Ps</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">General</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>

            @if (auth()->check() && auth()->user()->role == 'admin')
                <li class="{{ Request::is('tampil-user') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('tampil-user') }}"><i class="fa-regular fa-user"></i>
                        <span>Data User</span></a>
                </li>
            @endif

            @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'kader'))
                <li class="menu-header">Data Master</li>
                <li class="{{ Request::is('parent-data*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('parent-data') }}"><i class="fa-solid fa-person-breastfeeding"></i>
                        <span>Data
                            Keluarga</span></a>
                </li>
                <li class="{{ Request::is('children-data*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('children-data') }}"><i class="fa-solid fa-children"></i><span>Data Anak</span></a>
                </li>
                <li class="{{ Request::is('officer-data*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('officer-data') }}"><i class="fa-solid fa-building"></i><span>Data Kader</span></a>
                </li>
                {{-- <li class="{{ Request::is('midwife-data*') ? 'active' : '' }}"><a href="{{ url('midwife-data') }}"
                        class="nav-link"><i class="fa-solid fa-user-nurse"></i><span>Data Bidan</span></a></li> --}}
            @endif

            @if (
                (auth()->check() &&
                    (auth()->user()->role == 'admin' ||
                        auth()->user()->role ==
                            'kader
                                                                                                ')) ||
                    auth()->user()->role == 'bidan')
                <li class="menu-header">Pelayanan</li>
                {{-- <li class="{{ Request::is('DataImmunization*') ? 'active' : '' }}"><a
                        href="{{ url('DataImmunization') }}" class="nav-link"><i
                            class="fa-solid fa-person-breastfeeding"></i><span>Data Imunisasi</span></a>
                </li> --}}
                <li class="{{ Request::is('DataWeighing*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('DataWeighing') }}"><i class="fa-solid fa-scale-unbalanced-flip"></i><span>Data
                            Penimbangan</span></a>
                </li>
                <li class="{{ Request::is('weighing-children*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('weighing-children') }}"><i class="fa-solid fa-hands-holding-child"></i>
                        <span>Penimbangan Anak</span></a>
                </li>
            @endif

            {{-- @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'kader'))
                <li class="menu-header">Persediaan</li>
                <li class="{{ Request::is('immunization*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('immunization') }}"><i class="fa-solid fa-suitcase-medical"></i>
                        <span>Vaksin</span></a>
                </li>
                <li class="{{ Request::is('vitamins*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('vitamins') }}"><i class="fa-solid fa-pills"></i><span>Vitamin</span></a>
                </li>
            @endif --}}

            {{-- @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'bidan'))
                <li class="menu-header">Layanan</li>
                <li class="{{ Request::is('weighing-children*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('weighing-children') }}"><i class="fa-solid fa-hands-holding-child"></i>
                        <span>Penimbangan Anak</span></a>
                </li> --}}
            {{-- <li class="{{ Request::is('child-immunization*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('child-immunization') }}"><i class="fa-solid fa-syringe"></i><span>Imunisasi
                            Anak</span></a>
                </li>
                @endif
                --}}
            {{-- 
            <li class="menu-header">Pengaduan</li>
            @if (auth()->check() && (auth()->user()->role == 'parents' || auth()->user()->role == 'admin'))
                <li class="{{ Request::is('my-complaint*') && !Request::is('my-complaint/create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('my-complaint') }}">
                        <i class="fa-solid fa-book-journal-whills"></i>
                        <span>Pengaduan Saya</span>
                    </a>
                </li>

                <li class="{{ Request::is('my-complaint/create') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('my-complaint/create') }}"><i class="fa-solid fa-file-circle-plus"></i><span>Buat
                            Pengaduan</span></a>
                </li>
            @endif

            @if (auth()->check() && auth()->user()->role != 'parents')
                <li class="{{ Request::is('complaint-message*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ url('complaint-message') }}"><i class="fa-solid fa-square-envelope"></i><span>Daftar
                            Pengaduan</span></a>
                </li>
                @endif --}}

            <li class="menu-header">Buku 38</li>

            @if (auth()->check() && auth()->user()->role == 'admin')
                {{-- buku 38 --}}

                <li class="{{ Request::is('kegiatan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kegiatan.index') }}"><i
                            class="fa-solid fa-person-walking"></i><span>Kegiatan</span></a>
                </li>
                <li class="{{ Request::is('tugas-absensi') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('tugas-absensi.index') }}"><span><i
                                class="fa-solid fa-list-check"></i>Tugas & Absensi</span></a>
                </li>
                <li class="{{ Request::is('pmt') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('pmt.index') }}"><span><i
                                class="fa-solid fa-utensils"></i>Realisasi
                            PMT</span></a>
                </li>
                <li class="{{ Request::is('inventaris') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('inventaris.index') }}"><i
                            class="fa-solid fa-rectangle-list"></i><span>Inventaris</span></a>
                </li>
                <li class="{{ Request::is('persediaan-bahan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('persediaan-bahan.index') }}"></i><i
                            class="fa-solid fa-box"></i><span>Persediaan Bahan</span></a>
                </li>
                <li class="{{ Request::is('kia-kms') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('kia-kms.index') }}"><i class="fa-solid fa-book"></i><span>Buku
                            KIA &
                            KMS</span></a>
                </li>
                <li class="{{ Request::is('keuangan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('keuangan.index') }}"><i
                            class="fa-solid fa-money-check-dollar"></i><span>Keuangan Posyandu</span></a>
                </li>
                <li class="{{ Request::is('pus-wus') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('pus-wus.index') }}"><i
                            class="fa-solid fa-person-half-dress"></i><span>PUS & WUS</span></a>
                </li>
                <li class="{{ Request::is('ibu-hamil') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('ibu-hamil.index') }}"><i
                            class="fa-solid fa-person-pregnant"></i><span>Ibu Hamil</span></a>
                </li>
                <li class="{{ Request::is('penyuluhan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('penyuluhan.index') }}"><i
                            class="fa-solid fa-person-chalkboard"></i><span>Penyuluhan</span></a>
                </li>
                <li class="{{ Request::is('sdidtik') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('sdidtk.index') }}"><i
                            class="fa-solid fa-baby"></i><span>SDIDTK</span></a>
                </li>
                <li class="{{ Request::is('jaminan-kesehatan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('jaminan-kesehatan.index') }}"><i
                            class="fa-solid fa-square-plus"></i><span>Jaminan Kesehatan</span></a>
                </li>
                <li class="{{ Request::is('kunjungan') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('kunjungan.index') }}"><i
                            class="fa-solid fa-person-walking-luggage"></i><span>Kunjungan</span></a>
                </li>
                {{-- <li class="{{ Request::is('') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ Route('rekapitulasi-evaluasi.index') }}"><span>Rekapitulasi & Evaluasi</span></a>
                </li> --}}
                {{-- <li class="{{ Request::is('') ? 'active' : '' }}">
                    <a class="nav-link"
                        href="{{ Route('skdn.index') }}"><span>SKDN</span></a>
                </li> --}}
                <li class="{{ Request::is('notulen-rapat') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ Route('notulen-rapat.index') }}"><i
                            class="fa-solid fa-pen-to-square"></i><span>Notulen Rapat</span></a>
                </li>
            @endif
            </li>
        </ul>


        <div class="hide-sidebar-mini mb-4 mt-4 p-3">
            {{-- <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a> --}}
        </div>
    </aside>
</div>
