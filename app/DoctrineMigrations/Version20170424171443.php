<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170424171443 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF ADD teacher_id INT DEFAULT NULL, DROP teacher, CHANGE math_course_id math_course_id INT DEFAULT NULL, CHANGE k12grade_id k12grade_id INT DEFAULT NULL, CHANGE science_course_id science_course_id INT DEFAULT NULL, CHANGE english_course_id english_course_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0E41807E1D FOREIGN KEY (teacher_id) REFERENCES Teachers (teacher_id)');
        $this->addSql('CREATE INDEX IDX_DD620D0E41807E1D ON K12AIF (teacher_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0E41807E1D');
        $this->addSql('DROP INDEX IDX_DD620D0E41807E1D ON K12AIF');
        $this->addSql('ALTER TABLE K12AIF ADD teacher VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP teacher_id, CHANGE math_course_id math_course_id INT NOT NULL, CHANGE science_course_id science_course_id INT NOT NULL, CHANGE english_course_id english_course_id INT NOT NULL, CHANGE k12grade_id k12grade_id INT NOT NULL');
    }
}
