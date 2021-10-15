<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211015223418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, date DATE NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_video (article_id INT NOT NULL, video_id INT NOT NULL, INDEX IDX_B70A83D7294869C (article_id), INDEX IDX_B70A83D29C1004E (video_id), PRIMARY KEY(article_id, video_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fotw (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_F9B0A3B37294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_video (tag_id INT NOT NULL, video_id INT NOT NULL, INDEX IDX_5E2BC32ABAD26311 (tag_id), INDEX IDX_5E2BC32A29C1004E (video_id), PRIMARY KEY(tag_id, video_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_article (tag_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_300B23CCBAD26311 (tag_id), INDEX IDX_300B23CC7294869C (article_id), PRIMARY KEY(tag_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_video ADD CONSTRAINT FK_B70A83D7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_video ADD CONSTRAINT FK_B70A83D29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fotw ADD CONSTRAINT FK_F9B0A3B37294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE tag_video ADD CONSTRAINT FK_5E2BC32ABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_video ADD CONSTRAINT FK_5E2BC32A29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_article ADD CONSTRAINT FK_300B23CCBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_article ADD CONSTRAINT FK_300B23CC7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_video DROP FOREIGN KEY FK_B70A83D7294869C');
        $this->addSql('ALTER TABLE fotw DROP FOREIGN KEY FK_F9B0A3B37294869C');
        $this->addSql('ALTER TABLE tag_article DROP FOREIGN KEY FK_300B23CC7294869C');
        $this->addSql('ALTER TABLE tag_video DROP FOREIGN KEY FK_5E2BC32ABAD26311');
        $this->addSql('ALTER TABLE tag_article DROP FOREIGN KEY FK_300B23CCBAD26311');
        $this->addSql('ALTER TABLE article_video DROP FOREIGN KEY FK_B70A83D29C1004E');
        $this->addSql('ALTER TABLE tag_video DROP FOREIGN KEY FK_5E2BC32A29C1004E');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_video');
        $this->addSql('DROP TABLE fotw');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_video');
        $this->addSql('DROP TABLE tag_article');
        $this->addSql('DROP TABLE video');
    }
}
