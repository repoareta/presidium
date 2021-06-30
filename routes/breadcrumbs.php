<?php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Home', '/admin');
});

// Profile
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Profil', route('admin.profil'));
});
Breadcrumbs::for('profile-password', function ($trail) {
    $trail->parent('profile');
    $trail->push('Password', route('admin.profil.password'));
});

// Report
Breadcrumbs::for('report', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Report', '#');
});
// Formulir
Breadcrumbs::for('formulir', function ($trail) {
    $trail->parent('report');
    $trail->push('Formulir', '#');
});
// Tenaga Kesehatan
Breadcrumbs::for('tenaga-kesehatan', function ($trail) {
    $trail->parent('formulir');
    $trail->push('Tenaga Kesehatan', route('admin.report.formulir.tenaga_kesehatan.'));
});
// Pasien Covid
Breadcrumbs::for('pasien-covid', function ($trail) {
    $trail->parent('formulir');
    $trail->push('Pasien Covid', route('admin.report.formulir.pasien_covid.'));
});
// Penyintas Covid
Breadcrumbs::for('penyintas-covid', function ($trail) {
    $trail->parent('formulir');
    $trail->push('Penyintas Covid', route('admin.report.formulir.penyintas_covid.'));
});