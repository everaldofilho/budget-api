<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405044255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, address VARCHAR(8) NOT NULL, district VARCHAR(30) NOT NULL, city VARCHAR(50) NOT NULL, state VARCHAR(2) NOT NULL, number INTEGER NOT NULL, complement VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D4E6F8119EB6921 ON address (client_id)');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, document VARCHAR(14) DEFAULT NULL)');
        $this->addSql('CREATE TABLE email (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, email VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_E7927C7419EB6921 ON email (client_id)');
        $this->addSql('CREATE TABLE phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, ddd INTEGER NOT NULL, number VARCHAR(9) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_444F97DD19EB6921 ON phone (client_id)');
        $this->addSql('CREATE TABLE visit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, address_id INTEGER DEFAULT NULL, objective CLOB NOT NULL, done CLOB NOT NULL, initiated DATETIME NOT NULL, finished DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_437EE93919EB6921 ON visit (client_id)');
        $this->addSql('CREATE INDEX IDX_437EE939F5B7AF75 ON visit (address_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE visit');
    }
}
