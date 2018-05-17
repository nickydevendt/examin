<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180517133445 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users ADD is_active TINYINT(1) NOT NULL, DROP admin');
        $this->addSql('ALTER TABLE visitors CHANGE id id INT NOT NULL, CHANGE randomid randomid CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', CHANGE datecreated datecreated DATETIME NOT NULL, CHANGE expiredate expiredate DATETIME NOT NULL');
        $this->addSql('ALTER TABLE affiliatedcompanys CHANGE datecreated datecreated DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE affiliatedcompanys CHANGE datecreated datecreated DATE NOT NULL');
        $this->addSql('ALTER TABLE users ADD admin INT NOT NULL, DROP is_active');
        $this->addSql('ALTER TABLE visitors CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE randomid randomid VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE datecreated datecreated DATE NOT NULL, CHANGE expiredate expiredate DATE NOT NULL');
    }
}
