<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615091257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE objet (id INT AUTO_INCREMENT NOT NULL, categorie_id_id INT DEFAULT NULL, owner_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, is_available TINYINT(1) NOT NULL, INDEX IDX_46CD4C388A3C7387 (categorie_id_id), INDEX IDX_46CD4C388FDDAB70 (owner_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C388A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C388FDDAB70 FOREIGN KEY (owner_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE objet');
    }
}
