<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200421095913 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE concours (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_concours DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_musique (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_287AB1F2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, groupe_musique_id INT DEFAULT NULL, concours_id INT DEFAULT NULL, date_inscription DATE NOT NULL, INDEX IDX_5E90F6D69D0F657D (groupe_musique_id), INDEX IDX_5E90F6D6D11E3C7 (concours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groupe_musique ADD CONSTRAINT FK_287AB1F2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D69D0F657D FOREIGN KEY (groupe_musique_id) REFERENCES groupe_musique (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6D11E3C7 FOREIGN KEY (concours_id) REFERENCES concours (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6D11E3C7');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D69D0F657D');
        $this->addSql('DROP TABLE concours');
        $this->addSql('DROP TABLE groupe_musique');
        $this->addSql('DROP TABLE inscription');
    }
}
