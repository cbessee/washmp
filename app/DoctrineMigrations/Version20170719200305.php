<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170719200305 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF CHANGE college_goal college_goal VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stateCourse DROP FOREIGN KEY FK_E999021F23EDC87');
        $this->addSql('DROP INDEX idx_6f058dc823edc87 ON stateCourse');
        $this->addSql('CREATE INDEX IDX_E999021F23EDC87 ON stateCourse (subject_id)');
        $this->addSql('ALTER TABLE stateCourse ADD CONSTRAINT FK_E999021F23EDC87 FOREIGN KEY (subject_id) REFERENCES StateCourseSubject (subject_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF CHANGE college_goal college_goal VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE stateCourse DROP FOREIGN KEY FK_E999021F23EDC87');
        $this->addSql('DROP INDEX idx_e999021f23edc87 ON stateCourse');
        $this->addSql('CREATE INDEX IDX_6F058DC823EDC87 ON stateCourse (subject_id)');
        $this->addSql('ALTER TABLE stateCourse ADD CONSTRAINT FK_E999021F23EDC87 FOREIGN KEY (subject_id) REFERENCES StateCourseSubject (subject_id)');
    }
}
