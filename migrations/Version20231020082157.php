<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020082157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guest ADD table_id_id INT NOT NULL, ADD presence TINYINT(1) NOT NULL, ADD full_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE guest ADD CONSTRAINT FK_ACB79A3573B8532F FOREIGN KEY (table_id_id) REFERENCES `table` (id)');
        $this->addSql('CREATE INDEX IDX_ACB79A3573B8532F ON guest (table_id_id)');
        $this->addSql('ALTER TABLE `table` ADD table_number VARCHAR(255) NOT NULL, ADD description LONGTEXT DEFAULT NULL, ADD max_capacity INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guest DROP FOREIGN KEY FK_ACB79A3573B8532F');
        $this->addSql('DROP INDEX IDX_ACB79A3573B8532F ON guest');
        $this->addSql('ALTER TABLE guest DROP table_id_id, DROP presence, DROP full_name');
        $this->addSql('ALTER TABLE `table` DROP table_number, DROP description, DROP max_capacity');
    }
}
