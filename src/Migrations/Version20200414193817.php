<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200414193817 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE laptimes ADD race_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE laptimes ADD CONSTRAINT FK_1F70399C997ABF46 FOREIGN KEY (race_id_id) REFERENCES races (id)');
        $this->addSql('CREATE INDEX IDX_1F70399C997ABF46 ON laptimes (race_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE laptimes DROP FOREIGN KEY FK_1F70399C997ABF46');
        $this->addSql('DROP INDEX IDX_1F70399C997ABF46 ON laptimes');
        $this->addSql('ALTER TABLE laptimes DROP race_id_id');
    }
}
