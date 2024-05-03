<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240429142719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE av_image (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE av_pays (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE av_reservation (id INT AUTO_INCREMENT NOT NULL, voyage_areservation_id INT DEFAULT NULL, av_reservation_statut_id INT DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel INT NOT NULL, message VARCHAR(255) DEFAULT NULL, INDEX IDX_BDD88905C083FD49 (voyage_areservation_id), INDEX IDX_BDD88905339A780 (av_reservation_statut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE av_reservation_statut (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE av_voyage_av_image (av_voyage_id INT NOT NULL, av_image_id INT NOT NULL, INDEX IDX_143CCA2F186A527C (av_voyage_id), INDEX IDX_143CCA2FF4E67968 (av_image_id), PRIMARY KEY(av_voyage_id, av_image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE av_reservation ADD CONSTRAINT FK_BDD88905C083FD49 FOREIGN KEY (voyage_areservation_id) REFERENCES av_voyage (id)');
        $this->addSql('ALTER TABLE av_reservation ADD CONSTRAINT FK_BDD88905339A780 FOREIGN KEY (av_reservation_statut_id) REFERENCES av_reservation_statut (id)');
        $this->addSql('ALTER TABLE av_voyage_av_image ADD CONSTRAINT FK_143CCA2F186A527C FOREIGN KEY (av_voyage_id) REFERENCES av_voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE av_voyage_av_image ADD CONSTRAINT FK_143CCA2FF4E67968 FOREIGN KEY (av_image_id) REFERENCES av_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE av_voyage ADD av_pays_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE av_voyage ADD CONSTRAINT FK_9CECA8F6E998C137 FOREIGN KEY (av_pays_id) REFERENCES av_pays (id)');
        $this->addSql('CREATE INDEX IDX_9CECA8F6E998C137 ON av_voyage (av_pays_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE av_voyage DROP FOREIGN KEY FK_9CECA8F6E998C137');
        $this->addSql('ALTER TABLE av_reservation DROP FOREIGN KEY FK_BDD88905C083FD49');
        $this->addSql('ALTER TABLE av_reservation DROP FOREIGN KEY FK_BDD88905339A780');
        $this->addSql('ALTER TABLE av_voyage_av_image DROP FOREIGN KEY FK_143CCA2F186A527C');
        $this->addSql('ALTER TABLE av_voyage_av_image DROP FOREIGN KEY FK_143CCA2FF4E67968');
        $this->addSql('DROP TABLE av_image');
        $this->addSql('DROP TABLE av_pays');
        $this->addSql('DROP TABLE av_reservation');
        $this->addSql('DROP TABLE av_reservation_statut');
        $this->addSql('DROP TABLE av_voyage_av_image');
        $this->addSql('DROP INDEX IDX_9CECA8F6E998C137 ON av_voyage');
        $this->addSql('ALTER TABLE av_voyage DROP av_pays_id');
    }
}
