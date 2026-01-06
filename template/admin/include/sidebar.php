<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?= get_host() ?>/admin/ville" class="brand-link">
            <!--begin::Brand Image-->
            <img
                src="<?= get_host() ?>/assets/img/youcode_logo_dark.png"
                alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">ITeletubbies</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >
                <li class="nav-item">
                    <a href="<?= get_host() ?>/admin/ville" class="nav-link">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Ville</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= get_host() ?>/admin/product" class="nav-link">
                        <i class="nav-icon bi bi-boxes"></i>
                        <p>Produit</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->