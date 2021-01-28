DROP DATABASE IF EXISTS tasklist;

CREATE DATABASE IF NOT EXISTS tasklist;

USE tasklist;

/* Creamos tabla usuarios */

CREATE TABLE users (
    id_user INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id_user),
    pass CHAR (32) NOT NULL,
    username VARCHAR (15) NOT NULL
);

/* Creamos tabla tareas */

CREATE TABLE tasks (
    id_task INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (id_task),
    category ENUM ('Active', 'Completed'),
    task TEXT,
    id_user INT NOT NULL,
    FULLTEXT KEY search(task),

    FOREIGN KEY (id_user) REFERENCES users (id_user) ON DELETE RESTRICT ON UPDATE CASCADE    

);

/* Inner Join */
/* "select t1.id_task, t1.task, t1.category, t2.username FROM tasks AS t1 INNER JOIN users AS t2 ON t1.id_user = t2.id_user WHERE t2.username = '@keyzen'" */

