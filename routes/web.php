<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmailListController;
use App\Http\Controllers\Employer\JobController as EmployerJobController;
use App\Http\Controllers\Employer\MembershipController as EmployerMembershipController;
use App\Http\Controllers\Employer\ProfileController;
use App\Http\Controllers\Employer\ResumeController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Seeker\JobController as SeekerJobController;
use App\Http\Controllers\Seeker\ProfileController as SeekerProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Employer\EmployerDashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['can:admin','auth']], function () {
    Route::get('/admin', [HomeController::class, 'indexAdmin'])->name('admin.index');
    // Membership 
    Route::get('/admin/memberships', [MembershipController::class, 'index'])->name('admin.memberships.index');
    Route::post('/admin/memberships/store', [MembershipController::class, 'store'])->name('admin.memberships.store');
    Route::get('/admin/memberships/edit/{id}', [MembershipController::class, 'edit'])->name('admin.memberships.edit');
    Route::put('/admin/memberships/update/{id}', [MembershipController::class, 'update'])->name('admin.memberships.update');
    Route::delete('/admin/memberships/destroy/{id}', [MembershipController::class, 'destroy'])->name('admin.memberships.destroy');

    // Category 
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Skill 
    Route::get('/admin/skills', [SkillController::class, 'index'])->name('admin.skills.index');
    Route::post('/admin/skills/store', [SkillController::class, 'store'])->name('admin.skills.store');
    Route::get('/admin/skills/edit/{id}', [SkillController::class, 'edit'])->name('admin.skills.edit');
    Route::put('/admin/skills/update/{id}', [SkillController::class, 'update'])->name('admin.skills.update');
    Route::delete('/admin/skills/destroy/{id}', [SkillController::class, 'destroy'])->name('admin.skills.destroy');

    // Articles
    Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin.articles.index');
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
    Route::post('/admin/articles/store', [ArticleController::class, 'store'])->name('admin.articles.store');
    Route::get('/admin/articles/edit/{id}', [ArticleController::class, 'edit'])->name('admin.articles.edit');
    Route::put('/admin/articles/update/{id}', [ArticleController::class, 'update'])->name('admin.articles.update');
    Route::delete('/adminarticles/destroy/{id}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

    // Location 
    Route::get('/admin/locations', [LocationController::class, 'index'])->name('admin.locations.index');
    Route::post('/admin/locations/store', [LocationController::class, 'store'])->name('admin.locations.store');
    Route::get('/admin/locations/edit/{id}', [LocationController::class, 'edit'])->name('admin.locations.edit');
    Route::put('/admin/locations/update/{id}', [LocationController::class, 'update'])->name('admin.locations.update');
    Route::delete('/admin/locations/destroy/{id}', [LocationController::class, 'destroy'])->name('admin.locations.destroy');

    // Job 
    Route::get('/admin/jobs', [JobController::class, 'index'])->name('admin.jobs.index');
    Route::get('/admin/jobs/show/{id}', [JobController::class, 'show'])->name('admin.jobs.show');
    Route::put('/admin/jobs/update/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
    Route::delete('/admin/jobs/destroy/{id}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');

    // ADS
    Route::get('/admin/advertisements', [AdvertisementController::class, 'index'])->name('admin.advertisements.index');
    Route::post('/admin/advertisements/store', [AdvertisementController::class, 'store'])->name('admin.advertisements.store');
    Route::get('/admin/advertisements/edit/{id}', [AdvertisementController::class, 'edit'])->name('admin.advertisements.edit');
    Route::put('/admin/advertisements/update/{id}', [AdvertisementController::class, 'update'])->name('admin.advertisements.update');
    Route::delete('/admin/advertisements/destroy/{id}', [AdvertisementController::class, 'destroy'])->name('admin.advertisements.destroy');

    // Sale
    Route::get('/orders', [SaleController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/show/{id}', [SaleController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/update/{id}', [SaleController::class, 'update'])->name('admin.orders.update');
    Route::delete('/orders/destroy/{id}', [SaleController::class, 'destroy'])->name('admin.orders.destroy');

    // Location 
    Route::get('/admin/email-lists', [EmailListController::class, 'index'])->name('admin.email-lists.index');
    Route::delete('/admin/email-lists/destroy/{id}', [EmailListController::class, 'destroy'])->name('admin.email-lists.destroy');
});


// employer
Route::group(['middleware' => ['can:employer','auth']], function () {


    /* Dashboard */
    Route::get('/employer/dashboard', [EmployerDashboardController::class, 'index'])->name('frontend.employer.dashboard');

    /* Job Post */
    Route::get('/employer/jobs/create', [EmployerJobController::class, 'jobCreate'])->name('frontend.employer.jobs.create');
    Route::post('/employer/jobs/store/{id}', [EmployerJobController::class, 'store'])->name('employer.jobs.store');
    Route::get("/employer/jobs/lists", [EmployerJobController::class, 'jobLists'])->name('frontend.employer.jobs.lists');
    Route::get('/employer/jobs/edit/{id}', [EmployerJobController::class, 'edit'])->name('frontend.employer.jobs.edit');
    Route::post("/employer/jobs/update", [EmployerJobController::class, 'update'])->name('frontend.employer.jobs.update');
    
    /* Profile Update */
    Route::get("/employer/password/update", [EmployerDashboardController::class, 'password_update'])->name('frontend.employer.password_update');

    /* Membership */
    Route::get('/employer/memberships', [EmployerMembershipController::class, 'showMembership'])->name('frontend.employer.membership');

    
    // Membership Apply
    Route::get('/membership/apply/{id}', [EmployerMembershipController::class, 'checkout'])->name('frontend.membership.apply');
    Route::post('/membership/apply/submit', [EmployerMembershipController::class, 'membershipApply'])->name('frontend.membership.apply.submit');
    Route::get('/membership/apply/success/page', [EmployerMembershipController::class, 'checkoutSuccess'])->name('frontend.membership.apply.success');


    Route::get('/employer/jobs/{company_name}', [ProfileController::class, 'jobs'])->name('frontend.employer.jobs');
    Route::put('/employer/profile/image', [ProfileController::class, 'imageUpdate'])->name('frontend.employer.profile.image.update');
    Route::put('/employer/profile/company-data', [ProfileController::class, 'companyDataUpdate'])->name('frontend.employer.profile.company.data.update');

   



    Route::get('/employer/memberships/old', [EmployerMembershipController::class, 'showMembership'])->name('frontend.employer.membership.show');

    // Jobs Detail
    Route::get('/employer/jobs/{id}', [ResumeController::class, 'resumes'])->name('frontend.employer.jobs.edit.Old');
    Route::put('/employer/jobs/update/{id}', [ResumeController::class, 'resumeUpdate'])->name('frontend.employer.jobs.update');


    // Resume
    Route::get('/employer/resumes/{id}', [ResumeController::class, 'resumes'])->name('frontend.employer.resumes');
    Route::put('/employer/resume/update/{id}', [ResumeController::class, 'resumeUpdate'])->name('frontend.employer.resumes.update');
});

// seeker
Route::group(['middleware' => ['can:seeker','auth']], function () {

    Route::get('/seeker/dashboard', [SeekerProfileController::class, 'dashboard'])->name('frontend.seeker.dashboard');
    Route::get("/seeker/job/base_on_profile",[SeekerProfileController::class,"jobBasedOnProfile"])->name('frontend.seeker.job.base_on_profile');
    /* Seeker Apply Job */
    Route::get("/seeker/applied/jobs",[SeekerProfileController::class,"appliedJobs"])->name('frontend.seeker.applied.jobs');

    Route::get('/seeker/profile', [SeekerProfileController::class, 'index'])->name('frontend.seeker.profile');
    Route::put('/seeker/profile/image', [SeekerProfileController::class, 'imageUpdate'])->name('frontend.seeker.profile.image.update');

    Route::post('/seeker/profile/update', [SeekerProfileController::class, 'updateProfile'])->name('frontend.seeker.update');
    Route::post('/seeker/experience/store', [SeekerProfileController::class, 'storeExperience'])->name('frontend.seeker.experience.store');
    Route::post('/seeker/experience/update', [SeekerProfileController::class, 'updateExperience'])->name('frontend.seeker.experience.update');
    Route::delete('/seeker/experience/delete', [SeekerProfileController::class, 'deleteExperience'])->name('frontend.seeker.experience.delete');
    Route::post('/seeker/education/store', [SeekerProfileController::class, 'storeEducation'])->name('frontend.seeker.education.store');
    Route::post('/seeker/education/update', [SeekerProfileController::class, 'updateEducation'])->name('frontend.seeker.education.update');
    Route::delete('/seeker/education/delete', [SeekerProfileController::class, 'deleteEducation'])->name('frontend.seeker.education.delete');

    Route::post('/seeker/project/store', [SeekerProfileController::class, 'storeProject'])->name('frontend.seeker.project.store');
    Route::post('/seeker/project/update', [SeekerProfileController::class, 'updateProject'])->name('frontend.seeker.project.update');
    Route::delete('/seeker/project/delete', [SeekerProfileController::class, 'deleteProject'])->name('frontend.seeker.project.delete');

    Route::post('/seeker/profile/languages', [SeekerProfileController::class, 'updateLanguages'])->name('frontend.seeker.languages.update');
    Route::post('/seeker/profile/interests', [SeekerProfileController::class, 'updateInterests'])->name('frontend.seeker.interests.update');

    Route::put('/seeker/skill/update', [SeekerProfileController::class, 'updateSkill'])->name('frontend.seeker.skill.update');

    Route::post('/seeker/job/apply', [SeekerJobController::class, 'jobApply'])->name('frontend.seeker.jobs.apply');

});

//authRedirect
Route::group(['middlware'=>'auth'],function(){
    Route::get("/redirect/auth",[RedirectController::class,"redirect"]);
    Route::post('/change-password', [RedirectController::class, 'changePassword'])
    ->name('change_password');
});



// Job Hunting
Route::post('/job/hunting/apply', [SeekerJobController::class, 'jobHuntingApply'])->name('frontend.job.hunting.apply');


Route::get('/employer/profile/{company_name}', [ProfileController::class, 'index'])->name('frontend.employer.profile');

Route::get('/', [PageController::class, 'index'])->name('frontend.index');
Route::get('/contact', function () { return view('frontend.pages.contact'); })->name('frontend.contact');
Route::get('/about-us', function () { return view('frontend.pages.about-us'); })->name('frontend.about-us');
Route::get('/companies', [PageController::class, 'companies'])->name('frontend.companies');
Route::get('/pricing', [PageController::class, 'pricing'])->name('frontend.pricing');
Route::get('/blog', [PageController::class, 'blog'])->name('frontend.blog');
Route::get('/blog/{id}', [PageController::class, 'blogDetail'])->name('frontend.blog-detail');

// client enabled this candidate page
Route::get('/candidates', [PageController::class, 'candidates'])->name('frontend.candidates');

Route::get('/jobs', [PageController::class, 'jobs'])->name('frontend.jobs');
Route::get('/jobs/{id}', [PageController::class, 'jobsDetail'])->name('frontend.jobs-detail');

// Auth for Frontend
Route::get('/register', [AuthController::class, 'Register'])->name('frontend.auth.register');
Route::get('/register/employer', [AuthController::class, 'jobRegisterEmployer'])->name('frontend.auth.register.employer');
Route::post('/register/employer/store', [AuthController::class, 'jobRegisterEmployerStore'])->name('frontend.auth.register.employer.store');
Route::get('/register/seeker', [AuthController::class, 'jobRegisterSeeker'])->name('frontend.auth.register.seeker');
Route::post('/account/changePassword/{id}', [PageController::class, 'changePassword'])->name('frontend.account.changePassword');

// CV
Route::get('/cv/{id}', [PageController::class, 'cv'])->name('frontend.cv');
Route::get('/cv/download/{id}', [PageController::class, 'downloadCv'])->name('frontend.cv.download');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
