-- Enable foreign key
PRAGMA foreign_keys = ON;

-- Creation of tables
DROP TABLE IF EXISTS Like;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS User;

CREATE TABLE User (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE Post (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(120) NOT NULL,
    author INTEGER NOT NULL REFERENCES User(id),
    message TEXT NOT NULL,
    date TIMESTAMP
);

CREATE TABLE Comment (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    postId TINTEGER NOT NULL REFERENCES Post(id),
    author INTEGER NOT NULL REFERENCES User(id),
    message TEXT NOT NULL,
    date TIMESTAMP,
    replyTo INTEGER REFERENCES Comment(id)
);

CREATE TABLE Like (
    postId INTEGER NOT NULL REFERENCES Post(id),
    user INTEGER NOT NULL REFERENCES User(id)
);

-- Inserting sample data

INSERT INTO User VALUES(1,'Ethan');
INSERT INTO User VALUES(2,'Benjamin');
INSERT INTO User VALUES(3,'Henry');
INSERT INTO User VALUES(4,'Mia');
INSERT INTO User VALUES(5,'Matthew');
INSERT INTO User VALUES(6,'Isabella');
INSERT INTO User VALUES(7,'Emma');
INSERT INTO User VALUES(8,'Chloe');
INSERT INTO User VALUES(9,'Olivia');
INSERT INTO User VALUES(10,'James');
INSERT INTO User VALUES(11,'Michael');
INSERT INTO User VALUES(12,'Peppa');
INSERT INTO User VALUES(13,'Alexander');
INSERT INTO User VALUES(14,'Grace');
INSERT INTO User VALUES(27,'s');

INSERT INTO Post VALUES(1,'The Ultimate Guide to Sustainable Living: 10 Easy Steps',1,'Want to live a more eco-friendly lifestyle? Start by reducing waste, conserving energy, and making mindful choices. From reusable water bottles to composting, every little bit helps!','2023-08-18 10:00:00');
INSERT INTO Post VALUES(2,'Why Mindfulness Matters: A Deep Dive into Mental Health',2,'Mindfulness isn''t just a buzzword; it''s a life-changing practice. Learn how being present can improve your mental health, reduce stress, and increase happiness.','2023-08-19 12:00:00');
INSERT INTO Post VALUES(3,'The Future of Electric Cars: What You Need to Know',5,'Electric cars are no longer a thing of the future. With advancements in battery technology and increasing infrastructure, it''s easier than ever to make the switch.','2023-08-23 10:40:36');
INSERT INTO Post VALUES(4,'5 Must-Visit Hidden Gems for Your Next Vacation',6,'Tired of tourist traps? Explore these off-the-beaten-path destinations for a unique and unforgettable travel experience.','2023-08-23 10:52:38');
INSERT INTO Post VALUES(5,'Unlocking the Secrets of a Perfect Cup of Coffee',6,'From choosing the right beans to mastering the brew, discover the art and science behind making the perfect cup of coffee.','2023-08-23 10:52:56');
INSERT INTO Post VALUES(6,'How to Boost Your Productivity with These Simple Hacks',7,'Struggling to stay focused? Try these productivity hacks to streamline your day and get more done in less time.','2023-08-23 10:59:19');
INSERT INTO Post VALUES(7,'The Top 10 Books Everyone Should Read in 2023',7,'Looking for your next great read? Check out our curated list of must-read books for 2023, ranging from gripping thrillers to enlightening non-fiction.','2023-08-23 11:05:21');
INSERT INTO Post VALUES(8,'Navigating the World of Online Dating: Dos and Don''ts',7,'New to online dating? Here are some tips and tricks to help you find love in the digital age.','2023-08-23 11:06:47');
INSERT INTO Post VALUES(12,'The Science of Happiness: What Really Makes Us Content',8,'What is the key to happiness? Is it money, love, or something else? Dive into the psychology behind what truly makes us happy.','2023-08-24 10:53:59');
INSERT INTO Post VALUES(13,'Fashion Trends for the Upcoming Season',9,'Get ready to turn heads with the latest fashion trends. From bold prints to classic cuts, find out what''s hot this season.','2023-08-25 08:12:58');
INSERT INTO Post VALUES(14,'Exploring the Benefits of a Plant-Based Diet',9,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2023-09-02 07:14:32');
INSERT INTO Post VALUES(15,'Unleash your inner foodie in Italy 🍝🍷',9,replace(replace('Italy is known for its delicious food and wine, from classic pasta dishes to regional specialties like arancini and risotto alla milanese. Follow our guide to the best Italian cuisine and experience the taste of la dolce vita. \r\n\r\nWhat''s your favorite Italian dish? Share with me in the comments below!','\r',char(13)),'\n',char(10)),'2023-09-06 10:25:18');

INSERT INTO Comment VALUES(1,1,2,'Wow, this is eye-opening! I never thought about it that way before.','2023-08-20 10:00:00',NULL);
INSERT INTO Comment VALUES(2,1,1,'Great article! I''ve been doing some of these things, but there''s always room for improvement.','2023-08-21 14:00:00',1);
INSERT INTO Comment VALUES(3,12,8,'I totally disagree with your point about electric cars. The infrastructure just isn''t there yet.','2023-08-24 09:48:42',NULL);
INSERT INTO Comment VALUES(4,12,8,'This post is a lifesaver! I''ve been struggling with productivity for ages.','2023-08-24 09:49:23',NULL);
INSERT INTO Comment VALUES(8,13,10,'Anyone else tried going plant-based? Would love some recipe recommendations!','2023-08-26 07:43:23',NULL);
INSERT INTO Comment VALUES(9,1,11,'I think you missed some key books in your list for 2023. ','2023-08-27 02:53:46',NULL);
INSERT INTO Comment VALUES(10,12,14,'Mindfulness has been a game-changer for me. Can''t recommend it enough','2023-08-29 02:52:55',NULL);
INSERT INTO Comment VALUES(11,12,14,'I visited one of those hidden gems last year, and it was amazing! Highly recommend.','2023-08-29 02:53:29',3);
INSERT INTO Comment VALUES(12,12,14,'Fashion trends come and go, but style is eternal. 😉','2023-08-29 06:16:57',NULL);
INSERT INTO Comment VALUES(13,12,14,'This is such a timely post! I''ve been researching this topic lately.','2023-08-29 06:17:57',NULL);
INSERT INTO Comment VALUES(14,12,14,'I''m skeptical about some of these points. Do you have any sources to back them up?','2023-08-29 06:19:02',3);
INSERT INTO Comment VALUES(15,12,14,'Your tips on sustainable living are spot-on! Just shared this with my friends.','2023-08-29 06:19:53',4);
INSERT INTO Comment VALUES(16,12,14,'I''ve been to that vacation spot, and it''s overrated. Maybe it was better a few years ago?','2023-08-29 07:25:07',15);
INSERT INTO Comment VALUES(17,12,14,'Coffee is life! Thanks for sharing these brewing tips','2023-08-29 07:25:28',16);
INSERT INTO Comment VALUES(18,12,14,'I''ve tried online dating and it''s a minefield. Good to know I''m not the only one struggling.','2023-08-29 07:27:57',15);
INSERT INTO Comment VALUES(19,12,14,'Happiness is so subjective, but it''s interesting to see the science behind it.','2023-08-29 07:28:44',15);
INSERT INTO Comment VALUES(20,13,14,'I''ve been following this fashion trend and I love it! Thanks for the style inspiration.','2023-08-29 08:03:53',NULL);
INSERT INTO Comment VALUES(21,13,14,'Plant-based diets aren''t for everyone. It''s important to consult a healthcare provider.','2023-08-29 08:04:56',20);
INSERT INTO Comment VALUES(22,12,14,'What a great post! Thank you so much for sharing!','2023-08-29 08:15:02',11);
INSERT INTO Comment VALUES(24,13,1,'Great post! Thanks so much!!!','2023-09-04 10:25:50',NULL);

INSERT INTO "Like" VALUES(1,2);
INSERT INTO "Like" VALUES(1,3);
INSERT INTO "Like" VALUES(2,1);
INSERT INTO "Like" VALUES(8,11);
INSERT INTO "Like" VALUES(7,12);
INSERT INTO "Like" VALUES(5,12);
INSERT INTO "Like" VALUES(12,12);
INSERT INTO "Like" VALUES(12,13);
INSERT INTO "Like" VALUES(7,9);
INSERT INTO "Like" VALUES(4,9);
INSERT INTO "Like" VALUES(15,12);
INSERT INTO "Like" VALUES(3,12);
INSERT INTO "Like" VALUES(15,1);
INSERT INTO "Like" VALUES(14,1);