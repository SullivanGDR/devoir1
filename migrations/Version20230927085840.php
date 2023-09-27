<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927085840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE borne (id INT AUTO_INCREMENT NOT NULL, type_charge_id INT NOT NULL, station_id INT NOT NULL, date_mise_en_service DATETIME NOT NULL, date_derniere_revision DATETIME NOT NULL, INDEX IDX_D7465BA5E1EE0804 (type_charge_id), INDEX IDX_D7465BA521BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, latitude VARCHAR(255) NOT NULL, longitude VARCHAR(255) NOT NULL, adresse_rue VARCHAR(255) NOT NULL, adresse_ville VARCHAR(255) NOT NULL, code_postal VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_charge (id INT AUTO_INCREMENT NOT NULL, libelle_type_charge VARCHAR(255) NOT NULL, puissance_type_charge VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE borne ADD CONSTRAINT FK_D7465BA5E1EE0804 FOREIGN KEY (type_charge_id) REFERENCES type_charge (id)');
        $this->addSql('ALTER TABLE borne ADD CONSTRAINT FK_D7465BA521BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE borne DROP FOREIGN KEY FK_D7465BA5E1EE0804');
        $this->addSql('ALTER TABLE borne DROP FOREIGN KEY FK_D7465BA521BDB235');
        $this->addSql('DROP TABLE borne');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE type_charge');
    }
}
