<?php

namespace App\Model;

class Repository
{
    public function queryPublishedPosts(): array
    {
        $now = new \DateTime();
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare('SELECT p.id, u.email, p.title, p.update_at, p.publish_at FROM `posts` AS p LEFT JOIN `users` u ON p.user_id = u.id WHERE p.publish_at <= :now ORDER BY p.publish_at');
        $statement->bindValue('now', $now->format('Y-m-d H:i:s'));
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function queryPublishedPostById(int $id): array
    {
        $now = new \DateTime();
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare('SELECT p.id, u.email, p.title, p.content, p.update_at, p.publish_at FROM `posts` AS p LEFT JOIN `users` u ON p.user_id = u.id WHERE p.id = :id AND p.publish_at <= :now LIMIT 0, 1');
        $statement->bindValue('id', $id);
        $statement->bindValue('now', $now->format('Y-m-d H:i:s'));
        $statement->execute();

        return $this->getFirstRow($statement->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function queryUserByEmail(string $email): ?array
    {
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare('SELECT * FROM `users` WHERE `email` = :email LIMIT 0, 1');
        $statement->bindValue('email', $email);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return $this->getFirstRow($rows);
    }

    public function queryUserById(int $id): ?array
    {
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $statement->bindValue('id', $id);

        $statement->execute();

        return $this->getFirstRow($statement->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function queryUserChoiceOptions(): ?array
    {
        $connection = ConnectionProvider::getInstance()->getConnection();
        $statement = $connection->prepare("SELECT id, email FROM `users`");

        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return array_column($rows, 'email', 'id');
    }

    private function getFirstRow(array $rows): ?array
    {
        return !empty($rows)
            ? $rows[0]
            : null;
    }
}