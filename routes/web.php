<?php

use App\Livewire\Partner\Campaigns\Index as PartnerCampaigns;
use App\Livewire\Partner\Dashboard as PartnerDashboard;
use App\Livewire\Partner\FinancialOffers\Index as PartnerFinancialOffers;
use App\Livewire\Partner\Reports as PartnerReports;
use App\Livewire\Partner\Vouchers\Index as PartnerVouchers;
use App\Livewire\Public\GreenScoreInfo;
use App\Livewire\Public\PublicStores;
use App\Livewire\Public\PublicVouchers;
use App\Livewire\Store\Branches\Index as StoreBranches;
use App\Livewire\Store\Dashboard as StoreDashboard;
use App\Livewire\Store\Invoices\Create as StoreInvoiceCreate;
use App\Livewire\Store\Invoices\Index as StoreInvoices;
use App\Livewire\Store\Invoices\Show as StoreInvoiceShow;
use App\Livewire\Store\Reports as StoreReports;
use App\Livewire\Store\Staff\Index as StoreStaff;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\User\GreenScore;
use App\Livewire\User\GreenWallet;
use App\Livewire\User\MyVouchers;
use App\Livewire\User\NetZeroPlanner;
use App\Livewire\User\Onboarding;
use App\Livewire\User\Profile;
use App\Livewire\User\ScanQr;
use App\Livewire\User\TransactionHistory;
use App\Livewire\User\VoucherMarketplace;
use App\Models\User;
use App\Services\GreenPointService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/gioi-thieu', 'pages.about')->name('about');
Route::view('/dich-vu', 'pages.services')->name('services');
Route::view('/lien-he', 'pages.contact')->name('contact');
Route::redirect('/about', '/gioi-thieu');
Route::redirect('/contact', '/lien-he');
Route::get('/stores', PublicStores::class)->name('stores');
Route::get('/vouchers', PublicVouchers::class)->name('vouchers.public');
Route::get('/green-score', GreenScoreInfo::class)->name('green-score.public');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', function (Request $request) {
    $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required']]);

    if (Auth::attempt($credentials, true)) {
        $request->session()->regenerate();
        $role = $request->user()->role;

        return redirect(match ($role) {
            'admin', 'super_admin' => '/admin',
            'store_owner', 'store_staff' => route('store.dashboard'),
            'partner' => route('partner.dashboard'),
            default => route('dashboard'),
        });
    }

    return back()->withErrors(['email' => 'Email hoac mat khau khong dung.']);
});
Route::post('/logout', fn (Request $request) => tap(Auth::logout(), fn () => $request->session()->invalidate()) ?? redirect('/'))->name('logout');

Route::get('/register', fn () => view('auth.register'))->name('register');
Route::post('/register', function (Request $request) {
    $data = $request->validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:8', 'confirmed'],
        'city' => ['nullable', 'string'],
        'green_interests' => ['nullable', 'array'],
    ]);
    $user = User::create(['name' => $data['name'], 'email' => $data['email'], 'password' => Hash::make($data['password']), 'role' => 'user']);
    $user->profile()->updateOrCreate(['user_id' => $user->id], [
        'city' => $data['city'] ?? null,
        'green_interests' => $data['green_interests'] ?? [],
        'onboarding_completed' => true,
    ]);
    app(GreenPointService::class)->ensureWallet($user);
    Auth::login($user);

    return redirect()->route('onboarding');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', UserDashboard::class)->name('dashboard');
    Route::get('/onboarding', Onboarding::class)->name('onboarding');
    Route::get('/scan-qr/{token?}', ScanQr::class)->name('user.scan-qr');
    Route::get('/wallet', GreenWallet::class)->name('user.wallet');
    Route::get('/vouchers/marketplace', VoucherMarketplace::class)->name('user.vouchers');
    Route::get('/my-vouchers', MyVouchers::class)->name('user.my-vouchers');
    Route::get('/green-score/dashboard', GreenScore::class)->name('user.green-score');
    Route::get('/net-zero-planner', NetZeroPlanner::class)->name('user.net-zero');
    Route::get('/transactions', TransactionHistory::class)->name('user.transactions');
    Route::get('/profile', Profile::class)->name('user.profile');
});

Route::middleware(['auth', 'role:store_owner,store_staff'])->prefix('store')->name('store.')->group(function () {
    Route::get('/dashboard', StoreDashboard::class)->name('dashboard');
    Route::get('/invoices', StoreInvoices::class)->name('invoices');
    Route::get('/invoices/create', StoreInvoiceCreate::class)->name('invoices.create');
    Route::get('/invoices/{invoice}', StoreInvoiceShow::class)->name('invoices.show');
    Route::middleware('role:store_owner')->group(function () {
        Route::get('/branches', StoreBranches::class)->name('branches');
        Route::get('/staff', StoreStaff::class)->name('staff');
        Route::get('/reports', StoreReports::class)->name('reports');
    });
});

Route::middleware(['auth', 'role:partner'])->prefix('partner')->name('partner.')->group(function () {
    Route::get('/dashboard', PartnerDashboard::class)->name('dashboard');
    Route::get('/vouchers', PartnerVouchers::class)->name('vouchers');
    Route::get('/campaigns', PartnerCampaigns::class)->name('campaigns');
    Route::get('/financial-offers', PartnerFinancialOffers::class)->name('financial-offers');
    Route::get('/reports', PartnerReports::class)->name('reports');
});
