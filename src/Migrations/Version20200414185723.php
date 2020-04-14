<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200414185723 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE laptimes_user');
        $this->addSql('ALTER TABLE laptimes DROP FOREIGN KEY FK_1F70399C997ABF46');
        $this->addSql('DROP INDEX IDX_1F70399C997ABF46 ON laptimes');
        $this->addSql('ALTER TABLE laptimes CHANGE race_id_id user_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE laptimes ADD CONSTRAINT FK_1F70399C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1F70399C9D86650F ON laptimes (user_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE laptimes_user (laptimes_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_D0C8BDA6A76ED395 (user_id), INDEX IDX_D0C8BDA6CCC9783D (laptimes_id), PRIMARY KEY(laptimes_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE laptimes_user ADD CONSTRAINT FK_D0C8BDA6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE laptimes_user ADD CONSTRAINT FK_D0C8BDA6CCC9783D FOREIGN KEY (laptimes_id) REFERENCES laptimes (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE laptimes DROP FOREIGN KEY FK_1F70399C9D86650F');
        $this->addSql('DROP INDEX IDX_1F70399C9D86650F ON laptimes');
        $this->addSql('ALTER TABLE laptimes CHANGE user_id_id race_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE laptimes ADD CONSTRAINT FK_1F70399C997ABF46 FOREIGN KEY (race_id_id) REFERENCES races (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1F70399C997ABF46 ON laptimes (race_id_id)');
    }
}
