<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170202043954 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE AcademicYear (academic_year_id INT AUTO_INCREMENT NOT NULL, academic_year_range VARCHAR(255) NOT NULL, PRIMARY KEY(academic_year_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Activity (activity_id INT AUTO_INCREMENT NOT NULL, activity VARCHAR(255) NOT NULL, PRIMARY KEY(activity_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE CareerCluster (career_cluster_id INT AUTO_INCREMENT NOT NULL, career_cluster VARCHAR(255) NOT NULL, PRIMARY KEY(career_cluster_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE K12AIF (k12aif_id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, k12school_id INT NOT NULL, academic_year_id INT NOT NULL, k12grade_id INT NOT NULL, teacher VARCHAR(255) NOT NULL, gpa DOUBLE PRECISION NOT NULL, college_goal VARCHAR(255) NOT NULL, psat TINYINT(1) NOT NULL, sat TINYINT(1) NOT NULL, act TINYINT(1) NOT NULL, date_created DATE NOT NULL, date_modified DATE NOT NULL, INDEX IDX_DD620D0ECB944F1A (student_id), INDEX IDX_DD620D0E82D49BF0 (k12school_id), INDEX IDX_DD620D0EC54F3401 (academic_year_id), INDEX IDX_DD620D0E4BFDF03 (k12grade_id), PRIMARY KEY(k12aif_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE K12AIFActivity (k12aif_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_15060D479E639171 (k12aif_id), INDEX IDX_15060D4781C06096 (activity_id), PRIMARY KEY(k12aif_id, activity_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE K12AIFCareer (k12aif_id INT NOT NULL, career_cluster_id INT NOT NULL, INDEX IDX_631355989E639171 (k12aif_id), INDEX IDX_63135598C8166FC2 (career_cluster_id), PRIMARY KEY(k12aif_id, career_cluster_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE K12Center (k12center_id INT AUTO_INCREMENT NOT NULL, center_name VARCHAR(255) NOT NULL, center_abbr VARCHAR(255) NOT NULL, PRIMARY KEY(k12center_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE K12District (k12district_id INT AUTO_INCREMENT NOT NULL, center_id INT NOT NULL, district_name VARCHAR(255) NOT NULL, district_code VARCHAR(255) NOT NULL, INDEX IDX_B48DC7AD5932F377 (center_id), PRIMARY KEY(k12district_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE K12Grades (k12grade_id INT AUTO_INCREMENT NOT NULL, grade INT NOT NULL, school_level VARCHAR(255) NOT NULL, PRIMARY KEY(k12grade_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE K12School (k12school_id INT AUTO_INCREMENT NOT NULL, district_id INT NOT NULL, school_name VARCHAR(255) NOT NULL, INDEX IDX_83A510C2B08FA272 (district_id), PRIMARY KEY(k12school_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Race (race_id INT AUTO_INCREMENT NOT NULL, race_code VARCHAR(255) NOT NULL, race_name VARCHAR(255) NOT NULL, PRIMARY KEY(race_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE State (state_id INT AUTO_INCREMENT NOT NULL, state_abbr VARCHAR(255) NOT NULL, state_name VARCHAR(255) NOT NULL, PRIMARY KEY(state_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stateCourse (course_id INT AUTO_INCREMENT NOT NULL, subject_id INT NOT NULL, state_course_code VARCHAR(255) NOT NULL, course_name VARCHAR(255) NOT NULL, ap TINYINT(1) NOT NULL, date_created DATE NOT NULL, date_inactive DATE NOT NULL, INDEX IDX_E999021F23EDC87 (subject_id), PRIMARY KEY(course_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE StateCourseSubject (subject_id INT AUTO_INCREMENT NOT NULL, subject_area VARCHAR(255) NOT NULL, PRIMARY KEY(subject_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Student (id INT AUTO_INCREMENT NOT NULL, state_id INT NOT NULL, race_id INT DEFAULT NULL, primary_guardian_state_id INT NOT NULL, secondary_guardian_state_id INT DEFAULT NULL, state_student_id BIGINT NOT NULL, first_name VARCHAR(255) NOT NULL, middle_initial VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, street_address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code INT NOT NULL, gender VARCHAR(255) NOT NULL, ethnicity VARCHAR(255) NOT NULL, household_size INT NOT NULL, free_reduced_lunch TINYINT(1) NOT NULL, home_computer_access TINYINT(1) NOT NULL, home_internet_access TINYINT(1) NOT NULL, home_non_english_language TINYINT(1) NOT NULL, date_created DATE NOT NULL, primary_guardian_last_name VARCHAR(255) NOT NULL, primary_guardian_first_name VARCHAR(255) NOT NULL, primary_guardian_middle_initial VARCHAR(255) DEFAULT NULL, primary_guardian_address VARCHAR(255) NOT NULL, primary_guardian_city VARCHAR(255) NOT NULL, primary_guardian_zip_code INT NOT NULL, primary_guardian_email VARCHAR(255) NOT NULL, primary_guardian_phone VARCHAR(255) NOT NULL, primary_guardian_occupation VARCHAR(255) DEFAULT NULL, primary_guardian_employer VARCHAR(255) DEFAULT NULL, primary_guardian_is_college_graduate TINYINT(1) DEFAULT NULL, secondary_guardian_last_name VARCHAR(255) DEFAULT NULL, secondary_guardian_first_name VARCHAR(255) DEFAULT NULL, secondary_guardian_middle_initial VARCHAR(255) DEFAULT NULL, secondary_guardian_address VARCHAR(255) DEFAULT NULL, secondary_guardian_city VARCHAR(255) DEFAULT NULL, secondary_guardian_zip_code INT DEFAULT NULL, secondary_guardian_email VARCHAR(255) DEFAULT NULL, secondary_guardian_phone VARCHAR(255) DEFAULT NULL, secondary_guardian_occupation VARCHAR(255) DEFAULT NULL, secondary_guardian_employer VARCHAR(255) DEFAULT NULL, secondary_guardian_is_college_graduate TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_789E96AF8E039EAA (state_student_id), INDEX IDX_789E96AF5D83CC1 (state_id), INDEX IDX_789E96AF6E59D40D (race_id), INDEX IDX_789E96AF3B04BF93 (primary_guardian_state_id), INDEX IDX_789E96AF4DF08CF5 (secondary_guardian_state_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0ECB944F1A FOREIGN KEY (student_id) REFERENCES Student (id)');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0E82D49BF0 FOREIGN KEY (k12school_id) REFERENCES K12School (k12school_id)');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0EC54F3401 FOREIGN KEY (academic_year_id) REFERENCES AcademicYear (academic_year_id)');
        $this->addSql('ALTER TABLE K12AIF ADD CONSTRAINT FK_DD620D0E4BFDF03 FOREIGN KEY (k12grade_id) REFERENCES K12Grades (k12grade_id)');
        $this->addSql('ALTER TABLE K12AIFActivity ADD CONSTRAINT FK_15060D479E639171 FOREIGN KEY (k12aif_id) REFERENCES K12AIF (k12aif_id)');
        $this->addSql('ALTER TABLE K12AIFActivity ADD CONSTRAINT FK_15060D4781C06096 FOREIGN KEY (activity_id) REFERENCES Activity (activity_id)');
        $this->addSql('ALTER TABLE K12AIFCareer ADD CONSTRAINT FK_631355989E639171 FOREIGN KEY (k12aif_id) REFERENCES K12AIF (k12aif_id)');
        $this->addSql('ALTER TABLE K12AIFCareer ADD CONSTRAINT FK_63135598C8166FC2 FOREIGN KEY (career_cluster_id) REFERENCES CareerCluster (career_cluster_id)');
        $this->addSql('ALTER TABLE K12District ADD CONSTRAINT FK_B48DC7AD5932F377 FOREIGN KEY (center_id) REFERENCES K12Center (k12center_id)');
        $this->addSql('ALTER TABLE K12School ADD CONSTRAINT FK_83A510C2B08FA272 FOREIGN KEY (district_id) REFERENCES K12District (k12district_id)');
        $this->addSql('ALTER TABLE stateCourse ADD CONSTRAINT FK_E999021F23EDC87 FOREIGN KEY (subject_id) REFERENCES StateCourseSubject (subject_id)');
        $this->addSql('ALTER TABLE Student ADD CONSTRAINT FK_789E96AF5D83CC1 FOREIGN KEY (state_id) REFERENCES State (state_id)');
        $this->addSql('ALTER TABLE Student ADD CONSTRAINT FK_789E96AF6E59D40D FOREIGN KEY (race_id) REFERENCES Race (race_id)');
        $this->addSql('ALTER TABLE Student ADD CONSTRAINT FK_789E96AF3B04BF93 FOREIGN KEY (primary_guardian_state_id) REFERENCES State (state_id)');
        $this->addSql('ALTER TABLE Student ADD CONSTRAINT FK_789E96AF4DF08CF5 FOREIGN KEY (secondary_guardian_state_id) REFERENCES State (state_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0EC54F3401');
        $this->addSql('ALTER TABLE K12AIFActivity DROP FOREIGN KEY FK_15060D4781C06096');
        $this->addSql('ALTER TABLE K12AIFCareer DROP FOREIGN KEY FK_63135598C8166FC2');
        $this->addSql('ALTER TABLE K12AIFActivity DROP FOREIGN KEY FK_15060D479E639171');
        $this->addSql('ALTER TABLE K12AIFCareer DROP FOREIGN KEY FK_631355989E639171');
        $this->addSql('ALTER TABLE K12District DROP FOREIGN KEY FK_B48DC7AD5932F377');
        $this->addSql('ALTER TABLE K12School DROP FOREIGN KEY FK_83A510C2B08FA272');
        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0E4BFDF03');
        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0E82D49BF0');
        $this->addSql('ALTER TABLE Student DROP FOREIGN KEY FK_789E96AF6E59D40D');
        $this->addSql('ALTER TABLE Student DROP FOREIGN KEY FK_789E96AF5D83CC1');
        $this->addSql('ALTER TABLE Student DROP FOREIGN KEY FK_789E96AF3B04BF93');
        $this->addSql('ALTER TABLE Student DROP FOREIGN KEY FK_789E96AF4DF08CF5');
        $this->addSql('ALTER TABLE stateCourse DROP FOREIGN KEY FK_E999021F23EDC87');
        $this->addSql('ALTER TABLE K12AIF DROP FOREIGN KEY FK_DD620D0ECB944F1A');
        $this->addSql('DROP TABLE AcademicYear');
        $this->addSql('DROP TABLE Activity');
        $this->addSql('DROP TABLE CareerCluster');
        $this->addSql('DROP TABLE K12AIF');
        $this->addSql('DROP TABLE K12AIFActivity');
        $this->addSql('DROP TABLE K12AIFCareer');
        $this->addSql('DROP TABLE K12Center');
        $this->addSql('DROP TABLE K12District');
        $this->addSql('DROP TABLE K12Grades');
        $this->addSql('DROP TABLE K12School');
        $this->addSql('DROP TABLE Race');
        $this->addSql('DROP TABLE State');
        $this->addSql('DROP TABLE stateCourse');
        $this->addSql('DROP TABLE StateCourseSubject');
        $this->addSql('DROP TABLE Student');
    }
}
