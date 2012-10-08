CREATE TABLE Users (
         User_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         User_Email VARCHAR(50),
		 User_Password VARCHAR(15)
       );

CREATE TABLE Events (
         Event_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         Event_Type VARCHAR(50),
		 Event_Name varchar(25),
		 Event_Date date,
		 Event_Time varchar(10)
		 Event_Description varchar(100),
		 Event_Contact_Info varchar(50)		
       );

CREATE TABLE Organizations (
         Org_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
         Org_Name varchar(50),
		 Org_Website varchar(100),
		 Org_Requirements varchar(100),
		 Org_Mission varchar(100),
		 Org_Num_Of_Ratings int,
		 Org_Rating_Total int,
		 Org_Description varchar(100),
		 Org_Contact_Info varchar(50)		
       );	   