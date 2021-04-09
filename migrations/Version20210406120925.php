<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406120925 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, street VARCHAR(8) NOT NULL, district VARCHAR(30) NOT NULL, city VARCHAR(50) NOT NULL, state VARCHAR(2) NOT NULL, number INTEGER NOT NULL, complement VARCHAR(50) NOT NULL, main BOOLEAN NOT NULL, alias VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D4E6F8119EB6921 ON address (client_id)');
        $this->addSql('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, document VARCHAR(14) DEFAULT NULL, alias VARCHAR(100) NOT NULL, type SMALLINT NOT NULL)');
        $this->addSql('CREATE TABLE email (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, email VARCHAR(100) NOT NULL, main BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_E7927C7419EB6921 ON email (client_id)');
        $this->addSql('CREATE TABLE "order" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, address_id INTEGER DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, description CLOB DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_F529939819EB6921 ON "order" (client_id)');
        $this->addSql('CREATE INDEX IDX_F5299398F5B7AF75 ON "order" (address_id)');
        $this->addSql('CREATE TABLE order_product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, order_id INTEGER NOT NULL, expense NUMERIC(10, 2) NOT NULL, price NUMERIC(10, 2) NOT NULL, quantity NUMERIC(9, 3) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2530ADE68D9F6D38 ON order_product (order_id)');
        $this->addSql('CREATE TABLE order_status (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, type_id INTEGER NOT NULL, description VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_B88F75C9C54C8C93 ON order_status (type_id)');
        $this->addSql('CREATE TABLE order_status_type (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, ddd INTEGER NOT NULL, number VARCHAR(9) NOT NULL, main BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_444F97DD19EB6921 ON phone (client_id)');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER NOT NULL, name VARCHAR(150) NOT NULL, description CLOB NOT NULL, image VARCHAR(255) NOT NULL, expense NUMERIC(10, 2) NOT NULL, price NUMERIC(10, 2) NOT NULL, stock NUMERIC(9, 3) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
        $this->addSql('CREATE TABLE visit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER NOT NULL, address_id INTEGER DEFAULT NULL, objective CLOB NOT NULL, done CLOB NOT NULL, initiated DATETIME NOT NULL, finished DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_437EE93919EB6921 ON visit (client_id)');
        $this->addSql('CREATE INDEX IDX_437EE939F5B7AF75 ON visit (address_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE order_product');
        $this->addSql('DROP TABLE order_status');
        $this->addSql('DROP TABLE order_status_type');
        $this->addSql('DROP TABLE phone');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE visit');
    }
}
