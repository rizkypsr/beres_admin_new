# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

"Beres" — Laravel 12 (PHP 8.4) waste-bank / community app. Two surfaces in one codebase:
- **Admin panel** (Blade, session auth via `laravel/ui`) in `routes/web.php`.
- **JSON API for a mobile client** in `routes/api.php` (mostly unauthenticated; only `/api/user` uses `auth:sanctum`).

Domain language is Indonesian: `kota` (city), `kecamatan` (district), `toko` (shop), `umkm` (small business), `jualsampah`/`js` (selling waste), `layananjemput`/`lj` (pickup service), `ppob` (bill payments), `topup`, `transfer`, `bayartoko` (pay shop), `qurbansampah`, `artikel`, `challenge`.

## Commands

Local site is served by Flock at http://beres.test — do not run `php artisan serve`. PHP 8.4 is pinned in `.flockrc`. On this machine the shell's `php` is aliased to Laravel Herd (a different PHP version), so run CLI commands with Flock's binary (`~/Library/Application Support/Flock/bin/php artisan ...`) or composer's platform check will fail.

The app was upgraded in place from Laravel 9 and keeps the legacy structure (`app/Http/Kernel.php`, `app/Console/Kernel.php`, `RouteServiceProvider`, full `config/app.php` provider list); it does not use the Laravel 11+ slim `bootstrap/app.php`.

```bash
composer install
npm install
npm run dev          # Laravel Mix build (resources/js/app.js, resources/sass/app.scss)
npm run watch
php artisan migrate
php artisan test                                   # PHPUnit (only example tests exist)
php artisan test --filter=ExampleTest              # single test
vendor/bin/pint                                    # code style (Laravel Pint)
```

DB is MySQL (`.env.example`); `phpunit.xml` has sqlite in-memory commented out, so tests hit the configured DB.

## Architecture

**Routing style.** Web routes are mostly hand-written verb routes, not resources: `GET /<entity>`, `POST /add<entity>`, `POST /update<entity>/{id}`, `DELETE /delete<entity>/{id}`, plus workflow actions like `/acc<entity>/{id}` (approve) and `/selesai<entity>/{id}` (complete) and `/<entity>export`. Newer features (challenge, artikel, user-challenges, images) use `Route::resource`. Follow the existing style of the feature being edited.

**Controllers.** Flat in `app/Http/Controllers`. Web controllers call `$this->middleware('auth')` in the constructor. API controllers for old features sit alongside them with an `api` prefix/suffix (`apiKotaController`, `CustomerapiController`); newer API controllers live in `app/Http/Controllers/Api/`. Controllers usually redirect with `->with('success', ...)` flash messages (SweetAlert via `realrashid/sweet-alert`).

**Roles & scoping.** `users.role` is one of `superadmin`, `admin`, `adminppob`, checked inline (`auth()->user()->role == ...`) in controllers, DataTables and Blade sidebar — there is no policy/gate layer. `admin` users are scoped to their district: queries filter by `users.id_kecamatan_user` against the entity's kecamatan column (e.g. `transaksijs.id_kc_js`). `superadmin` sees everything. Preserve this branching when adding queries.

**Models.** Legacy schema conventions — expect these on most models:
- Custom table names and primary keys (`id_customer`, `id_transaksijs`, `id_js`, `id_kecamatan`), so relationships always pass explicit foreign/owner keys.
- `public $timestamps = false;` with `created_at` set manually via `Carbon::now()`.
- Soft delete is usually a flag column (`customer_is_delete`, `js_is_delete`, `status_kecamatan` = 0 meaning active) rather than `SoftDeletes`; `Customer` uses both (`SoftDeletes` added later, relations use `->withTrashed()`).
- Class names are inconsistently cased (`transaksijs`, `produkjs`, `toko`, `Customer`, `Kecamatan`); match the existing file/class name exactly.

**Listings.** Large tables use `yajra/laravel-datatables` service classes in `app/DataTables/` (`$dataTable->render('view', $data)`); action/status cells are rendered from small Blade partials (e.g. `transaksijs/action.blade.php`, `transaksijs/status.blade.php`). Older pages render full collections directly in Blade.

**Excel.** `maatwebsite/excel` exports in `app/Exports/`, imports (customer, toko) in `app/Imports/`.

**Views.** Admin layout is `resources/views/layout/master.blade.php` + `header`/`sidebar` (AdminLTE assets under `public/plugins`, `public/dist`). `resources/views/layouts/app.blade.php` is the `laravel/ui` auth layout. One view folder per feature.

**File uploads.** Mixed: newer features use `Storage::disk('public')` (symlinked `public/storage`, subfolders like `artikel/`, `user-challenges/images/`); older ones move files directly into `public/upload*` directories.
