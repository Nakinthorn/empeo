<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('home');
// $routes->setDefaultMethod('maincon');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// test post
$routes->get('/logindom', 'Logintest::index');
$routes->post('logindom2', 'Logintest::login');
//-------------------

$routes->get('/', 'Homecon::home');
$routes->get('/home', 'Homecon::home');
$routes->get('/logout', 'Homecon::logout');
$routes->get('/index.php/Homecon', 'Homecon::home');
// $routes->get('/profile/template', 'ProfileCon::profile_by_idv2');
$routes->get('/calendar', 'Homecon::calendar');
$routes->get('/profile', 'ProfileCon::profilev2');
$routes->get('/choose_people', 'ChoosePeopleCon::choose_people');
$routes->get('/my_document', 'MydocumentCon::my_document');
$routes->get('/manager_document', 'MydocumentCon::manager');
$routes->get('/my_document_detail', 'MydocumentDetailCon::my_document_detail');
$routes->get('/change_shift', 'ChangeShiftsCon::change_shifts');
$routes->get('/change_shift_user2', 'ChangeShiftsCon::change_shifts_user2');
$routes->get('/change_shift_user_admin', 'ChangeShiftsCon::change_shifts_admin');
// $routes->get('/my_document_param', 'MydocumentCon::my_document_param');
$routes->post('/my_document_param', 'MydocumentCon::my_document_param');
$routes->get('/edit_profile', 'EditProfileCon::edit_profile');
$routes->get('/remaining', 'remainingCon::remaining');
// $routes->get('/domcon', 'domcon::dom2');
// $routes->get('/daew', 'maincon::daew01');
$routes->get('/document', 'maincon::doc1/$1');
// $routes->get('/calendar', 'maincon::calendar');
$routes->get('/leave', 'maincon::leavereq/$1');
$routes->get('/test', 'maincon::tonytest/$1');
$routes->get('/test_modal', 'domcon::dom2/$1');
$routes->get('/my-api', 'apicon::index');
$routes->get('/offsite', 'maincon::offsite/$1');
$routes->get('/ot', 'maincon::ot/$1');
$routes->get('/login', 'LoginController::loginView/$1');
$routes->get('/login2', 'LoginController::login/$1');
$routes->get('/setSession', 'deawlogin::setSession/$1');
// $routes->get('/loginFirst', 'LoginFirstController::loginFirst/$1');
$routes->get('/checkin', 'CheckinController::checkin/$1');
$routes->post('/loginFirst', 'LoginController::login/$1');
$routes->get('/loginFirst2', 'LoginFirstController::loginFirstView/$1');
$routes->post('/newpassword', 'LoginFirstController::loginFirst');
$routes->get('/daew', 'DaewController::daewView');
$routes->get('/checkout', 'deawlogin::checkoutMethod/$1');
$routes->get('/settings', 'SettingsController::viewsSetting/$1');
$routes->get('/change_password', 'ChangePassword::changePasswordView');
$routes->get('/salary_slip', 'SalarySlip::salarySlipView');
$routes->get('/add_employee', 'maincon::addemp/$1');
$routes->get('/menu/admin', 'adminCon::menu_admin');
$routes->get('/menu/add_emp', 'adminCon::add_emp');
$routes->get('/menu/add_company_first', 'adminCon::add_company');
$routes->get('/menu/add_company', 'adminCon::add_companyv2');
$routes->get('/menu/my_department','adminCon::edit_department');
$routes->get('/forgot_password', 'ForgotPassword::forgotPasswordView');
$routes->get('/pin', 'PinController::pinView');
$routes->get('/edit_myprofile', 'adminCon::edit_myprofile');
$routes->get('/edit_company', 'adminCon::edit_company');
$routes->get('/edit_companybyid', 'adminCon::edit_companyByid');
$routes->get('/update_company', 'EditCompany::editCompanyView');
$routes->get('/edit_employee', 'adminCon::edit_employeeByAdmin');
$routes->get('/employee_info', 'EmployeeInfo::employeeInfoView');
$routes->get('/salary_details', 'SalaryDetails::salaryDetailsView');
$routes->get('/menu/permission', 'adminCon::Permission');
$routes->get('/profile/id', 'adminCon::profileById');
$routes->get('/firstEmpBusiness', 'adminCon::add_first_emp');
$routes->get('/salary', 'Salary::salaryView');
$routes->get('/income_deduction', 'Salary::incomeDeductionView');
$routes->get('/pay_installment', 'Salary::payInstallmentView');
$routes->get('/employment_type', 'Salary::employmentTypeView');
$routes->get('/master_data', 'MasterData::MasterDataView');
$routes->get('/common_master', 'MasterData::CommonMasterView');

$routes->get('/social_security_contribution', 'MasterData::SocialSecurityContributionView');
$routes->get('/year_to_date_earning', 'MasterData::YearToDateEarningView');
$routes->get('/notification_template', 'MasterData::NotificationTemplateView');
$routes->get('/employee_data_field', 'MasterData::EmployeeDataFieldView');
$routes->get('/setting_email_notification', 'MasterData::SettingEmailNotificationView');

$routes->get('/expense_setup', 'MasterData::ExpenseSetupView');

$routes->get('/backoffice/dashboard', 'adminCon::DashboardView');
$routes->get('/backoffice/setup', 'adminCon::SetupView');
$routes->get('/backoffice/pay-period', 'adminCon::PayPeriodView');

$routes->get('/backoffice/login', 'AdminCon::AdminLoginView');
$routes->get('/backoffice/master', 'AdminCon::MasterView');
$routes->get('/backoffice/social-security-rate', 'AdminCon::SocialSecurityRateView');
$routes->get('/backoffice/accumulate', 'AdminCon::AccumulateView');
$routes->get('/backoffice/expense', 'AdminCon::ExpenseView');
$routes->get('/backoffice/master-home', 'AdminCon::MasterHomeView');
$routes->get('/backoffice/holiday-calendar', 'AdminCon::HolidayCalendarView');
$routes->get('/backoffice/temp', 'AdminCon::TempView');
$routes->get('/backoffice/404', 'AdminCon::NotFoundView');

//new 25
// $routes->get('/backoffice/setup', 'AdminCon::setup');
$routes->get('/backoffice/user-hrm', 'AdminCon::user_hrm');
$routes->get('/backoffice/user-hrm-add', 'AdminCon::user_hrm_add');
$routes->get('/backoffice/social-security-rate', 'AdminCon::social_security_rate');
$routes->get('/backoffice/shift_setting', 'AdminCon::shift_setting');
$routes->get('/backoffice/shift_editv2', 'AdminCon::shift_editv2');
$routes->get('/backoffice/shift_edit', 'AdminCon::shift_edit');
$routes->get('/backoffice/shift_add', 'AdminCon::shift_add');
$routes->get('/backoffice/setup-menu', 'AdminCon::setup_menu');
$routes->get('/backoffice/setupcompany', 'AdminCon::setupcompany');
$routes->get('/backoffice/position', 'AdminCon::position');
$routes->get('/backoffice/payment-method', 'AdminCon::payment_method');
$routes->get('/backoffice/pay-period-add', 'AdminCon::pay_period_add');
$routes->get('/backoffice/organization', 'AdminCon::organization');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
