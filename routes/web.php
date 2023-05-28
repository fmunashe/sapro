<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AdditionalExperienceCategoryController;
use App\Http\Controllers\AdditionalExperienceController;
use App\Http\Controllers\AssignmentTypeController;
use App\Http\Controllers\CertificationsAndEducationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\ClientRevenueController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContractStatusController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FactExternalClientController;
use App\Http\Controllers\FirmExperienceController;
use App\Http\Controllers\FirstTimeAuditClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HostFirmController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\InternationalExperienceController;
use App\Http\Controllers\ListedClientController;
use App\Http\Controllers\PriorExperienceRoleController;
use App\Http\Controllers\ProfessionalExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\QualificationCategoryController;
use App\Http\Controllers\RequestTypeController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SeniorityLevelController;
use App\Http\Controllers\SoftwareExperienceController;
use App\Http\Controllers\SpecialisationController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Users Routes
    Route::get('generic', [HomeController::class, 'generic'])->name('generic');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('generate-pdf', [UsersController::class, 'generatePDF'])->name('generate-pdf');
    Route::patch('sectors.approveSector/{sector}', [SectorController::class, 'approveSector'])->name('sectors.approveSector');
    Route::patch('industries.approveIndustry/{industry}', [IndustryController::class, 'approveIndustry'])->name('industries.approveIndustry');
    Route::patch('achievements.approveAchievement/{achievement}', [AchievementController::class, 'approveAchievement'])->name('achievements.approveAchievement');
    Route::patch('listed-clients.approveListedClient/{listedClient}', [ListedClientController::class, 'approveListedClient'])->name('listed-clients.approveListedClient');
    Route::patch('client-revenue.approveClientRevenue/{clientRevenue}', [ClientRevenueController::class, 'approveClientRevenue'])->name('client-revenue.approveClientRevenue');
    Route::patch('firm-experience.approveFirmExperience/{firmExperience}', [FirmExperienceController::class, 'approveFirmExperience'])->name('firm-experience.approveFirmExperience');
    Route::patch('certifications.approveCertificate/{certification}', [CertificationsAndEducationController::class, 'approveCertificate'])->name('certifications.approveCertificate');
    Route::patch('software-experience.approveSoftwareExperience/{softwareExperience}', [SoftwareExperienceController::class, 'approveSoftwareExperience'])->name('software-experience.approveSoftwareExperience');
    Route::patch('additional-experience.approveAdditionalExperience/{additionalExperience}', [AdditionalExperienceController::class, 'approveAdditionalExperience'])->name('additional-experience.approveAdditionalExperience');
    Route::patch('professional-experience.approveProfessionalExperience/{professionalExperience}', [ProfessionalExperienceController::class, 'approveProfessionalExperience'])->name('professional-experience.approveProfessionalExperience');
    Route::patch('international-experience.approveInternationalExperience/{internationalExperience}', [InternationalExperienceController::class, 'approveInternationalExperience'])->name('international-experience.approveInternationalExperience');

    Route::resource('users', UsersController::class);
    Route::resource('seniority-levels', SeniorityLevelController::class);
    Route::resource('specialisation', SpecialisationController::class);
    Route::resource('contract-status', ContractStatusController::class);
    Route::resource('fact-external-clients', FactExternalClientController::class);
    Route::resource('certifications', CertificationsAndEducationController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('firm-experience', FirmExperienceController::class);
    Route::resource('additional-experience', AdditionalExperienceController::class);
    Route::resource('additional-experience-categories', AdditionalExperienceCategoryController::class);
    Route::resource('client-revenue', ClientRevenueController::class);
    Route::resource('first-time-audit-clients', FirstTimeAuditClientController::class);
    Route::resource('host-firms', HostFirmController::class);
    Route::resource('industries', IndustryController::class);
    Route::resource('international-experience', InternationalExperienceController::class);
    Route::resource('listed-clients', ListedClientController::class);
    Route::resource('professional-experience', ProfessionalExperienceController::class);
    Route::resource('software-experience', SoftwareExperienceController::class);
    Route::resource('scheduling', SchedulingController::class);
    Route::resource('sectors', SectorController::class);
    Route::resource('client-requests', ClientRequestController::class);
    Route::resource('request-types',RequestTypeController::class);
    Route::resource('assignment-types',AssignmentTypeController::class);
    Route::resource('qualification-categories',QualificationCategoryController::class);
    Route::resource('prior-experience-roles',PriorExperienceRoleController::class);
    Route::resource('companies',CompanyController::class);
    Route::resource('countries',CountryController::class);
    Route::resource('provinces',ProvinceController::class);
    Route::resource('cities',CityController::class);
});

require __DIR__ . '/auth.php';
