<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210924215330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create STATUS entities examples';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, is_active TINYINT(1) NOT NULL, code VARCHAR(30) NOT NULL, label VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, `rank` INT NOT NULL, type INT NOT NULL, meta_status VARCHAR(255) NOT NULL, for_stat TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE status');
    }
}
