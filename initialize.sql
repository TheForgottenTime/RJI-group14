CREATE TABLE User (
	User varchar(64) NOT NULL,
    Pass varchar(128) NOT NULL,
    PRIMARY KEY (User)
);

CREATE TABLE Photograph (
	Filepath varchar(260) NOT NULL,
    UserUploadedBy varchar(64) NOT NULL REFERENCES User(User),
    Ranking int NOT NULL,
    Apeture varchar(10),
    LightValue float,
    FieldOfView float,
    DepthOfField float,
    RedBalance float,
    BlueBalance float,
    Megapixels float,
    DateUploaded datetime DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO User VALUES ('albert', 'albertpassword!');
INSERT INTO User VALUES ('jack', 'jackpassword!');
INSERT INTO User VALUES ('eli', 'elipassword!');

INSERT INTO Photograph (Filepath, UserUploadedBy, Ranking, Apeture, LightValue, FieldOfView, DepthOfField, RedBalance, BlueBalance, Megapixels)
VALUES ('http://rji.augurlabs.io/Other_stuff/20170118_Shooting_EA/20170118_Shooting_EA_001.JPG', 
	'Albert', 1, 'f/16', 0.37, 0.11, 120, 0.87, 3.11, 120);
    
INSERT INTO Photograph (Filepath, UserUploadedBy, Ranking, Apeture, LightValue, FieldOfView, DepthOfField, RedBalance, BlueBalance, Megapixels)
VALUES ('http://rji.augurlabs.io/Other_stuff/20170118_Shooting_EA/20170118_Shooting_EA_002.JPG', 
	'Albert', 2, 'f/8', 0.31, 0.15, 120, 0.89, 3.11, 120);
    
INSERT INTO Photograph (Filepath, UserUploadedBy, Ranking, Apeture, LightValue, FieldOfView, DepthOfField, RedBalance, BlueBalance, Megapixels)
VALUES ('http://rji.augurlabs.io/Other_stuff/20170118_Shooting_EA/20170118_Shooting_EA_003.JPG', 
	'Eli', 3, 'f/8', 0.31, 0.15, 120, 0.89, 3.11, 120);
    
INSERT INTO Photograph (Filepath, UserUploadedBy, Ranking, Apeture, LightValue, FieldOfView, DepthOfField, RedBalance, BlueBalance, Megapixels)
VALUES ('http://rji.augurlabs.io/Other_stuff/20170118_Shooting_EA/20170118_Shooting_EA_002.JPG', 
	'Jack', 4, 'f/8', 0.31, 0.15, 120, 0.89, 3.11, 120);

SELECT FROM User WHERE User = "albert" AND Pass = "albertpassword!";
