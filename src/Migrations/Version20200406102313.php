<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200406102313 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE laptimes (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, race_id_id INT NOT NULL, lap1 TIME DEFAULT NULL, lap2 TIME DEFAULT NULL, lap3 TIME DEFAULT NULL, total TIME DEFAULT NULL, finished VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1F70399C9D86650F (user_id_id), INDEX IDX_1F70399C997ABF46 (race_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE races (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, track VARCHAR(255) NOT NULL, time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE laptimes ADD CONSTRAINT FK_1F70399C9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE laptimes ADD CONSTRAINT FK_1F70399C997ABF46 FOREIGN KEY (race_id_id) REFERENCES races (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE laptimes DROP FOREIGN KEY FK_1F70399C997ABF46');
        $this->addSql('ALTER TABLE laptimes DROP FOREIGN KEY FK_1F70399C9D86650F');
        $this->addSql('DROP TABLE laptimes');
        $this->addSql('DROP TABLE races');
        $this->addSql('DROP TABLE user');
    }
}
