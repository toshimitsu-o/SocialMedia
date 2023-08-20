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

INSERT INTO User VALUES (NULL, "UserA");
INSERT INTO User VALUES (NULL, "UserB");
INSERT INTO User VALUES (NULL, "UserC");

INSERT INTO Post VALUES (NULL, "Post Test A", 1, "Sample message for the post A.", "2023-08-18 10:00:00");
INSERT INTO Post VALUES (NULL, "Post Test B", 2, "Sample message for the post B.", "2023-08-19 12:00:00");

INSERT INTO Comment VALUES (NULL, 1, 2, "This is a test comment.", "2023-08-20 10:00:00", NULL);
INSERT INTO Comment VALUES (NULL, 1, 1, "This is a test reply to a comment.", "2023-08-21 14:00:00", 1);

INSERT INTO Like VALUES (1, 2);
INSERT INTO Like VALUES (1, 3);
INSERT INTO Like VALUES (2, 1);