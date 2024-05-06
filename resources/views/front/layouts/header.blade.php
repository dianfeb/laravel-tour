<div class="header header-transparent theme">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand static-show" href="#"><img src="assets/img/logo-light.png" class="logo" alt=""></a>
                <a class="nav-brand mob-show" href="#"><img src="assets/img/logo.png" class="logo" alt=""></a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        
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
                            <li><a href="{{ url('wisata/'. $item->category_slug) }}">{{ $item->category_name }}</a></li>
                            @endforeach
                        </ul>
                    </li>



                    <li><a href="documantion/index.html" target="_blank">Tentang Kami</a></li>
                    <li><a href="documantion/index.html" target="_blank">Galeri Kami</a></li>
                    <li><a href="documantion/index.html" target="_blank">Artikel</a></li>
                    <li><a href="documantion/index.html" target="_blank">Kontak Kami</a></li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                   
                   
                    <li class="list-buttons light">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#login"><i
                                class="fa-regular fab fa-whatsapp fs-6 me-2"></i>087796451992</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>