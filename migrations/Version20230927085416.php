<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927085416 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operation_rechargement (id INT AUTO_INCREMENT NOT NULL, contrat_id INT NOT NULL, date_heure_debut DATETIME NOT NULL, date_heure_fin DATETIME NOT NULL, nb_kw_heures VARCHAR(255) NOT NULL, INDEX IDX_AE04855C1823061F (contrat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operation_rechargement ADD CONSTRAINT FK_AE04855C1823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation_rechargement DROP FOREIGN KEY FK_AE04855C1823061F');
        $this->addSql('DROP TABLE operation_rechargement');
    }
}
