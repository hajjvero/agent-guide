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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Liste des Villes</h3>
                                    <div class="card-tools">
                                        <a href="<?= sprintf('%s/%s',get_host(), 'admin/ville/create') ?>" class="btn btn-block btn-primary">
                                            <i class="fas fa-plus"></i> Créer
                                        </a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom (Arabe)</th>
                                                <th>Nom (Français)</th>
                                                <th>Nom (Anglais)</th>
                                                <th>Nom (Espagnol)</th>
                                                <th>Nom (Portugais)</th>
                                                <th>Description (Arabe)</th>
                                                <th>Description (Français)</th>
                                                <th>Description (Anglais)</th>
                                                <th>Description (Espagnol)</th>
                                                <th>Description (Portugais)</th>
                                                <th>Image</th>
                                                <th>Date de création</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($villes as $ville): ?>
                                            <tr>
                                                <td><?= $ville->getId() ?></td>
                                                <td><?= htmlspecialchars($ville->getNameAr(), ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($ville->getNameFr(), ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($ville->getNameEn(), ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($ville->getNameEs(), ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($ville->getNamePt(), ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= $ville->getDescriptionAr() ?></td>
                                                <td><?= $ville->getDescriptionFr() ?></td>
                                                <td><?= $ville->getDescriptionEn() ?></td>
                                                <td><?= $ville->getDescriptionEs() ?></td>
                                                <td><?= $ville->getDescriptionPt() ?></td>
                                                <td>
                                                    <?php if ($ville->getImage()): ?>
                                                        <img src="<?= get_host() . $ville->getImage() ?>" alt="<?= htmlspecialchars($ville->getNameFr(), ENT_QUOTES, 'UTF-8') ?>" width="100">
                                                    <?php else: ?>
                                                        Aucune image
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $ville->getCreatedAt()->format('Y-m-d H:i:s') ?></td>
                                                <td>
                                                    <a href="<?= sprintf('%s/%s',get_host(), 'admin/ville/'. $ville->getId() .'/edit')?>" class="btn btn-sm btn-primary">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="<?= sprintf('%s/%s',get_host(), 'admin/ville/'. $ville->getId() .'/delete')?>" method="post" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette ville ?')">
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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