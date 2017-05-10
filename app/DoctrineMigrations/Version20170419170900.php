<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170419170900 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF ADD k12center_id INT NOT NULL, ADD math_course_id INT NOT NULL, ADD science_course_id INT NOT NULL, ADD english_course_id INT NOT NULL');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0E18CC2F69 FOREIGN KEY (k12center_id) REFERENCES K12Center (k12center_id)');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0E3A84861 FOREIGN KEY (math_course_id) REFERENCES StateCourse (course_id)');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0EAF2ABC62 FOREIGN KEY (science_course_id) REFERENCES StateCourse (course_id)');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0EEFDF91D8 FOREIGN KEY (english_course_id) REFERENCES StateCourse (course_id)');
        $this->addSql('CREATE INDEX IDX_DD620D0E18CC2F69 ON K12AIF (k12center_id)');
        $this->addSql('CREATE INDEX IDX_DD620D0E3A84861 ON K12AIF (math_course_id)');
        $this->addSql('CREATE INDEX IDX_DD620D0EAF2ABC62 ON K12AIF (science_course_id)');
        $this->addSql('CREATE INDEX IDX_DD620D0EEFDF91D8 ON K12AIF (english_course_id)');
        $this->addSql('ALTER TABLE Student ADD district_student_id BIGINT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_789E96AFA021FDA4 ON Student (district_student_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0E18CC2F69');
        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0E3A84861');
        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0EAF2ABC62');
        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0EEFDF91D8');
        $this->addSql('DROP INDEX IDX_DD620D0E18CC2F69 ON K12AIF');
        $this->addSql('DROP INDEX IDX_DD620D0E3A84861 ON K12AIF');
        $this->addSql('DROP INDEX IDX_DD620D0EAF2ABC62 ON K12AIF');
        $this->addSql('DROP INDEX IDX_DD620D0EEFDF91D8 ON K12AIF');
        $this->addSql('ALTER TABLE K12AIF DROP k12center_id, DROP math_course_id, DROP science_course_id, DROP english_course_id');
        $this->addSql('DROP INDEX UNIQ_789E96AFA021FDA4 ON Student');
        $this->addSql('ALTER TABLE Student DROP district_student_id');
    }
}
