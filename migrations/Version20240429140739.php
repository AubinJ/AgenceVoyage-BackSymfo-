<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240429140739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE av_voyage_av_categorie (av_voyage_id INT NOT NULL, av_categorie_id INT NOT NULL, INDEX IDX_51BC1EE1186A527C (av_voyage_id), INDEX IDX_51BC1EE1D761A619 (av_categorie_id), PRIMARY KEY(av_voyage_id, av_categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE av_voyage_av_categorie ADD CONSTRAINT FK_51BC1EE1186A527C FOREIGN KEY (av_voyage_id) REFERENCES av_voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE av_voyage_av_categorie ADD CONSTRAINT FK_51BC1EE1D761A619 FOREIGN KEY (av_categorie_id) REFERENCES av_categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE av_voyage_av_categorie DROP FOREIGN KEY FK_51BC1EE1186A527C');
        $this->addSql('ALTER TABLE av_voyage_av_categorie DROP FOREIGN KEY FK_51BC1EE1D761A619');
        $this->addSql('DROP TABLE av_voyage_av_categorie');
    }
}
