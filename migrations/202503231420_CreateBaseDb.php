<?php

use Phpmig\Migration\Migration;

class CreateBaseDb extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $container = $this->getContainer();
        /** @var \PDO $connection */
        $connection = $container['connection'];
        $connection->query(<<<SQL
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(253) NOT NULL UNIQUE,
    password VARCHAR(72) NOT NULL,
    is_active TINYINT DEFAULT 1
);
SQL
        );

        $connection->query(<<<SQL
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME NOT NULL,
    update_at DATETIME NOT NULL,
    publish_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);            
SQL
        );

        $encoder = new \App\Model\BcryptEncoder();
        $password = $encoder->encodePassword('password');
        $connection
            ->prepare('INSERT INTO users (email, password, is_active) VALUES (?, ?, ?)')
            ->execute(['sipiszoty@gmail.com', $password, true]);

        echo $password;
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $container = $this->getContainer();
        /** @var \PDO $connection */
        $connection = $container['connection'];
        $connection->query('DROP TABLE posts');
        $connection->query('DROP TABLE users');
    }
}