
DROP TABLE IF EXISTS users;
CREATE TABLE users(
        email VARCHAR(64) NOT NULL PRIMARY KEY,
        password VARCHAR(64) NOT NULL,
        username VARCHAR(16) NOT NULL
);

DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
        id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
        languages VARCHAR(64) NOT NULL
);

DROP TABLE IF EXISTS user_know;
CREATE TABLE user_know(
        user_id INTEGER NOT NULL,
        language_id INTEGER NOT NULL
);

DROP TABLE IF EXISTS user_seeking;
CREATE TABLE user_seeking(
        user_id INTEGER NOT NULL,
        language_id INTEGER NOT NULL
);

