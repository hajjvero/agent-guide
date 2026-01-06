<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE v4 | Dashboard</title>
    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->
    <!--begin::Primary Meta Tags-->
    <meta name="title" content="Dashboard" />
    <meta name="author" content="guid agent" />
    <meta name="description"
          content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
    <meta name="keywords"
          content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
    <!--end::Primary Meta Tags-->
    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <!--end::Accessibility Features-->

    <?php include __DIR__ . '/../../../template/admin/include/style.php'; ?>
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
<!--begin::App Wrapper-->
<div class="app-wrapper">
    <?php include __DIR__ . '/../../../template/admin/include/header.php'; ?>

    <?php include __DIR__ . '/../../../template/admin/include/sidebar.php'; ?>
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid p-2">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <form method="post" action="<?= sprintf('%s/%s',get_host(), 'admin/ville/store') ?>">
                                    <!-- LANGUAGES -->
                                    <h4 class="mb-4 border-bottom pb-2">Ajouter un nouveau ville</h4>

                                    <!-- Arabic -->
                                    <div class="card mb-4">
                                        <div class="card-header d-flex align-items-center gap-2">
                                            <span class="fs-4">🇸🇦</span>
                                            <strong>Arabic</strong>
                                            <span class="badge bg-primary ms-auto">AR</span>
                                        </div>

                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Title *</label>
                                                <input type="text" class="form-control" name="title_ar" value="<?= $old['title_ar'] ??  ''?>">
                                                <p class="text-danger"><?= get_error('title_ar') ?? '' ?></p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="description_ar" rows="4" maxlength="500"><?= $old['description_ar'] ?? '' ?></textarea>
                                                <small class="text-muted d-block text-end">0 / 500</small>
                                                <p class="text-danger"><?= get_error('description_ar') ?? '' ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- French -->
                                    <div class="card mb-4">
                                        <div class="card-header d-flex align-items-center gap-2">
                                            <span class="fs-4">🇫🇷</span>
                                            <strong>French</strong>
                                            <span class="badge bg-primary ms-auto">FR</span>
                                        </div>

                                        <div class="card-body">
                                            <input class="form-control mb-3" name="title_fr" placeholder="Title FR" required value="<?= $old['title_fr'] ?? '' ?>">
                                            <p class="text-danger"><?= get_error('title_fr') ?? '' ?></p>
                                            <textarea class="form-control" name="description_fr" rows="4" maxlength="500"><?= $old['description_fr'] ?? '' ?></textarea>
                                            <p class="text-danger"><?= get_error('description_fr') ?? '' ?></p>
                                        </div>
                                    </div>

                                    <!-- English -->
                                    <div class="card mb-4">
                                        <div class="card-header d-flex align-items-center gap-2">
                                            <span class="fs-4">🇬🇧</span>
                                            <strong>English</strong>
                                            <span class="badge bg-primary ms-auto">EN</span>
                                        </div>

                                        <div class="card-body">
                                            <input class="form-control mb-3" name="title_en" required value="<?= $old['title_en'] ?? '' ?>">
                                            <p class="text-danger"><?= get_error('title_en') ?? '' ?></p>
                                            <textarea class="form-control" name="description_en" rows="4" maxlength="500"><?= $old['description_en'] ?? '' ?></textarea>
                                            <p class="text-danger"><?= get_error('description_en') ?? '' ?></p>
                                        </div>
                                    </div>

                                    <!-- Spanish -->
                                    <div class="card mb-4">
                                        <div class="card-header d-flex align-items-center gap-2">
                                            <span class="fs-4">🇪🇸</span>
                                            <strong>Spanish</strong>
                                            <span class="badge bg-primary ms-auto">ES</span>
                                        </div>

                                        <div class="card-body">
                                            <input class="form-control mb-3" name="title_es" required value="<?= $old['title_es'] ?? '' ?>">
                                            <p class="text-danger"><?= get_error('title_es') ?? '' ?></p>
                                            <textarea class="form-control" name="description_es" rows="4" maxlength="500"><?= $old['description_es'] ?? '' ?></textarea>
                                            <p class="text-danger"><?= get_error('description_es') ?? '' ?></p>
                                        </div>
                                    </div>

                                    <!-- Portuguese -->
                                    <div class="card mb-4">
                                        <div class="card-header d-flex align-items-center gap-2">
                                            <span class="fs-4">🇵🇹</span>
                                            <strong>Portuguese</strong>
                                            <span class="badge bg-primary ms-auto">PT</span>
                                        </div>

                                        <div class="card-body">
                                            <input class="form-control mb-3" name="title_pt" required value="<?= $old['title_pt'] ?? '' ?>">
                                            <p class="text-danger"><?= get_error('title_pt') ?? '' ?></p>
                                            <textarea class="form-control" name="description_pt" rows="4" maxlength="500"><?= $old['description_pt'] ?? '' ?></textarea>
                                            <p class="text-danger"><?= get_error('description_pt') ?? '' ?></p>
                                        </div>
                                    </div>

                                    <!-- MEDIA -->
                                    <h4 class="mt-5 mb-3 border-bottom pb-2">Media</h4>

                                    <div class="mb-4">
                                        <label class="form-label">Image</label>
                                        <input type="text" class="form-control" name="image" value="<?= $old['image'] ?? '' ?>">
                                        <p class="text-danger"><?= get_error('image') ?? '' ?></p>
                                    </div>

                                    <!-- ACTIONS -->
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-check"></i> Enregistrer
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <?php include __DIR__ . '/../../../template/admin/include/footer.php'; ?>
</div>
<!--end::App Wrapper-->
<?php include __DIR__ . '/../../../template/admin/include/script.php'; ?>
</body>
<!--end::Body-->

</html>