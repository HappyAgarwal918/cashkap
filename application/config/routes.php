<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['check-course']='SearchController/search_course';
$route['get-course']='SearchController/get_course';
$route['check-city']='SearchController/search_city';
$route['search/(:any)']='Webpagecontroller/search_listing/$1';
$route['default_controller']='Webpagecontroller/home';
$route['contact-us']='Webpagecontroller/contact_us';
$route['about-us']='Webpagecontroller/introduction';
$route['company-overseas']='Webpagecontroller/company_overseas';
$route['vision-mission']='Webpagecontroller/vision_mission';
$route['benefits']='Webpagecontroller/benefits';
$route['career']='Webpagecontroller/career';
$route['testimonials']='Webpagecontroller/testimonials';
$route['terms-conditions']='Webpagecontroller/terms_conditions';
$route['category/(:any)']='Categorycontroller/category_listing/$1';
$route['category/(:any)/(:any)']='Categorycontroller/category_sublisting/$1/$2';
$route['page/(:any)/(:any)']='Categorycontroller/category_listing_detail/$1/$2';
$route['student/get-discount']='Studentcontroller/get_discountcode';
// $route['student/get-discount/(:any)/(:num)']='Studentcontroller/get_discount/$1/$2';
$route['student/get-discount/(:any)/(:any)/(:any)']='Studentcontroller/get_discount/$1/$2/$3';
$route['student/get-discount/verify-mobile/(:any)']='Studentcontroller/verify_dismobile/$1';
$route['student/get-discount/regform-status/(:any)']='Studentcontroller/get_discountstatus/$1';
$route['student/login']='Studentcontroller/student_login';
$route['student/forgot-password']='Studentcontroller/student_forgotpass';
$route['student/registration']='Studentcontroller/student_registration';
$route['associate/registration']='Associatecontroller/associate_regstep1';
$route['associate/login']='Associatecontroller/associate_login';
$route['associate/forgot-password']='Associatecontroller/associate_forgotpass';
$route['associate/registration-form/(:any)']='Associatecontroller/associate_regstep2/$1';
$route['associate/dashboard']='Associatecontroller/associate_dashboard';
$route['associate/logout']='Associatecontroller/associate_logout';
$route['associate/profile']='Associatecontroller/associate_profile';
$route['associate/edit-profile']='Associatecontroller/associate_editprofile';
$route['associate/featured-image']='Associatecontroller/associate_featuredimg';
$route['associate/courses']='Associatecontroller/associate_courses';
$route['associate/course/add']='Associatecontroller/add_associate_course';
$route['associate/about']='Associatecontroller/associate_about';
$route['associate/photo-gallery']='Associatecontroller/photo_gallery';
$route['associate/photo-gallery/add']='Associatecontroller/add_photo';
$route['associate/edit-gallery/(:num)']='Associatecontroller/edit_photo/$1';
$route['associate/student-pending/manage']='Associatecontroller/student_pending';
$route['associate/student/view/(:any)']='Associatecontroller/view_student/$1';
$route['associate/student/redeem-coupon/(:any)']='Associatecontroller/redeem_coupon/$1';
$route['associate/student-redeemed/manage']='Associatecontroller/student_redeemed';
$route['associate/student-redeemed/view/(:any)']='Associatecontroller/view_studentredeem/$1';
/* Manage Account  */
$route['master/forgot-password']='master/AdminController/forgot_password';
$route['master']='master/AdminController/ad_login';
$route['master/login']='master/AdminController/ad_login';
$route['master/dashboard']='master/AdminController/admin_dashboard';
$route['master/logout']='master/AdminController/admin_logout';
$route['master/profile']='master/AdminController/admin_profile';
/* Manage Student */
$route['student/dashboard']='Studentcontroller/student_dashboard';
$route['student/profile']='Studentcontroller/student_profile';
$route['student/discount-coupon']='Studentcontroller/student_discountform';
$route['student/logout']='Studentcontroller/student_logout';
$route['student/get-discount/regform/(:any)']='Studentcontroller/discount_regform/$1';
$route['student/discount-coupon/view/(:any)']='Studentcontroller/view_discountform/$1';
$route['student/discount-coupon/upload-slip/(:any)']='Studentcontroller/upload_slip/$1';
/******* User Manage *********/
$route['master/user/manage']='master/UsermController/manage_user';
$route['master/user/view/(:num)']='master/UsermController/view_user/$1';
$route['master/user/view-coupon/(:num)/(:num)']='master/UsermController/view_coupon/$1/$2';



/* Manage Coupon Manage  */
$route['master/coupon/manage']='master/DiscouponController/manage_coupon';
$route['master/coupon/manage-pending']='master/DiscouponController/manage_couponpend';
$route['master/coupon/pending-view/(:num)']='master/DiscouponController/view_couponpend/$1';
$route['master/coupon/view/(:num)']='master/DiscouponController/view_coupon/$1';
$route['master/coupon/cashback/(:num)']='master/DiscouponController/add_cashback/$1';
/* Manage Course Manage  */
$route['master/course/manage']='master/CoursesController/manage_courses';
$route['master/course/add']='master/CoursesController/add_course';
$route['master/course/edit/(:num)']='master/CoursesController/edit_course/$1';
/* Manage Associates */
$route['master/associate/manage-pending']='master/AssociatemController/manage_associate_pend';
$route['master/associate/manage']='master/AssociatemController/manage_associate';
$route['master/associate/view/(:num)']='master/AssociatemController/view_associate/$1';
$route['master/associate/approval-status/(:num)']='master/AssociatemController/associate_changeapstatus/$1';
$route['master/associate/remove/(:num)']='master/AssociatemController/remove_associate/$1';
$route['master/associate/student-enrolled/(:num)']='master/AssociatemController/student_enrolled/$1';
$route['master/associate/manage-courses/(:num)']='master/AssociatemController/manage_courses/$1';
$route['master/associate/add-course/(:num)']='master/AssociatemController/add_course/$1';
$route['master/associate/edit-course/(:num)/(:num)']='master/AssociatemController/edit_course/$1/$2';
$route['master/associate/delete-course/(:num)/(:num)']='master/AssociatemController/del_course/$1/$2';
$route['master/associate/edit/(:num)']='master/AssociatemController/edit_associate/$1';
$route['master/associate/photo-gallery/(:num)']='master/AssociatemController/photo_gallery/$1';
$route['master/associate/add-photo/(:num)']='master/AssociatemController/add_photogallery/$1';
$route['master/associate/remove-gallery/(:num)/(:num)']='master/AssociatemController/remove_photogallery/$1/$2';
$route['master/associate/edit-gallery/(:num)/(:num)']='master/AssociatemController/edit_photogallery/$1/$2';
$route['master/associate/featured-image/(:num)']='master/AssociatemController/edit_featuredimg/$1';
/***** Associate Video *****/
$route['master/associate/video-gallery/(:num)']='master/AssociatemController/video_gallery/$1';
$route['master/associate/add-video/(:num)']='master/AssociatemController/add_video/$1';
$route['master/associate/remove-videogallery/(:num)/(:num)']='master/AssociatemController/remove_video/$1/$2';
$route['master/associate/edit-videogallery/(:num)/(:num)']='master/AssociatemController/edit_video/$1/$2';
/****** Settings **********/
$route['master/setting/manage-state']='master/SettingController/manage_state';
$route['master/setting/edit-state/(:num)']='master/SettingController/edit_state/$1';
$route['master/setting/manage-city/(:num)']='master/SettingController/manage_cities/$1';
$route['master/setting/add-city/(:num)']='master/SettingController/add_city/$1';
$route['master/setting/edit-city/(:num)/(:num)']='master/SettingController/edit_city/$1/$2';

$route['master/setting/manage-institutes']='master/SettingController/manage_institutes';
$route['master/setting/add-institute']='master/SettingController/add_institute/$1';
$route['master/setting/edit-institute/(:num)']='master/SettingController/edit_institute/$1';
/***** Video Gallery *******/
$route['master/video-gallery/manage']='master/Video_Controller/manage_video';
$route['master/video-gallery/add-new']='master/Video_Controller/add_video';
$route['master/video-gallery/delete/(:num)']='master/Video_Controller/del_video/$1';
$route['master/video-gallery/edit/(:num)']='master/Video_Controller/edit_video/$1';
/***** Featured Gallery ****/
$route['master/featured-gallery/manage']='master/Featuredgallery_Controller/manage_featuredimages';
$route['master/featured-gallery/add-new']='master/Featuredgallery_Controller/add_featuredimage';
$route['master/featured-gallery/delete/(:num)']='master/Featuredgallery_Controller/del_featuredimg/$1';
$route['master/featured-gallery/edit/(:num)']='master/Featuredgallery_Controller/edit_featuredimage/$1';
$route['master/featured-gallery/add-image/(:num)']='master/Featuredgallery_Controller/up_orgimage/$1';
// *****************abroad Admin**************
$route['master/abroad/all/applications']='StudyAbroadController/getAllNewApplication'; 
$route['master/abroad/all/colleges']='StudyAbroadController/getaalclg'; 
$route['master/abroad/add/colleges/page']='StudyAbroadController/PageAddNewCollege'; 
$route['master/abroad/add/colleges']='StudyAbroadController/AddNewCollege'; 
$route['master/abroad/add/coursh']='StudyAbroadController/AddNewCoursh'; 
$route['master/abroad/add/newcntry']='StudyAbroadController/addNewcountry'; 
$route['master/abroad/country/eligiblity']='StudyAbroadController/cntyeligiblty'; 
$route['master/abroad/colleges/details/(:any)']='StudyAbroadController/collegesCourshDetails/$1'; 
$route['master/abroad/applications/details/(:any)']='StudyAbroadController/viewUser/$1'; 
$route['master/abroad/Upload/page/(:any)']= 'StudyAbroadController/imgUploadpage/$1';
$route['master/abroad/Upload/fileUpload']= 'StudyAbroadController/uploadDocs';
$route['master/abroad/delete/countryeligiblity/(:any)']= 'StudyAbroadController/deletecntryeligiblity/$1';
$route['master/abroad/delete/college/(:any)']= 'StudyAbroadController/deletecollege/$1';


// ******************** ABROAD ******************** 
$route['study/abroad']='StudyAbroadController/studyAbroadMain'; 
$route['provinces/list']='StudyAbroadController/studyAbroadMainProvincesList';
$route['college/list']='StudyAbroadController/studyAbroadMainClgUniList';
$route['searchData']= 'StudyAbroadController/searchData';
$route['apply/now']='Studentcontroller/student_Applynow';
$route['resend/OTP']='Studentcontroller/resendOTP';
$route['country/checklist']='StudyAbroadController/Countrychecklist';
$route['country/Provinces/checklist']='StudyAbroadController/Countrychecklist';
$route['get/DOB']='Studentcontroller/date';
$route['abroad-student-registration']='StudyAbroadController/AbrodStudentRegistration';
$route['abrod-student-login']='StudyAbroadController/AbrodStudentLogin';
$route['submit-registration-form']= 'StudyAbroadController/abrodSubmitNewUserRegistration';
$route['submit-login-form']= 'StudyAbroadController/abrodSubmitNewUserLogin';
$route['study-abroad-sendOTP']= 'StudyAbroadController/sendOTP';
$route['study-abroad-verifyotp']= 'StudyAbroadController/verifyOTP';
$route['study-abroad-resendOTP']= 'StudyAbroadController/AbroadReSendOTP';
$route['abrad-student-dashbord']= 'StudyAbroadController/abradStudentDashbord';
$route['abroad-get-coursh']= 'StudyAbroadController/getCourshData';
$route['abroad-apply/(:any)']= 'StudyAbroadController/abroadApllyNow/$1';
$route['abroad-apply-counrty/(:any)']= 'StudyAbroadController/Applyforcntry/$1';
$route['submit-offer-letter']= 'StudyAbroadController/submitOfferLettar';
$route['abroad-student-logout']= 'StudyAbroadController/Abroadstudent_logout';
$route['update/mobile/number']= 'StudyAbroadController/updateUserMob';
$route['study/abroad/about']= 'StudyAbroadController/AbroadAboutus';
$route['study/abroad/contact']= 'StudyAbroadController/AbroadContactus';
$route['study/abroad/eligibility/(:any)']= 'StudyAbroadController/eligibility/$1';
$route['study/abroad/collage/(:any)']= 'StudyAbroadController/AbroadclgPage/$1';
// $route['study/abroad/collage']= 'StudyAbroadController/AbroadclgPage';
?>