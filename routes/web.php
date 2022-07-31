<?php


use Facade\FlareClient\Http\Response;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController;
//use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BusinessFieldContrller;
use App\Http\Controllers\Admin\BlogContrller;
use App\Http\Controllers\Admin\ProjectContrller;
use App\Http\Controllers\Admin\CommentsContrller;
use App\Http\Controllers\Admin\CountryContrller;
use App\Http\Controllers\Admin\CityContrller;
use App\Http\Controllers\Admin\ReportReasonController;
use App\Http\Controllers\Admin\PostCategortyController;
use App\Http\Controllers\Admin\HideReasonsController;
use App\Http\Controllers\Admin\ProjectStatusController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\RssFeedController;
use App\Http\Controllers\NotificationController;
//==============================================
use App\Http\Controllers\SocialController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WbsStep1Controller;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\UserController as WebUsers;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\RequestProjectController;
// by yousef
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\Auth\LoginController;

/*

|--------------------------------------------------------------------------
| Web Routes



|--------------------------------------------------------------------------



|



| Here is where you can register web routes for your application. These



| routes are loaded by the RouteServiceProvider within a group which



| contains the "web" middleware group. Now create something great!



|

*/




// dashboard Routes
Auth::routes();

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// locale Route
Route::get('lang/{locale}', [HomeController::class, 'languageSwap'])->name('language');
//================================ Admin Routes ===============================
Route::get('/admin',[DashboardController::class,'admin'])->name('view_login');
Route::post('/admin_login',[LoginController::class,'authenticate'])->name('admin_login');
Route::get('/projectsselectAll',[ProjectContrller::class,'selectAll'])->name('projectsselectAll');
Route::get('/postsselectAll',[BlogContrller::class,'selectAll'])->name('postsselectAll');


Route::group(['prefix' => 'admin'], function () { //,'middleware' => 'LocaleMiddleware'

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);

    Route::resource('/pages', PageController::class);

    Route::resource('/categories', CategoryController::class);

    Route::resource('/videos', VideosController::class);

    Route::resource('/testimonials',TestimonialController::class);

    Route::resource('/support', SupportController::class);

    Route::resource('/contact',ContactController::class);

    Route::resource('/admins', AdminController::class);

    Route::resource('/settings',SettingController::class);

    Route::resource('/business_fields',BusinessFieldContrller::class);

    Route::resource('/project_status',ProjectStatusController::class);

    Route::resource('/posts',BlogContrller::class);

    Route::resource('/postcategories',PostCategortyController::class);

    Route::resource('/hidden_reasons',HideReasonsController::class);

    Route::resource('/projects',ProjectContrller::class);

    Route::resource('/comments',CommentsContrller::class);

    Route::resource('/countries',CountryContrller::class);

    Route::resource('/cities',CityContrller::class);

    Route::resource('/report_reasons',ReportReasonController::class);

    Route::resource('/questions',QuestionController::class);
    Route::resource('/answers',AnswerController::class);
    Route::resource('/rss_feeds',RssFeedController::class);
    Route::get('/hiddencards',[HideReasonsController::class,'hiddenCards'])->name('hiddencards.list');
    Route::get('/report_list',[ReportReasonController::class,'report_list'])->name('report_list');

    Route::get('/joboffers',[DashboardController::class,'joboffersList'])->name('joboffers.list');

    Route::get('/requestprojectList',[DashboardController::class,'requestprojectList'])->name('requestproject.list');

    // need to modify

    Route::get('/profile/{id}',[SuperAdminController::class,'profile'])->name('profile');

    Route::put('/profile/update/{id}',[SuperAdminController::class,'update_profile'])->name('update_profile');



    Route::get('/setting_edit',[SettingController::class,'setting_edit'])->name('setting_edit');

    Route::post('/setting_store',[SettingController::class,'setting_store'])->name('setting_store');

   // Route::resource('/project_categories',ProjectCategoryController::class);



});


//============================= End Admin Routes ============================

####### Resource Defined #######
// Users Routes



Route::resource('/users',\App\Http\Controllers\UserController::class);

Route::resource('/projects',ProjectController::class);



//Route::resource('/user_setting',UserDbSettingController::class);



#######  End Resource Defined #######





#######  Guest user Routes ####### 



Route::get('/',[HomeController::class,'index'])->name("index");

Route::any('/search',[HomeController::class,'search'])->name('search');

Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::post('/contact',[HomeController::class,'contact_save'])->name('contact_save');

// Faq's route

Route::get('/support',[HomeController::class,'support'])->name('support');
Route::get('/feedReader',[HomeController::class,'feedReader'])->name('feed.reader'); 

// project information page

Route::get('/project_info/{id}',[HomeController::class,'project_info'])->name('front_end_page');

// user profile display for guest

Route::get('/user/{id}',[HomeController::class,'userShow'])->name('user.show'); 

// bobup employees list for guest

Route::post('/employeeslist',[HomeController::class,'employeeslist'])->name('employees.list');

// bobup collection projects list for guest 

Route::post('/collectionProjectslist',[HomeController::class,'collectionProjectslist'])->name('collectionProjects.list');

// get list of cities by country id selected

Route::get('/get_citiesby_country_id/{country_id}',[HomeController::class,'get_citiesby_country_id'])->name('get_citiesby_country_id'); 







####### End Guest Routes ####### 



Route::get('filter_subcategory', [HomeController::class,'filter_subcategory'])->name('filter_subcategory');



Route::get('/index',[HomeController::class,'index'])->name("index");



Route::get('/home',[HomeController::class,'index'])->name("home");





Route::group(["middleware"=>"auth"],function(){

Route::group(["middleware"=>"profileauth"],function(){



Route::post('/newquestionMedia',[QuestionsController::class ,'questionMedia'])->name('question.media');

Route::post('/questionwebStore',[QuestionsController::class ,'Store'])->name('questionweb.Store');

Route::get('/deleteQuestion/{id}',[QuestionsController::class ,'deleteQuestion'])->name('questionweb.delete');

Route::post('/questionUpdate',[QuestionsController::class ,'questionUpdate'])->name('questionweb.update');





Route::post('/questionwebAnswer',[QuestionsController::class ,'storeAnswer'])->name('questionweb.Answer');

Route::post('/editAnswer',[QuestionsController::class ,'editAnswer'])->name('answerweb.edit');

Route::get('/deleteanswer/{id}',[QuestionsController::class ,'deleteAnswer'])->name('answerweb.delete');

Route::get('/questiondetails/{id}',[QuestionsController::class ,'questionDetails'])->name('question.details'); 





// after register loogin and not complete profile

// chat route by yousef qaoud

Route::get('/load-latest-messages', [MessagesController::class, 'getLoadLatestMessages']);

Route::get('/get-opened-messages', [MessagesController::class, 'getOpenedMessages']);

Route::post('/send', [MessagesController::class, 'postSendMessage']);

Route::get('/fetch-old-messages', [MessagesController::class, 'getOldMessages']);

Route::get('/view-all-messages', [MessagesController::class, 'getAllMessages']);

// end chat routes



Route::get('/dashboard',[WebUsers::class, 'dashboard'])->name('users.dashboard');



// user profile cv routes

Route::post('/cvupdate',[WebUsers::class, 'cvUpdate'])->name('users.cv.update'); 

Route::get('/deleteImageProfile/{user}',[WebUsers::class, 'deleteImageProfile'])->name('deleteImageProfile'); 

Route::post('/cvchangepassword',[WebUsers::class, 'cvChangePassword'])->name('users.cv.changepassword'); 

Route::post('/completeRegisterStep2',[WebUsers::class, 'completeRegisterStep2'])->name('completeRegisterStep2');

 



Route::post('/milestoneStore',[WebUsers::class, 'milestoneStore'])->name('milestone.store'); 



Route::post('/educationStore',[WebUsers::class, 'educationStore'])->name('education.store'); 



Route::post('/experienceStore',[WebUsers::class, 'workExperienceStore'])->name('experience.store'); 



Route::post('/certificateStore',[WebUsers::class, 'certificateStore'])->name('certificate.store'); 



Route::post('/milestoneUpdate',[WebUsers::class, 'milestoneUpdate'])->name('milestone.update'); 



Route::post('/educationUpdate',[WebUsers::class, 'educationUpdate'])->name('education.update'); 



Route::post('/workExperienceUpdate',[WebUsers::class, 'workExperienceUpdate'])->name('experience.update'); 



Route::post('/certificateUpdate',[WebUsers::class, 'certificateUpdate'])->name('certificate.update');



Route::post('/itemreport',[WebUsers::class, 'Report'])->name('item.report');



Route::post('/hiddenProject',[WebUsers::class, 'hiddenProjectCard'])->name('hidden.projectcard');



Route::post('/userupdatecover',[WebUsers::class, 'updatecover'])->name('user.updatecover'); 



Route::post('/userapplyrfq',[WebUsers::class, 'applyrfq'])->name('user.applyrfq');   



Route::post('/userapplyrfqstore',[WebUsers::class, 'applyrfqStore'])->name('user.applyrfqstore');  



Route::get('/educationDelete/{id}',[WebUsers::class, 'educationDelete'])->name('education.delete');  



Route::get('/certificateDelete/{id}',[WebUsers::class, 'certificateDelete'])->name('certificate.delete');  



Route::get('/milestoneDelete/{id}',[WebUsers::class, 'milestoneDelete'])->name('milestone.delete');  



Route::get('/experienceDelete/{id}',[WebUsers::class, 'experienceDelete'])->name('experience.delete'); 

Route::post('/settingNotificatiosUpdate',[WebUsers::class, 'settingNotificatiosUpdate'])->name('settingNotificatiosUpdate');



// User Collection management routes



Route::post('/addProjecttocollection',[WebUsers::class, 'addProjecttoCollection'])->name('project.addcollection'); 



Route::post('/collectionStore',[WebUsers::class, 'collectionStore'])->name('collection.store'); 



Route::post('/collectionUpdate',[WebUsers::class, 'collectionUpdate'])->name('collection.update'); 



Route::get('/collectionDelete/{id}',[WebUsers::class, 'deleteCollection'])->name('collection.delete');     



// end user collection routes







Route::post('/deleteInfoCv',[HomeController::class,'deleteInfoCv'])->name('user.cvinfodelete');



// Business Routes    



Route::get('/business/dashboard',[BusinessController::class,'index'])->name('business.dashboard');



// project routes



Route::post('/create_new_project',[ProjectController::class , 'create_project_store'])->name('create_project_ds');



Route::post('/request_new_project',[ProjectController::class , 'requestProjectStore'])->name('request_project_ds');



Route::post('/requestprojectmedia',[ProjectController::class , 'requestprojectMedia'])->name('requestproject.media');



Route::post('/request_new_project_feed',[HomeController::class , 'request_project_store'])->name('request_project_ds_feed');



Route::post('/business_setting_update',[BusinessController::class,'update'])->name('business_setting.update');



    



// Route::get('/feeds',[BusinessController::class,'business_feed'])->name('feeds');



//  Route::post('business_signup_setting/{id}',[BusinessController::class,'businessSignup'])->name('business_signup_setting');



Route::get('/business_profile',[BusinessController::class, 'businessProfile'])->name('business_profile');



Route::get('/businessDetails/{id}',[BusinessController::class, 'businessProfilePublic'])->name('business.details');



// Route::get('/overveiw/{id}',[ProjectOverviewController::class,'overveiw'])->name('overview');



Route::post('/save/{project_id}',[ProjectController::class,'save'])->name('save');



Route::get('/get_data_card/{project_id}/{id}',[CardCreateProjectController::class,'get_data_card'])->name('get_data_card');



Route::post('/delete_data_card/{id}',[ProjectController::class,'delete_data_card'])->name('delete_data_card');



Route::post('/update_start_type',[ProjectController::class,'update_start_type'])->name('update_start_type');



Route::post('/info_projrct',[ProjectController::class,'info_projrct'])->name('info_projrct');



Route::get('/check_card/{project_id}/{id}',[ProjectController::class,'check_card'])->name('check_card');



Route::get('/setting_project/{project_id}',[ProjectController::class,'SettingProject'])->name('setting_project.index');



Route::put('/setting_project/{project_id}',[ProjectController::class,'UpdateProject'])->name('setting_project.update');



Route::get('/draft_project',[ProjectController::class ,'draftProject'])->name('draft_project');



//   Route::get('/overview_project',[ProjectController::class ,'show'])->name('overview_project');



//   Route::get('/employees',[employeeController::class ,'index'])->name('employees');



Route::post('/employees/invit',[employeeController::class ,'invit'])->name('employees.invit');



    



// dropsoze



Route::get('files', [ProjectController::class ,'index']);



Route::post('files', [ProjectController::class ,'storeFile'])->name('file.store');



Route::post('files/remove', [ProjectController::class ,'remvoeFile'])->name('file.remove');







// JobOffer route



Route::post('/addjoboffer',[BusinessController::class ,'addJobOffer'])->name('job.store');   



// job apply



Route::post('/applyjoboffer',[BusinessController::class ,'applyJobOffer'])->name('job.apply'); 



// job un-apply



Route::get('/unApplyJobOffer/{id}',[BusinessController::class ,'unApplyJobOffer'])->name('job.unApplyJobOffer'); 



// this is media added by user applying to job



Route::post('/applyJobOfferMedia',[BusinessController::class ,'applyJobOfferMedia'])->name('job.offermedia'); 



// apply to job details



Route::get('/jobdetails/{id}',[BusinessController::class ,'jobDetails'])->name('job.details');

Route::get('/requestprojectdetails/{id}',[RequestProjectController::class ,'view'])->name('requestprojectdetails'); 

Route::get('/deleterequestproject/{id}',[RequestProjectController::class ,'delete'])->name('deleterequestproject'); 

Route::post('/requestprojectupdate',[RequestProjectController::class ,'Update'])->name('requestproject.update'); 



// who post the job added media with it



Route::post('/addJobfiles',[BusinessController::class ,'addJobfiles'])->name('jobfile.store'); 







// follow route by ibtisam



Route::get('/follow/{project_id}',[ProjectController::class ,'projectFollow'])->name('project.follow');



// un-follow



Route::get('/unfollow/{project_id}',[ProjectController::class ,'projectUnFollow'])->name('project.unfollow');



// follow business profile



Route::get('/followbusiness/{business_id}',[BusinessController::class ,'businessFollow'])->name('business.follow');



// un-follow business profile



Route::get('/unfollowbusiness/{business_id}',[BusinessController::class ,'businessUnFollow'])->name('business.unfollow');



// comments route by ibtisam



Route::any('/comment',[ProjectController::class ,'commentAdd'])->name('comment.add');



Route::get('/comment/delete/{id}',[ProjectController::class ,'commentDelete'])->name('comment.delete');



Route::post('/comment/edit',[ProjectController::class ,'commentEdit'])->name('comment.edit');



// this routes just for yousef abu qaood



Route::post('/change_status_notification' ,[HomeController::class , 'change_status_notification'] )->name('change_status_notification');



Route::post('save_template',[WbsStep1Controller::class,'save_template'])->name('save_template');



Route::get('load_template',[WbsStep1Controller::class,'load_template'])->name('load_template');



Route::get('/get_template_data',[WbsStep1Controller::class,'get_template_data'])->name('get_template_data');







Route::post('/save_card_new_template',[WbsStep1Controller::class,'save_card_new_template'])->name('save_card_new_template');







Route::get('/wbs-step-1/{project}',[WbsStep1Controller::class,'index'])->name('wbs-step-1');



Route::post('/wbs-step-1/{project}',[WbsStep1Controller::class,'store'])->name('wbs-step-1.store');



Route::get('/editor_init/{project}',[WbsStep1Controller::class,'editor_init'])->name('editor_init');







//post comment.edit



Route::any('/postcomment',[PostsController::class ,'commentAdd'])->name('postcomment.add');



Route::get('/postcomment/delete/{id}',[PostsController::class ,'commentDelete'])->name('postcomment.delete');



Route::post('/popstcomment/edit',[PostsController::class ,'commentEdit'])->name('postcomment.edit');

Route::get('/popstlike/{id}',[PostsController::class ,'like'])->name('post.like');

Route::get('/popstunlike/{id}',[PostsController::class ,'unlike'])->name('post.unlike');







// blog follow



Route::get('/blogfollow',[PostsController::class,'follow'])->name('blog.follow');



Route::get('/blogunfollow',[PostsController::class,'unfollow'])->name('blog.unfollow');



Route::get('/send-notification', [NotificationController::class, 'sendBlogNotification']);



});



});











######## Login by facebook



Route::get('auth/{provider}', [SocialController::class, 'Redirect']);



Route::get('auth/{provider}/callback', [SocialController::class, 'loginWithProvider']);



####### Login by Google



Route::get('auth/{provider}', [SocialController::class, 'Redirect']);



Route::get('auth/{provider}/callback', [SocialController::class, 'handleGoogleCallback']);







Route::get('/blog',[PostsController::class , 'blog'])->name('blog');



Route::get('/{slug}',[PostsController::class , 'postview'])->name('post.view');



Route::get('/{id}/{slug?}', [HomeController::class , 'pageview'])->name('page.show');







// to clear all type cache



Route::get('/clear', function() {



    $exitCode = Artisan::call('config:cache');



    $exitCode = Artisan::call('config:clear');



    $exitCode = Artisan::call('cache:clear');



    $exitCode = Artisan::call('view:clear');



    $exitCode = Artisan::call('route:clear');



    $exitCode = Artisan::call('clear-compiled');



    return 'DONE'; 



});



  



Route::get('/storage-link', function () {



    Artisan::call('storage:link');



});















  /*



// for later



Route::post('project_update/{project_id}',[ProjectController::class ,'create_project_update'])->name('update_project');



Route::get('/update_project/{project_id}',[ProjectController::class,'editProject'])->name('update_project.index');



Route::get('/analytics/{project_id}',[ProjectController::class,'analytics'])->name('analytics.index'); */