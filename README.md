# TrainingSystem
A web-based system which manages the activities for the internal training program of the company.
VMCuongOnGitHub has joined the fray

CREATE TABLE Admin(
   admninID  varchar(50) PRIMARY KEY,
   adminUsername varchar(50) NOT NULL,
   adminPassword  varchar(50)  NOT NULL
);
CREATE TABLE Staff(
   staffID  varchar(50) PRIMARY KEY,
   staffUsername varchar(50) NOT NULL,
	staffPassword varchar(50) NOT NULL,
   staffName  varchar(50)  NOT NULL,
   staffPhone  varchar(50)  NOT NULL
);
CREATE TABLE Trainee(
   traineeID  varchar(50) PRIMARY KEY,
   traineeUsername varchar(50) NOT NULL,
	traineePassword varchar(50) NOT NULL,
   traineeName  varchar(50)  NOT NULL,
   traineeAge  INTEGER  NOT NULL,
	traineeEducationalBG varchar(50) NOT NULL,
	TOEICScore  INTEGER  NOT NULL,
	trainerWorkingPlace varchar(50) NOT NULL
);
CREATE TABLE ProgrammingLanguage(
   programmingLanguageID  varchar(50) PRIMARY KEY,
	programmingLanguage varchar(50) NOT NULL
);
CREATE TABLE TraineeProgrammingLanguage(
   traineeProgrammingLanguage  varchar(50) PRIMARY KEY,
	programmingLanguageID varchar(50) NOT NULL,
	traineeID varchar(50) NOT NULL,
	FOREIGN KEY (programmingLanguageID) REFERENCES ProgrammingLanguage (programmingLanguageID),
	FOREIGN KEY (traineeID) REFERENCES Trainee (traineeID)
);
CREATE TABLE Category(
   categoryID  varchar(50) PRIMARY KEY,
	categoryName varchar(50) NOT NULL
);
CREATE TABLE Course(
   courseID  varchar(50) PRIMARY KEY,
	courseName varchar(50) NOT NULL,
	courseDesc varchar(50) NOT NULL,
	categoryID varchar(50) NOT NULL,
	FOREIGN KEY (categoryID) REFERENCES Category (categoryID)
);
CREATE TABLE Topic(
   topicID  varchar(50) PRIMARY KEY,
	topicName varchar(50) NOT NULL,
	topicDesc varchar(50) NOT NULL
);
CREATE TABLE EmploymentType(
   employmentTypeID  varchar(50) PRIMARY KEY,
	employmentType varchar(50) NOT NULL
);
CREATE TABLE Trainer(
   trainerID  varchar(50) PRIMARY KEY,
   trainerUsername varchar(50) NOT NULL,
	trainerPassword varchar(50) NOT NULL,
   trainerName  varchar(50)  NOT NULL,
	trainerPhone varchar(50) NOT NULL,
	trainerEmail varchar(50) NOT NULL,
	trainerEducationalBG varchar(50) NOT NULL,
	trainerWorkingPlace varchar(50) NOT NULL,
	employmentTypeID varchar(50) NOT NULL,
FOREIGN KEY (employmentTypeID) REFERENCES EmploymentType (employmentTypeID)
);
CREATE TABLE TopicCourse(
   topicCourseID  varchar(50) PRIMARY KEY,
	topicID varchar(50) NOT NULL,
	FOREIGN KEY (topicID) REFERENCES Topic (topicID),
	courseID varchar(50) NOT NULL,
	FOREIGN KEY (courseID) REFERENCES Course (courseID),
	staffID varchar(50) NOT NULL,
	FOREIGN KEY (staffID) REFERENCES Staff (staffID),
	trainerID varchar(50) NOT NULL,
	FOREIGN KEY (trainerID) REFERENCES Trainer (trainerID)
);
