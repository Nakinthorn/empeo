<?php

namespace App\Controllers;

class MasterData extends BaseController
{
    public function MasterDataView()
    {
        $data = [
            'title' => 'Master Data',
            'url1' => "window.location.href = '".base_url('home')."'",
            'header'=>'Master Data'
        ];
        return view('pages/master_data', $data);
    }
    public function CommonMasterView() {
        return view('pages/common_master');
    }
    public function SocialSecurityContributionView() {
        return view('pages/social_security_contribution');
    }

    public function YearToDateEarningView() {
        return view('pages/year_to_date_earning');
    }
    public function NotificationTemplateView() {
        return view('pages/notification_template');
    }

    public function EmployeeDataFieldView() {
        return view('pages/employee_data_field');
    }

    public function SettingEmailNotificationView() {
        return view('pages/setting_email_notification');
    }
    public function ExpenseSetupView() {
        return view('pages/expense_setup');
    }
    
}



