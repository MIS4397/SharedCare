CREATE TABLE Users (
         User_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         User_Email VARCHAR(50),
		 User_Password VARCHAR(15),
		 User_IsOrg bit
       );

CREATE TABLE Events (
         Event_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		 Event_Name varchar(25),
		 Event_OrgName varchar(50),
		 Event_Date date,
		 Event_DateAdded date,
		 Event_Description varchar(100),
		 Event_Type varchar(25),
		 Event_StartTime varchar(10),
		 Event_EndTime varchar(10),
		 Event_ContactName varchar(50),
		 Event_ContactPhone varchar(15),
		 Event_ContactEmail varchar(50),
		 Event_Location varchar(50),
		 Event_Comments varchar(50)		
       );

CREATE TABLE Organizations (
         Org_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         Org_Name varchar(50),
		 Org_Website varchar(50),
		 Org_Location varchar(50),
		 Org_ContactName varchar(50),
		 Org_ContactPhone varchar(15),
		 Org_ContactEmail varchar(50),
		 Org_Requirements varchar(100),
		 Org_Mission varchar(100),
		 Org_NumOfRatings int,
		 Org_RatingTotal int,
		 Org_UserEmail varchar(50),
		 Org_LeadCount int,
		 Org_Type varchar(25),
		 Org_JoinDate date
       );	   