<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230927090906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modele_batterie_type_charge (modele_batterie_id INT NOT NULL, type_charge_id INT NOT NULL, INDEX IDX_3116261B8CB8A8D2 (modele_batterie_id), INDEX IDX_3116261BE1EE0804 (type_charge_id), PRIMARY KEY(modele_batterie_id, type_charge_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE modele_batterie_type_charge ADD CONSTRAINT FK_3116261B8CB8A8D2 FOREIGN KEY (modele_batterie_id) REFERENCES modele_batterie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modele_batterie_type_charge ADD CONSTRAINT FK_3116261BE1EE0804 FOREIGN KEY (type_charge_id) REFERENCES type_charge (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE modele_batterie_modele_batterie DROP FOREIGN KEY FK_2BD3F24B1F6118A2');
        $this->addSql('ALTER TABLE modele_batterie_modele_batterie DROP FOREIGN KEY FK_2BD3F24B684482D');
        $this->addSql('ALTER TABLE modele_batterie_type_charge DROP FOREIGN KEY FK_3116261B8CB8A8D2');
        $this->addSql('ALTER TABLE modele_batterie_type_charge DROP FOREIGN KEY FK_3116261BE1EE0804');
        $this->addSql('DROP TABLE modele_batterie_modele_batterie');
        $this->addSql('DROP TABLE modele_batterie_type_charge');
    }
}
