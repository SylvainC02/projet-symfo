<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615111419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C388A3C7387');
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C388FDDAB70');
        $this->addSql('DROP INDEX IDX_46CD4C388A3C7387 ON objet');
        $this->addSql('DROP INDEX IDX_46CD4C388FDDAB70 ON objet');
        $this->addSql('ALTER TABLE objet ADD categorie_id INT DEFAULT NULL, ADD owner_id INT DEFAULT NULL, DROP categorie_id_id, DROP owner_id_id');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C38BCF5E72D FOREIGN KEY (categorie_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C387E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_46CD4C38BCF5E72D ON objet (categorie_id)');
        $this->addSql('CREATE INDEX IDX_46CD4C387E3C61F9 ON objet (owner_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955706685EA');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E8D88425');
        $this->addSql('DROP INDEX IDX_42C84955706685EA ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955E8D88425 ON reservation');
        $this->addSql('ALTER TABLE reservation ADD objet_id INT DEFAULT NULL, ADD borrower_id INT DEFAULT NULL, DROP objet_id_id, DROP borrower_id_id');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955F520CF5A FOREIGN KEY (objet_id) REFERENCES objet (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495511CE312B FOREIGN KEY (borrower_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_42C84955F520CF5A ON reservation (objet_id)');
        $this->addSql('CREATE INDEX IDX_42C8495511CE312B ON reservation (borrower_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C38BCF5E72D');
        $this->addSql('ALTER TABLE objet DROP FOREIGN KEY FK_46CD4C387E3C61F9');
        $this->addSql('DROP INDEX IDX_46CD4C38BCF5E72D ON objet');
        $this->addSql('DROP INDEX IDX_46CD4C387E3C61F9 ON objet');
        $this->addSql('ALTER TABLE objet ADD categorie_id_id INT DEFAULT NULL, ADD owner_id_id INT DEFAULT NULL, DROP categorie_id, DROP owner_id');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C388A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE objet ADD CONSTRAINT FK_46CD4C388FDDAB70 FOREIGN KEY (owner_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_46CD4C388A3C7387 ON objet (categorie_id_id)');
        $this->addSql('CREATE INDEX IDX_46CD4C388FDDAB70 ON objet (owner_id_id)');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955F520CF5A');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495511CE312B');
        $this->addSql('DROP INDEX IDX_42C84955F520CF5A ON reservation');
        $this->addSql('DROP INDEX IDX_42C8495511CE312B ON reservation');
        $this->addSql('ALTER TABLE reservation ADD objet_id_id INT DEFAULT NULL, ADD borrower_id_id INT DEFAULT NULL, DROP objet_id, DROP borrower_id');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955706685EA FOREIGN KEY (objet_id_id) REFERENCES objet (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E8D88425 FOREIGN KEY (borrower_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_42C84955706685EA ON reservation (objet_id_id)');
        $this->addSql('CREATE INDEX IDX_42C84955E8D88425 ON reservation (borrower_id_id)');
    }
}
