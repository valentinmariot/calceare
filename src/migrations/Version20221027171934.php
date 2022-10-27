<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027171934 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sales ADD user_id INT DEFAULT NULL, ADD product_id INT NOT NULL');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B817044A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B8170444584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_6B817044A76ED395 ON sales (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6B8170444584665A ON sales (product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B817044A76ED395');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B8170444584665A');
        $this->addSql('DROP INDEX IDX_6B817044A76ED395 ON sales');
        $this->addSql('DROP INDEX UNIQ_6B8170444584665A ON sales');
        $this->addSql('ALTER TABLE sales DROP user_id, DROP product_id');
    }
}
