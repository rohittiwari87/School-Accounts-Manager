--
-- File generated with SQLiteStudio v3.2.1 on Thu Dec 19 11:42:05 2019
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: ActiveDirectory
CREATE TABLE ActiveDirectory (ID INTEGER PRIMARY KEY AUTOINCREMENT, District_ID INTEGER REFERENCES District (ID) ON DELETE CASCADE ON UPDATE CASCADE UNIQUE, School_ID INTEGER REFERENCES School (ID) ON DELETE CASCADE ON UPDATE CASCADE UNIQUE, Grade_ID INTEGER REFERENCES Grade (ID) ON DELETE CASCADE ON UPDATE CASCADE, Team_ID INTEGER REFERENCES Team (ID) ON DELETE CASCADE ON UPDATE CASCADE, Type STRING CHECK ((Type = 'Student' or Type = 'Staff')) NOT NULL, OU STRING, "Group" STRING, Home_Path STRING, Logon_Script STRING, Description STRING, Username_Format STRING, Force_Password_Change BOOLEAN NOT NULL DEFAULT (FALSE));

-- Table: App
CREATE TABLE App (ID PRIMARY KEY DEFAULT (1) CHECK (ID = 1), Name STRING NOT NULL DEFAULT "School Accounts Manager", Force_HTTPS BOOLEAN NOT NULL DEFAULT (FALSE), MOTD TEXT, Debug_Mode BOOLEAN DEFAULT (FALSE) NOT NULL, Admin_Password STRING DEFAULT ('5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8') NOT NULL, Protected_Admin_Usernames STRING, Websitie_FQDN STRING, App_Version STRING DEFAULT ('0.1.0'), Database_Version STRING DEFAULT ('0.1.0'), User_Helpdesk_URL STRING, Update_Check_URL STRING DEFAULT ('https://raw.githubusercontent.com/jacobsen9026/School-Accounts-Manager/master/version.txt'));

-- Table: Auth
CREATE TABLE Auth (ID INTEGER PRIMARY KEY, App_ID INTEGER REFERENCES App (ID) ON DELETE CASCADE ON UPDATE CASCADE UNIQUE NOT NULL, Tech_AD_Group STRING, Admin_AD_Group STRING, Power_AD_Group STRING, Basic_AD_Group STRING, Tech_GA_Group STRING, Admin_GA_Group STRING, Power_GA_Group STRING, Basic_GA_Group STRING, LDAP_Enabled BOOLEAN, LDAP_Server STRING, LDAP_Port INTEGER, LDAP_Username STRING, LDAP_Password STRING, LDAP_Use_SSL BOOLEAN, OAuth_Enabled BOOLEAN, Session_Timeout INTEGER NOT NULL DEFAULT (1200));

-- Table: District
CREATE TABLE District (ID INTEGER PRIMARY KEY ASC AUTOINCREMENT, App_ID INTEGER REFERENCES App (ID) ON DELETE CASCADE ON UPDATE CASCADE UNIQUE NOT NULL, Name TEXT UNIQUE NOT NULL, Grade_Span_From STRING, Grade_Span_To STRING, Abbreviation STRING, AD_FQDN STRING, AD_NetBIOS STRING, GA_FQDN STRING, Parent_Email_Group STRING);

-- Table: Email
CREATE TABLE Email (ID INTEGER PRIMARY KEY AUTOINCREMENT, App_ID INTEGER REFERENCES App (ID) ON DELETE CASCADE ON UPDATE CASCADE UNIQUE NOT NULL, From_Address STRING, From_Name STRING, Admin_Email_Addresses STRING, Welcome_Email_BCC STRING, Welcome_Email STRING, Reply_To_Address STRING, Reply_To_Name STRING, Use_SMTP_SSL BOOLEAN, SMTP_Server STRING, SMTP_Port INTEGER, Use_SMTP_Auth BOOLEAN, SMTP_Username STRING, SMTP_Password STRING);

-- Table: GoogleApps
CREATE TABLE GoogleApps (ID INTEGER PRIMARY KEY AUTOINCREMENT, School_ID INTEGER REFERENCES School (ID) ON DELETE CASCADE ON UPDATE CASCADE, District_ID INTEGER REFERENCES District (ID) ON DELETE CASCADE ON UPDATE CASCADE, Grade_ID INTEGER REFERENCES Grade (ID) ON DELETE CASCADE ON UPDATE CASCADE, Team_ID INTEGER REFERENCES Team ON DELETE CASCADE ON UPDATE CASCADE, Type STRING NOT NULL CHECK ((Type = 'Student' or Type = 'Staff')), OU STRING, "Group" STRING, Username_Format STRING, Force_Password_Change BOOLEAN NOT NULL DEFAULT (FALSE), Other_Groups);

-- Table: Grade
CREATE TABLE Grade (ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, School_ID INTEGER REFERENCES School (ID) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL, Grade_Definition_ID INTEGER REFERENCES GradeDefinition (Value) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL, Parent_Email_Group STRING);

-- Table: GradeDefinition
CREATE TABLE GradeDefinition (Value INTEGER PRIMARY KEY, Display_Code STRING, Display_Name STRING);

-- Table: Logon
CREATE TABLE Logon (ID INTEGER PRIMARY KEY AUTOINCREMENT, Timestamp DATETIME DEFAULT (SYSDATETIME()), Username STRING);

-- Table: School
CREATE TABLE School (ID INTEGER PRIMARY KEY ASC AUTOINCREMENT, District_ID INTEGER REFERENCES District (ID) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL, Name TEXT, Abbreviation STRING, Parent_Email_Group STRING);

-- Table: Session
CREATE TABLE Session (ID INTEGER PRIMARY KEY AUTOINCREMENT, App_ID INTEGER REFERENCES App (ID) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL, Last_Authenticated DATETIME DEFAULT (SYSDATETIME()), User_Object STRING, Token STRING UNIQUE);

-- Table: Team
CREATE TABLE Team (ID INTEGER PRIMARY KEY AUTOINCREMENT, Grade_ID INTEGER REFERENCES Grade (ID) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL, Name STRING, Parent_Email_Group STRING);

-- Trigger: Initialize Grades
CREATE TRIGGER "Initialize Grades" AFTER INSERT ON Grade BEGIN INSERT INTO ActiveDirectory (Grade_ID, Type) VALUES (new.ID, 'Staff'); INSERT INTO GoogleApps (Grade_ID, Type) VALUES (new.ID, 'Staff'); INSERT INTO ActiveDirectory (Grade_ID, Type) VALUES (new.ID, 'Student'); INSERT INTO GoogleApps (Grade_ID, Type) VALUES (new.ID, 'Student'); END;

-- Trigger: Initialize New Tables
CREATE TRIGGER "Initialize New Tables" BEFORE UPDATE ON App BEGIN INSERT INTO Auth (App_ID) SELECT (new.ID) WHERE NOT EXISTS(SELECT * FROM Auth WHERE App_ID = new.ID); INSERT INTO Email (App_ID) SELECT (new.ID) WHERE NOT EXISTS(SELECT * FROM Email WHERE App_ID = new.ID); END;

-- Trigger: Initialize School
CREATE TRIGGER "Initialize School" AFTER INSERT ON School BEGIN INSERT INTO ActiveDirectory (School_ID, Type) VALUES (new.ID, 'Staff'); INSERT INTO GoogleApps (School_ID, Type) VALUES (new.ID, 'Staff'); END;

-- Trigger: Initialize Team
CREATE TRIGGER "Initialize Team" AFTER INSERT ON Team BEGIN INSERT INTO ActiveDirectory (Team_ID, Type) VALUES (new.ID, 'Staff'); INSERT INTO GoogleApps (Team_ID, Type) VALUES (new.ID, 'Staff'); INSERT INTO ActiveDirectory (Team_ID, Type) VALUES (new.ID, 'Student'); INSERT INTO GoogleApps (Team_ID, Type) VALUES (new.ID, 'Student'); END;

-- Trigger: Initiialize District
CREATE TRIGGER "Initiialize District" AFTER INSERT ON District BEGIN INSERT INTO ActiveDirectory (District_ID, Type) VALUES (new.ID, 'Staff'); INSERT INTO GoogleApps (District_ID, Type) VALUES (new.ID, 'Staff'); END;

-- Trigger: Setup App
CREATE TRIGGER "Setup App" AFTER INSERT ON App BEGIN INSERT INTO Auth (App_ID) VALUES (New.ID); INSERT INTO Email (App_ID) VALUES (New.ID); END;

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
