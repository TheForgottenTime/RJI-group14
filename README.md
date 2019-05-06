# RJI
## Abbreviated version of Sprint 2 Wiki.pdf

### Deployment Environment
Web Server:
ec2-18-216-214-86.us-east-2.compute.amazonaws.com

Login Credentials:

	Username: guest
  
	Password: guest!

### Functional Requirements
* Submit Photographs
  * User must be able to select files to upload
  * Uploaded files must be ranked by the machine learning algorithm and have relevant information uploaded to the database
* Search
  * User must be able to input SQL queries into the database and have results returned
  * The image, rating, and whether or not the image will be kept must be displayed
* Delete Photographs
  * User must be able to mark photos they want to delete, indicated by a red border around an image
  * User must be able to mark photos they want to keep, indicated by a blue border around an image
  * Clicking a photo changes whether or not it is marked for deletion
  * Photographs marked by the user to be deleted must be deleted
* Login
  * User must be able to login into the system when correct credentials are provided
  * User must not be able to access site content when not logged in.

### Database Design
```
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
