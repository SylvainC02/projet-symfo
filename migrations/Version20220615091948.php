<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615091948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, objet_id_id INT DEFAULT NULL, borrower_id_id INT DEFAULT NULL, starting_date DATE NOT NULL, ending_date DATE NOT NULL, INDEX IDX_42C84955706685EA (objet_id_id), INDEX IDX_42C84955E8D88425 (borrower_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955706685EA FOREIGN KEY (objet_id_id) REFERENCES objet (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E8D88425 FOREIGN KEY (borrower_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE reservation');
    }
}
