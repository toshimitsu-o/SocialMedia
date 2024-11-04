# Social Media Web App

This web application was originally developed for a university assignment, aiming to create the foundation for a social media platform. The project successfully implements key features required for the assignment using Laravel, PHP, and SQLite.

Developed: August 2023

## Screenshots
<img width="1073" alt="home" src="https://github.com/user-attachments/assets/c6ea048b-cdd9-4b41-8ebd-ed5da8a03ab2">
<img width="1073" alt="post" src="https://github.com/user-attachments/assets/14613eec-6208-41b5-8c5b-89bbce4e4190">
<img width="1073" alt="comments" src="https://github.com/user-attachments/assets/ec7b39a2-908f-4f74-b40b-0f1c4c12169b">
<img width="1073" alt="addPost" src="https://github.com/user-attachments/assets/ccf31bfa-175c-433c-aadb-b980169c079d">

## ER Diagram of SQLite Database
![ERdiagram](https://github.com/toshimitsu-o/SocialMedia/assets/89127228/440e37ad-b052-4080-bc35-6fa2f44a4fce)

## Tech Stack

- Laravel framework with Blade templates
- PHP
- SQLite database
- Tailwind CSS framework
- Git

## Key Features

### Navigation Bar
- A consistent navigation bar is displayed at the top of all pages using template inheritance, providing easy access to different sections of the application.
### Home Page
- Presents a list of posts with title, author, date, and the number of comments and likes.
- Posts are arranged in reverse chronological order.
- Each post links to a dedicated post details page.
### Post Details Page
- Displays detailed information about a post, including title, author, message, date, comments, and the number of likes.
- Users can add comments to posts or existing comments.
- Like functionality is available, allowing users to like or undo their likes.
- Edit and delete buttons are provided in the tool menu for post management.
### Comments
- Comments include author, message, and date information.
- Users can reply to a comment, and comments are displayed in layers for a structured view.
### Create Post
- A form with title, author, and message inputs is available on the home page.
- Input values are validated, and error messages are displayed if needed.
### Edit Post
- Users can edit post title and message.
- The date is automatically updated when a post is edited.
### Delete Post
- Posts can be deleted, and associated comments will also be removed.
### User List
- Displays a list of unique users who have posts.
- Provides links to a page that lists the posts of each user.
### Profile Page
- An additional page displaying the current username and ID.
- Includes a logout link to delete sessions for testing purposes.
### No JavaScript
- As a part of requirements, the app works without JavaScript including form validations (client and server) and modal UI elements.

## Project Reflection
The development followed the Agile methodology to iterate a cycle of developing components by testing to achieve a working product with improvements at every stage. The development was initiated by developing basic features prior to advanced features. As a new industry standard to achieve professional quality, Tailwind was used for CSS styling. For version control, Git was used. Changes were committed frequently for risks such as programming failures and data loss. The blade templates were organised by category and inheritance was used to improve the manageability and readability of the code. Everything went smoothly by following the course materials; however, the layered comments component was challenging. To achieve the layered comments, the app converts comment data to a nested array structure and the blade view utilises the data inheritance feature of the @include method that I found in Laravel documentation. The view includes two templates that are nested within each other to loop through replies until they exhaust. UI of this component reflects the structure of comments. Collapsible reply input is attached to each comment to deliver intuitive user experience. Achieving advanced UI such as modal, accordion, and tooltip without JavaScript was another challenge that I faced. It involved research, experimentation, and testing. I learned new CSS features and some limitations of CSS along the way. I have developed the app with all the requirements along with some extra features on time. Nonetheless, I want to improve my planning to include precise dates for each stage for better project management in the next assignment.
