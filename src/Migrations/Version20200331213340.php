<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200331213340 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__post AS SELECT id, title, body, tags, image FROM post');
        $this->addSql('DROP TABLE post');
        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, body CLOB DEFAULT NULL COLLATE BINARY, image VARCHAR(255) DEFAULT NULL COLLATE BINARY, tags CLOB DEFAULT NULL --(DC2Type:array)
        )');
        $this->addSql('INSERT INTO post (id, title, body, tags, image) SELECT id, title, body, tags, image FROM __temp__post');
        $this->addSql('DROP TABLE __temp__post');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__post AS SELECT id, title, body, tags, image FROM post');
        $this->addSql('DROP TABLE post');
        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, body CLOB DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, tags CLOB DEFAULT \'NULL --(DC2Type:array)\' COLLATE BINARY --(DC2Type:array)
        )');
        $this->addSql('INSERT INTO post (id, title, body, tags, image) SELECT id, title, body, tags, image FROM __temp__post');
        $this->addSql('DROP TABLE __temp__post');
    }
}
