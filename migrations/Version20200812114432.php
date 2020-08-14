<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200812114432 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients_entreprises (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(255) NOT NULL, denomination VARCHAR(255) NOT NULL, ninea VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients_particuliers (id INT AUTO_INCREMENT NOT NULL, employeur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance VARCHAR(255) NOT NULL, cni VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, mail VARCHAR(255) DEFAULT NULL, profession VARCHAR(255) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, salaire VARCHAR(255) DEFAULT NULL, INDEX IDX_F5AA19115D7C53EC (employeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comptes (id INT AUTO_INCREMENT NOT NULL, clients_entreprises_id INT DEFAULT NULL, clients_particuliers_id INT DEFAULT NULL, type_compte VARCHAR(255) NOT NULL, numero_agence VARCHAR(255) NOT NULL, numero_compte INT NOT NULL, cle_rib INT NOT NULL, frais_ouverture INT DEFAULT NULL, _cni INT DEFAULT NULL, _ninea INT DEFAULT NULL, INDEX IDX_56735801B648B025 (clients_entreprises_id), INDEX IDX_56735801D6A6EF6C (clients_particuliers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employeur (id INT AUTO_INCREMENT NOT NULL, denomination VARCHAR(255) NOT NULL, raison_social VARCHAR(255) DEFAULT NULL, numero_identification VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients_particuliers ADD CONSTRAINT FK_F5AA19115D7C53EC FOREIGN KEY (employeur_id) REFERENCES employeur (id)');
        $this->addSql('ALTER TABLE comptes ADD CONSTRAINT FK_56735801B648B025 FOREIGN KEY (clients_entreprises_id) REFERENCES clients_entreprises (id)');
        $this->addSql('ALTER TABLE comptes ADD CONSTRAINT FK_56735801D6A6EF6C FOREIGN KEY (clients_particuliers_id) REFERENCES clients_particuliers (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comptes DROP FOREIGN KEY FK_56735801B648B025');
        $this->addSql('ALTER TABLE comptes DROP FOREIGN KEY FK_56735801D6A6EF6C');
        $this->addSql('ALTER TABLE clients_particuliers DROP FOREIGN KEY FK_F5AA19115D7C53EC');
        $this->addSql('DROP TABLE clients_entreprises');
        $this->addSql('DROP TABLE clients_particuliers');
        $this->addSql('DROP TABLE comptes');
        $this->addSql('DROP TABLE employeur');
    }
}
