<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180911060748 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE image_slide (id INT AUTO_INCREMENT NOT NULL, image_url VARCHAR(255) NOT NULL, alternative VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE slider');
        $this->addSql('DROP TABLE slides');
        $this->addSql('ALTER TABLE user ADD statut TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE slider (id INT AUTO_INCREMENT NOT NULL, slide_image VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, alternative VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, slide_url VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE slides (id INT AUTO_INCREMENT NOT NULL, nom_slide VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, slide_url VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE image_slide');
        $this->addSql('ALTER TABLE user DROP statut');
    }
}
