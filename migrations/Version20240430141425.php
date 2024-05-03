<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430141425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE av_role (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE av_voyage ADD utilisateur_gere_voyage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE av_voyage ADD CONSTRAINT FK_9CECA8F67C803EB FOREIGN KEY (utilisateur_gere_voyage_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_9CECA8F67C803EB ON av_voyage (utilisateur_gere_voyage_id)');
        $this->addSql('ALTER TABLE utilisateur ADD av_role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3997FA1DF FOREIGN KEY (av_role_id) REFERENCES av_role (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3997FA1DF ON utilisateur (av_role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3997FA1DF');
        $this->addSql('DROP TABLE av_role');
        $this->addSql('DROP INDEX IDX_1D1C63B3997FA1DF ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP av_role_id');
        $this->addSql('ALTER TABLE av_voyage DROP FOREIGN KEY FK_9CECA8F67C803EB');
        $this->addSql('DROP INDEX IDX_9CECA8F67C803EB ON av_voyage');
        $this->addSql('ALTER TABLE av_voyage DROP utilisateur_gere_voyage_id');
    }
}
