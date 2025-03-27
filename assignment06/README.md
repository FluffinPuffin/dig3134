Overview
  You will modify Assignment 5 to include review commenting and XML syndication.

Specifications
Implementation
General
  Code is indented to show tag parent/child relationships.
  The root directory for this assignment should be ~/public_html/dig3134/assignment06
  The image directory for this assignment should be ~/public_html/dig3134/assignment06/img
  The location of your XML file for this assignment should be ~/public_html/dig3134/assignment06/reviews.xml
  All of your XHTML pages should be located in the root directory of the assignment.  Page names are detailed in the PHP spec below.
  Your pages should contain proper semantic formatting of content.
  All directories and filenames should contain no spaces or uppercase letters.
  All links need to be functional.
  All of your .php files need to have corresponding .txt files in the root directory.
   
HTML
  Web pages validate as HTML 5 (http://validator.w3.orgLinks to an external site.).
  
CSS
  The CSS directory for this assignment should be ~/public_html/dig3134/assignment06/css
  All styles must be documented in an external CSS file called styles.css and linked to the document using the <link> rule.
  All presentational HTML attributes should be replaced with CSS rules.
  Use classes and/or IDs where appropriate.
 

Database Spec
General
  Three tables should be used, and they should be named a6_users, a6_reviews, and a6_comments.
  a6_users and a6_reviews should follow the specs defined in Assignment 5
  a6_comments should contain the following fields:
  user_id
  review_id
  comment_id
  comment
  comment_creation_date
  INT should be used to store integers.
  VARCHAR should be used to store strings.
  DATETIME or TIMESTAMP should be used to store dates in the standard MySQL date format.
  Passwords should be encrypted in the database using MD5 encryption.
  One field in each table should be declared as a PRIMARY KEY.
  Any primary key fields should have the AUTO-INCREMENT attribute.
  NO fields can contain NULL values.
  
PHP Functional Spec + Content
General
  No global variables should be used.
  Your logic should check if variables/superglobal arrays exist before trying to access values stored inside.
  You should mix standard HTML and PHP wherever possible (as opposed to outputting all of your HTML with PHP echo statements).
  Login Page (login.php)
  This page should follow the specs defined in Assignment 5.
  Logout Page (logout.php)
  This page should follow the specs defined in Assignment 5.
  Admin Page (admin.php)
  This page should follow the specs defined in Assignment 5, except contain changes where noted
  “administrator”
  An additional column labeled Comments should be added to the administrator view of the Admin Page.  In each row, this column should contain a link labeled “View Comments” that directs the user to review.php.
  “reviewer”
  An additional column labeled Comments should be added to the reviewer view of the Admin Page.  In each row, this column should contain a link labeled “View Comments” that directs the user to review.php.
  Reviews Page (reviews.php)
  This page should contain an alphabetical listing (a-z) of available game reviews.  Each game review should be a clickable link that directs the user to review.php as described below.
  Review Page (review.php)
  Before anything is displayed, this page should check to see if the user is logged in
  If a user is not logged in, they should not have the ability to enter a comment on the currently selected review, although they will still see the review and any existing comments.
  If a user is logged in, they should have the ability to enter a comment on the currently selected review, and they will see the review and any existing comments.
  Comments should be organized in chronological order (earliest posted comment appears first).
  The comment entry form should appear below the last entered comment, and should only contain a single text input field and submit button.
  Once the comment is submitted, the user should be redirected back to reviews.php
  Delete page (delete.php)
  This page should follow the specs defined in Assignment 5.
  No users need the ability to delete comments.
  All pages should include links to reviews.php and admin.php
 

XML Feed Spec
General
  Your XML feed should be called reviews.xml
  In addition to storing the review in the database, every time a new game review is posted, the following information should be added to reviews.xml:
  Title – name_of_game_being_reviewed Review
  Link – permanent link to the game review via review.php
  Description – the text content of the game review
  For example:
  Super Mario Bros. 3
  http://server/path/review.php?review_id=4Links to an external site.
  Super Mario Bros. 3 is great!  I’ve never seen such great graphics from the NES!
  Here is an example RSS file in XML format
  example_reviews.xmlDownload example_reviews.xml
  Presentation
  The layout of the page is open to your creativity, but there should at least be an obvious visual divider between the content area and background areas, including but not limited to borders and background colors.
  Non-default font styles should be used.
  Any tables should include a <thead> and <tbody> section, and both sections should be styled.
  Content
  The content of the pages will come from the data in the database.  You should have at least 6 game reviews distributed across three reviewer-level users, and at least 12 comments distributed across three game reviews.
