<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200811153532 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, tests_id INT DEFAULT NULL, val1 VARCHAR(255) NOT NULL, val2 VARCHAR(255) DEFAULT NULL, INDEX IDX_D87F7E0CF5D80971 (tests_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test2 (id INT AUTO_INCREMENT NOT NULL, val3 VARCHAR(255) NOT NULL, val4 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0CF5D80971 FOREIGN KEY (tests_id) REFERENCES test2 (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0CF5D80971');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE test2');
    }
}
