<?php

class Koneksi
{
    /**
     * @var PDO $pdo
     */
    private $pdo;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->pdo = new PDO(
            'mysql:host=localhost',
            'stackoverflow',
            'stackoverflow'
        );

        $this->init();
    }

    /**
     * {@inheritdoc}
     */
    private function init()
    {
        $this->pdo
            ->exec('CREATE DATABASE IF NOT EXISTS stackoverflow_44346949');
        $this->pdo->query('use stackoverflow_44346949');
        $this->pdo->exec('CREATE TABLE IF NOT EXISTS files (
            file VARCHAR(255) NOT NULL,
            path VARCHAR(255) NOT NULL,
            type VARCHAR(255) NOT NULL
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * Simply placeholder
     *
     * @param string $sql
     *
     * @return bool Query status.
     */
    public function query($sql)
    {
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute();
    }

    /**
     * Placeholder
     */
    public function close()
    {
    }
}

$connect = new Koneksi();
