<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615111207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C38454F0C34');
        $this->addSql('DROP INDEX IDX_46CD4C38454F0C34 ON objet');
        $this->addSql('ALTER TABLE objet CHANGE owne_id owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C387E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_46CD4C387E3C61F9 ON objet (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C387E3C61F9');
        $this->addSql('DROP INDEX IDX_46CD4C387E3C61F9 ON objet');
        $this->addSql('ALTER TABLE objet CHANGE owner_id owne_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C38454F0C34 FOREIGN KEY (owne_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_46CD4C38454F0C34 ON objet (owne_id)');
    }
}
