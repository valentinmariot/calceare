<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024093527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product ADD id_seller_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADDDD9CFE FOREIGN KEY (id_seller_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADDDD9CFE ON product (id_seller_id)');
        $this->addSql('ALTER TABLE sales ADD id_buyer_id INT NOT NULL, ADD id_seller_id INT NOT NULL');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B8170443CAEBBB7 FOREIGN KEY (id_buyer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B817044DDD9CFE FOREIGN KEY (id_seller_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_6B8170443CAEBBB7 ON sales (id_buyer_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6B817044DDD9CFE ON sales (id_seller_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADDDD9CFE');
        $this->addSql('DROP INDEX IDX_D34A04ADDDD9CFE ON product');
        $this->addSql('ALTER TABLE product DROP id_seller_id');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B8170443CAEBBB7');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B817044DDD9CFE');
        $this->addSql('DROP INDEX IDX_6B8170443CAEBBB7 ON sales');
        $this->addSql('DROP INDEX UNIQ_6B817044DDD9CFE ON sales');
        $this->addSql('ALTER TABLE sales DROP id_buyer_id, DROP id_seller_id');
    }
}
