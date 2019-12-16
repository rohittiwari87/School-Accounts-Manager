<?php

namespace app\database;

class Schema {

    const APP_ADMIN_PASSWORD = 'Admin_Password';
    const APP_APP_VERSION = 'App_Version';
    const APP_DATABASE_VERSION = 'Database_Version';
    const APP_DEBUG_MODE = 'Debug_Mode';
    const APP_FORCE_HTTPS = 'Force_HTTPS';
    const APP_MOTD = 'MOTD';
    const APP_NAME = 'Name';
    const APP_PROTECTED_ADMIN_USERNAMES = 'Protected_Admin_Usernames';
    const APP_UPDATE_CHECK_URL = 'Update_Check_URL';
    const APP_USER_HELPDESK_URL = 'User_Helpdesk_URL';
    const APP_WEBSITIE_FQDN = 'Websitie_FQDN';
    const AUTH_ADMIN_AD_GROUP = 'Admin_AD_Group';
    const AUTH_ADMIN_GA_GROUP = 'Admin_GA_Group';
    const AUTH_BASIC_AD_GROUP = 'Basic_AD_Group';
    const AUTH_BASIC_GA_GROUP = 'Basic_GA_Group';
    const AUTH_LDAP_ENABLED = 'LDAP_Enabled';
    const AUTH_LDAP_PASSWORD = 'LDAP_Password';
    const AUTH_SESSION_TIMEOUT = 'Session_Timeout';
    const AUTH_LDAP_PORT = 'LDAP_Port';
    const AUTH_LDAP_SERVER = 'LDAP_Server';
    const AUTH_LDAP_USE_SSL = 'LDAP_Use_SSL';
    const AUTH_LDAP_USERNAME = 'LDAP_Username';
    const AUTH_OAUTH_ENABLED = 'OAuth_Enabled';
    const AUTH_POWER_AD_GROUP = 'Power_AD_Group';
    const AUTH_POWER_GA_GROUP = 'Power_GA_Group';
    const AUTH_TECH_AD_GROUP = 'Tech_AD_Group';
    const AUTH_TECH_GA_GROUP = 'Tech_GA_Group';
    const DISTRICTS_ABBREVIATION = 'Abbreviation';
    const DISTRICTS_GRADE_SPAN_FROM = 'Grade_Span_From';
    const DISTRICTS_GRADE_SPAN_TO = 'Grade_Span_To';
    const DISTRICTS_ID = 'ID';
    const DISTRICTS_NAME = 'Name';
    const DISTRICTS_PARENT_EMAIL_GROUP = 'Parent_Email_Group';
    const DISTRICTS_STAFF_AD_DC = 'Staff_AD_DC';
    const DISTRICTS_STAFF_AD_FQDN = 'Staff_AD_FQDN';
    const DISTRICTS_STAFF_AD_GROUP = 'Staff_AD_Group';
    const DISTRICTS_STAFF_AD_OU = 'Staff_AD_OU';
    const DISTRICTS_STAFF_DOMAIN_NETBIOS = 'Staff_Domain_NetBIOS';
    const DISTRICTS_STAFF_GA_FQDN = 'Staff_GA_FQDN';
    const DISTRICTS_STAFF_GA_GROUP = 'Staff_GA_Group';
    const DISTRICTS_STAFF_GA_OU = 'Staff_GA_OU';
    const DISTRICTS_STUDENT_AD_DC = 'Student_AD_DC';
    const DISTRICTS_STUDENT_AD_FQDN = 'Student_AD_FQDN';
    const DISTRICTS_STUDENT_DOMAIN_NETBIOS = 'Student_Domain_NetBIOS';
    const DISTRICTS_STUDENT_GA_FQDN = 'Student_GA_FQDN';
    const EMAIL_ADMIN_EMAIL_ADDRESSES = 'Admin_Email_Addresses';
    const EMAIL_FROM_ADDRESS = 'From_Address';
    const EMAIL_FROM_NAME = 'From_Name';
    const EMAIL_REPLY_TO_ADDRESS = 'Reply_To_Address';
    const EMAIL_REPLY_TO_NAME = 'Reply_To_Name';
    const EMAIL_SMTP_PASSWORD = 'SMTP_Password';
    const EMAIL_SMTP_PORT = 'SMTP_Port';
    const EMAIL_SMTP_SERVER = 'SMTP_Server';
    const EMAIL_SMTP_USERNAME = 'SMTP_Username';
    const EMAIL_USE_SMTP_AUTH = 'Use_SMTP_Auth';
    const EMAIL_USE_SMTP_SSL = 'Use_SMTP_SSL';
    const EMAIL_WELCOME_EMAIL_BCC = 'Welcome_Email_BCC';
    const EMAIL_WELCOME_EMAIL = 'Welcome_Email';
    const GRADES_FORCE_STUDENT_PASSWORD_CHANGE = 'Force_Student_Password_Change';
    const GRADES_ID = 'ID';
    const GRADES_VALUE = 'Value';
    const GRADES_NAME = 'Name';
    const GRADES_PARENT_EMAIL_GROUP = 'Parent_Email_Group';
    const GRADES_SCHOOL_ID = 'School_ID';
    const GRADES_STAFF_AD_GROUP = 'Staff_AD_Group';
    const GRADES_STAFF_AD_OU = 'Staff_AD_OU';
    const GRADES_STAFF_GA_GROUP = 'Staff_GA_Group';
    const GRADES_STAFF_GA_OU = 'Staff_GA_OU';
    const GRADES_STUDENT_AD_GROUP = 'Student_AD_Group';
    const GRADES_STUDENT_AD_OU = 'Student_AD_OU';
    const GRADES_STUDENT_GA_GROUP = 'Student_GA_Group';
    const GRADES_STUDENT_GA_OU = 'Student_GA_OU';
    const LOGON_ID = 'ID';
    const LOGON_TIMESTAMP = 'Timestamp';
    const LOGON_USERNAME = 'Username';
    const SCHOOLS_DISTRICT_ID = 'District_ID';
    const SCHOOLS_ID = 'ID';
    const SCHOOLS_NAME = 'Name';
    const SCHOOLS_OTHER_STAFF_EMAIL_GROUPS = 'Other_Staff_Email_Groups';
    const SCHOOLS_STAFF_AD_GROUP = 'Staff_AD_Group';
    const SCHOOLS_STAFF_AD_OU = 'Staff_AD_OU';
    const SCHOOLS_STAFF_GA_GROUP = 'Staff_GA_Group';
    const SCHOOLS_STAFF_GA_OU = 'Staff_GA_OU';
    const TEAMS_EMAIL_GROUP = 'Email_Group';
    const TEAMS_GRADE_ID = 'Grade_ID';
    const TEAMS_ID = 'ID';
    const TEAMS_NAME = 'Name';
    const TEAMS_PARENT_EMAIL_GROUP = 'Parent_Email_Group';
    const TEAMS_STAFF_AD_GROUP = 'Staff_AD_Group';
    const TEAMS_STAFF_AD_OU = 'Staff_AD_OU';
    const TEAMS_STAFF_GA_GROUP = 'Staff_GA_Group';
    const TEAMS_STAFF_GA_OU = 'Staff_GA_OU';
    const TEAMS_STUDENT_AD_GROUP = 'Student_AD_Group';
    const TEAMS_STUDENT_AD_OU = 'Student_AD_OU';
    const TEAMS_STUDENT_GA_GROUP = 'Student_GA_Group';
    const TEAMS_STUDENT_GA_OU = 'Student_GA_OU';
    const SESSIONS_ID = 'ID';
    const SESSIONS_LAST_AUTHENTICATED = 'Last_Authenticated';
    const SESSIONS_TOKEN = 'Token';
    const SESSIONS_USER_OBJECT = 'User_Object';
    const APP_ID = 'ID';
    const AUTH_ID = 'ID';
    const AUTH_APP_ID = 'App_ID';
    const EMAIL_ID = 'ID';
    const EMAIL_APP_ID = 'App_ID';
    const DISTRICTS_AD_FQDN = 'AD_FQDN';
    const DISTRICTS_GA_FQDN = 'GA_FQDN';
    const DISTRICTS_AD_NETBIOS = 'AD_NetBIOS';
    const DISTRICTS_STAFF_AD_HOME_PATH = 'Staff_AD_Home_Path';
    const DISTRICTS_STAFF_AD_LOGON_SCRIPT = 'Staff_AD_Logon_Script';
    const GRADES_ABBREVIATION = 'Abbreviation';
    const GRADES_STUDENT_AD_HOME_PATH = 'Student_AD_Home_Path';
    const GRADES_STUDENT_AD_LOGON_SCRIPT = 'Student_AD_Logon_Script';
    const GRADES_STUDENT_AD_DESCRIPTION = 'Student_AD_Description';
    const GRADES_STAFF_AD_HOME_PATH = 'Staff_AD_Home_Path';
    const GRADES_STAFF_AD_LOGON_SCRIPT = 'Staff_AD_Logon_Script';
    const GRADES_STAFF_AD_DESCRIPTION = 'Staff_AD_Description';
    const SCHOOLS_STAFF_AD_HOME_PATH = 'Staff_AD_Home_Path';
    const SCHOOLS_STAFF_AD_LOGON_SCRIPT = 'Staff_AD_Logon_Script';
    const SCHOOLS_STAFF_AD_DESCRIPTION = 'Staff_AD_Description';
    const TEAMS_STUDENT_AD_HOME_PATH = 'Student_AD_Home_Path';
    const TEAMS_STUDENT_AD_DESCRIPTION = 'Student_AD_Description';
    const TEAMS_STUDENT_LOGON_SCRIPT = 'Student_Logon_Script';
    const TEAMS_STAFF_AD_HOME_PATH = 'Staff_AD_Home_Path';
    const TEAMS_STAFF_AD_DESCRIPTION = 'Staff_AD_Description';
    const TEAMS_STAFF_LOGON_SCRIPT = 'Staff_Logon_Script';

 }