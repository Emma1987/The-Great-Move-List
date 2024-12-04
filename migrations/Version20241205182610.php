<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241205182610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initial tables';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE box (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, label VARCHAR(100) NOT NULL, color VARCHAR(100) NOT NULL, additional_information VARCHAR(100) NOT NULL, INDEX IDX_8A9483AC54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE box_type (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(100) NOT NULL, image_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, box_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_1F1B251ED8177B3F (box_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE box ADD CONSTRAINT FK_8A9483AC54C8C93 FOREIGN KEY (type_id) REFERENCES box_type (id)');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251ED8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE box DROP FOREIGN KEY FK_8A9483AC54C8C93');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251ED8177B3F');
        $this->addSql('DROP TABLE box');
        $this->addSql('DROP TABLE box_type');
        $this->addSql('DROP TABLE item');
    }
}
