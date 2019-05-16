# RJI Group 14

### Link
[ec2 server](http://ec2-18-216-214-86.us-east-2.compute.amazonaws.com/)

### Credentials

User: guest

Pass: guest!

### DDL
```SQL
CREATE TABLE Photograph (
    Filepath varchar(256) NOT NULL,
    UserUploadedBy varchar(256) NOT NULL REFERENCES User(User),
    Rating int NOT NULL,
    Keep boolean DEFAULT TRUE,
    Category varchar(256) DEFAULT 'N/A',
    PRIMARY KEY(Filepath)
);
CREATE TABLE User (
  User varchar(256) NOT NULL,
  Password varchar(256) NOT NULL,
  PRIMARY KEY(User)
);
```

### Info
Images hosted at [augurlabs.io](http://rji.augurlabs.io). When a directory is submitted all photos have their filepaths sent to our machine learning API and are rated. The filepath, rating, and keep tag are then uploaded to our Photos table. Photos can be searched, with selectable attributes being max rating, min rating, and keep tags. Finially, all photos marked to be deleted can be removed from the database.
