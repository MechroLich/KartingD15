<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200415090143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE laptimes (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, races_id INT DEFAULT NULL, lap1 TIME DEFAULT NULL, lap2 TIME DEFAULT NULL, lap3 TIME DEFAULT NULL, total TIME DEFAULT NULL, finished VARCHAR(255) NOT NULL, INDEX IDX_1F70399CA76ED395 (user_id), INDEX IDX_1F70399C99AE984C (races_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE races (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, track VARCHAR(255) NOT NULL, time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, role VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE laptimes ADD CONSTRAINT FK_1F70399CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE laptimes ADD CONSTRAINT FK_1F70399C99AE984C FOREIGN KEY (races_id) REFERENCES races (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE laptimes DROP FOREIGN KEY FK_1F70399C99AE984C');
        $this->addSql('ALTER TABLE laptimes DROP FOREIGN KEY FK_1F70399CA76ED395');
        $this->addSql('DROP TABLE laptimes');
        $this->addSql('DROP TABLE races');
        $this->addSql('DROP TABLE user');
    }
}
