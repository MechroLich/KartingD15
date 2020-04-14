<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200410101447 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE laptimes ADD lap1_id INT NOT NULL, DROP lap1');
        $this->addSql('ALTER TABLE laptimes ADD CONSTRAINT FK_1F70399C3A974639 FOREIGN KEY (lap1_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1F70399C3A974639 ON laptimes (lap1_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE laptimes DROP FOREIGN KEY FK_1F70399C3A974639');
        $this->addSql('DROP INDEX UNIQ_1F70399C3A974639 ON laptimes');
        $this->addSql('ALTER TABLE laptimes ADD lap1 TIME DEFAULT NULL, DROP lap1_id');
    }
}
