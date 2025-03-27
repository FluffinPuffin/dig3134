Overview
  You will design a simple CMS backend for a fictional video game, movie, or music review site.  [I will use a "Game CMS" as the example within specifications, but you can choose the media of your choice.] The CMS will have multiple user access levels and allow for inserting, deleting, and displaying reviews.

Specifications
Implementation
General

  Code is indented to show tag parent/child relationships.
  The root directory for this assignment should be ~/public_html/dig3134/assignment05.
  The image directory for this assignment should be ~/public_html/dig3134/assignment05/img.
  All of your HTML 5 pages should be located in the root directory of the assignment.  Page names are detailed in the PHP spec below.
  Your pages should contain proper semantic formatting of content.
  All directories and filenames should contain no spaces or uppercase letters.
  All links need to be functional.
  All of your .php files need to have corresponding .phps files in the root directory.
   

HTML 5
  Web pages validate as HTML 5 (http://validator.w3.orgLinks to an external site.).

CSS
  The CSS directory for this assignment should be ~/public_html/dig3134/assignment05/css.
  All styles must be documented in an external CSS file called styles.css and linked to the document using the @import url rule.
  All presentational HTML attributes should be replaced with CSS rules.
  Use classes and/or id’s where appropriate.
   

Database Spec
General

  Two tables should be used, and they should be named a5_users and a5_reviews.
  a5_users should contain the following fields:
  user_id
  username
  password
  first_name
  last_name
  access_level
  o a5_reviews should contain the following fields:
  review_id
  review_creation_date
  game_name
  game_review
  game_rating
  game_image_url
  user_id
  INT should be used to store integers.
  VARCHAR should be used to store strings.
  DATETIME or TIMESTAMP should be used to store dates in the standard MySQL date format.
  Passwords should be encrypted in the database using MD5 encryption.
  One field in each table should be declared as a PRIMARY KEY.
  Any primary key fields should have the AUTO INCREMENT attribute.
  NO fields can contain NULL values.

PHP Functional Spec + Content
General

  No global variables should be used.
  Your logic should check if variables/superglobal arrays exist before trying to access values stored inside.
  You should mix standard HTML 5 and PHP wherever possible (as opposed to outputting all of your HTML with PHP echo statements).
  Login Page (login.php)
  
  This page should contain a single form that prompts the user to enter their username and password before hitting the Submit button.
  Upon successful login, session variables should be created for the logged in users’ full name (first and last), and that name should be displayed in either the header or footer of admin.php.
  Upon successful login, the user should be automatically re-directed to admin.php.
  Logout Page (logout.php)
  
  This page does not have to display anything.
  All session variables should be unset.
  Upon successful logout, the user should be automatically re-directed to login.php.

Admin Page (admin.php)

  Before anything is displayed, this page should check to see if the user is logged in, and then it should check to see if the logged in user has an access level of “administrator” or “reviewer”
  “administrator”
  This user should be shown a table with the following column names and content:
  Game Name – contains the user-submitted name of the game (string)
  Game Review – contains the user-submitted review of the game (string)
  Game Rating – contains the user-submitted rating of the game (1-10)
  Game Image – contains an <img /> tag that is generated using the data in game_image_url for the src attribute and data in game_name for the alt attribute
  Review Creation Date – contains the date the review was submitted in the format October 31, 2009 2:53pm
  Delete Row – contains a link or icon to delete the selected row from the database.  When this is clicked, the user should be redirected to delete.php
  All database records should be shown to this user
  “reviewer”
  This user should be shown a table with the following column names and content:
  Game Name – contains the user-submitted name of the game (string)
  Game Review – contains the user-submitted review of the game (string)
  Game Rating – contains the user-submitted rating of the game (1-10)
  Game Image – contains an <img /> tag that is generated using the data in game_image_url for the src attribute and data in game_name for the alt attribute
  Review Creation Date – contains the date the review was submitted in the format October 31, 2009 (no time)
  Only the currently logged-in user’s existing reviews should be shown to this user.
  A form should be shown below the database output table that prompts this user to enter a new game review.  The user should be prompted to enter the game name, game review, game rating, and game imageurl.
  Once the user hits submit:
  If no fields are blank, the review should be inserted in the database and the user should be taken to the admin page again
  o If the user leaves a field blank, no data should be inserted into the database and a message should appear that instructs them to re-enter their data.

Delete page (delete.php)

  If an administrator level user tries to delete a row from the admin page, they should be taken to this page
  The page should display the row of data that the administrator user requested for deletion, along with a message that asks them to confirm the row for deletion
  If the user hits “Yes”, the row should be deleted from the database and the user should be returned to admin.php.
  If the user hits “No”, the row should not be deleted from the database and the user should be returned to admin.php.
 
Presentation
  The layout of the page is open to your creativity, but there should at least be an obvious visual divider between the content area and background areas, including but not limited to borders and background colors.
  Non-default font styles should be used.
  Any tables should include a <thead> and <tbody> section, and both sections should be styled.
Content
  The content of the pages will come from the data in the database.  You should have at least 6 game reviews distributed across three reviewer-level users.

Access
  If these usernames and passwords are not used I will not be able to grade any part of the assignment that involves login!
  Reviewer username and password: review
  Administrator username and password: admin
