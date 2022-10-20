<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221020152057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, product_color VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, message_desc LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, note INT NOT NULL, review_desc LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, is_reviewed TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD image VARCHAR(255) NOT NULL, ADD size DOUBLE PRECISION NOT NULL, ADD state VARCHAR(2) NOT NULL, ADD brand VARCHAR(50) DEFAULT NULL, ADD is_sold TINYINT(1) NOT NULL, DROP picture, CHANGE title title VARCHAR(50) NOT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE creation_date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user ADD profile_picture VARCHAR(255) NOT NULL, ADD description VARCHAR(255) DEFAULT NULL, DROP picture, DROP rating_count, DROP rating_total, CHANGE password password VARCHAR(255) NOT NULL, CHANGE role role INT NOT NULL, CHANGE rating rating DOUBLE PRECISION DEFAULT NULL, CHANGE mail email VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE sales');
        $this->addSql('ALTER TABLE product ADD picture VARCHAR(500) NOT NULL, DROP image, DROP size, DROP state, DROP brand, DROP is_sold, CHANGE title title VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(500) NOT NULL, CHANGE date creation_date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user ADD mail VARCHAR(255) NOT NULL, ADD picture VARCHAR(500) DEFAULT NULL, ADD rating_count INT DEFAULT NULL, ADD rating_total INT DEFAULT NULL, DROP email, DROP profile_picture, DROP description, CHANGE password password VARCHAR(500) NOT NULL, CHANGE role role VARCHAR(25) NOT NULL, CHANGE rating rating INT DEFAULT NULL');
    }
}
