<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211006183111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add new columns which come from UserInterface to operator table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operator ADD roles JSON NOT NULL, ADD password VARCHAR(255)'
        . ' DEFAULT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD username VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operator DROP roles, DROP password, DROP salt, DROP username');
    }
}
