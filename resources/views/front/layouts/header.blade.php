<div class="header header-transparent theme">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand static-show" href="#"><img src="assets/img/logo-light.png" class="logo" alt=""></a>
                <a class="nav-brand mob-show" href="#"><img src="assets/img/logo.png" class="logo" alt=""></a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <li class="currencyDropdown me-2">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#currencyModal"><span
                                    class="fw-medium">INR</span></a>
                        </li>
                        <li class="languageDropdown me-2">
                            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#countryModal"><img
                                    src="assets/img/flag/flag.png" class="img-fluid" width="17" alt="Country"></a>
                        </li>
                        <li>
                            <a href="#" class="bg-light-primary text-primary rounded" data-bs-toggle="modal"
                                data-bs-target="#login"><i class="fa-regular fa-circle-user fs-6"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li><a href="{{ url('/') }}">Home</a>
                        

                    <li><a href="JavaScript:Void(0);">Paket Wisata<span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            
                            @foreach ($categories as $item)
                            <li><a href="{{ url('category/'. $item->slug) }}">{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>



                    <li><a href="documantion/index.html" target="_blank">Tentang Kami</a></li>
                    <li><a href="documantion/index.html" target="_blank">Galeri Kami</a></li>
                    <li><a href="documantion/index.html" target="_blank">Artikel</a></li>
                    <li><a href="documantion/index.html" target="_blank">Kontak Kami</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="currencyDropdown me-2">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#currencyModal"><span
                                class="fw-medium">INR</span></a>
                    </li>
                    <li class="languageDropdown me-2">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#countryModal"><img
                                src="assets/img/flag/flag.png" class="img-fluid" width="17" alt="Country"></a>
                    </li>
                    <li class="list-buttons light">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#login"><i
                                class="fa-regular fa-circle-user fs-6 me-2"></i>Sign In / Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>