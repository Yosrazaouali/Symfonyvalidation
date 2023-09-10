<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230909204234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formationn (id INT AUTO_INCREMENT NOT NULL, id_formateur_id INT DEFAULT NULL, date_for DATE NOT NULL, nom_for VARCHAR(255) NOT NULL, numbr_max_per INT NOT NULL, INDEX IDX_23964DEE369CFA23 (id_formateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formationn ADD CONSTRAINT FK_23964DEE369CFA23 FOREIGN KEY (id_formateur_id) REFERENCES formateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formationn DROP FOREIGN KEY FK_23964DEE369CFA23');
        $this->addSql('DROP TABLE formationn');
    }
}
