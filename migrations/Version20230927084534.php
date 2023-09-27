<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927084534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contrat (id INT AUTO_INCREMENT NOT NULL, usager_id INT NOT NULL, modele_batterie_id INT NOT NULL, date_contrat DATETIME NOT NULL, no_immatriculation VARCHAR(255) NOT NULL, INDEX IDX_603499934F36F0FC (usager_id), INDEX IDX_603499938CB8A8D2 (modele_batterie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499934F36F0FC FOREIGN KEY (usager_id) REFERENCES usager (id)');
        $this->addSql('ALTER TABLE contrat ADD CONSTRAINT FK_603499938CB8A8D2 FOREIGN KEY (modele_batterie_id) REFERENCES modele_batterie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499934F36F0FC');
        $this->addSql('ALTER TABLE contrat DROP FOREIGN KEY FK_603499938CB8A8D2');
        $this->addSql('DROP TABLE contrat');
    }
}
