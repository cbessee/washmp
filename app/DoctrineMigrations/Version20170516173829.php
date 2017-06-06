<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170516173829 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE FuturePlan (future_plan_id INT AUTO_INCREMENT NOT NULL, future_plan VARCHAR(255) NOT NULL, PRIMARY KEY(future_plan_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SeniorSurvey (senior_survey_id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, after_school_rating VARCHAR(255) NOT NULL, class_rating VARCHAR(255) NOT NULL, field_trips_rating VARCHAR(255) NOT NULL, internships_rating VARCHAR(255) NOT NULL, junior_senior_program_rating VARCHAR(255) NOT NULL, competitons_mesa_day_rating VARCHAR(255) NOT NULL, mesa_club_rating VARCHAR(255) NOT NULL, mentoring_rating VARCHAR(255) NOT NULL, saturday_academy_rating VARCHAR(255) NOT NULL, sbac_eoc_rating VARCHAR(255) NOT NULL, summer_program_rating VARCHAR(255) NOT NULL, college_workshop_rating VARCHAR(255) NOT NULL, financial_aid_workshop_rating VARCHAR(255) NOT NULL, sat_act_workshop_rating VARCHAR(255) NOT NULL, other_activities VARCHAR(255) NOT NULL, other_activities_rating VARCHAR(255) NOT NULL, created_plan TINYINT(1) NOT NULL, discussed_plan TINYINT(1) NOT NULL, plan_helpfullness VARCHAR(255) NOT NULL, applied_college TINYINT(1) NOT NULL, accepted_college TINYINT(1) NOT NULL, received_scholarships TINYINT(1) NOT NULL, not_attending_reason VARCHAR(255) NOT NULL, not_attending_other VARCHAR(255) NOT NULL, paying_college VARCHAR(255) NOT NULL, financial_aid VARCHAR(255) NOT NULL, living_away VARCHAR(255) NOT NULL, parental_support VARCHAR(255) NOT NULL, comments LONGTEXT NOT NULL, INDEX IDX_47503BA9CB944F1A (student_id), PRIMARY KEY(senior_survey_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE surveyFuturePlans (seniorSurveyID INT NOT NULL, futurePlanID INT NOT NULL, INDEX IDX_3B9EC4DD1279B236 (seniorSurveyID), INDEX IDX_3B9EC4DD803732D3 (futurePlanID), PRIMARY KEY(seniorSurveyID, futurePlanID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE SeniorSurvey ADD CONSTRAINT FK_47503BA9CB944F1A FOREIGN KEY (student_id) REFERENCES Student (id)');
        $this->addSql('ALTER TABLE surveyFuturePlans ADD CONSTRAINT FK_3B9EC4DD1279B236 FOREIGN KEY (seniorSurveyID) REFERENCES SeniorSurvey (seniorSurveyID)');
        $this->addSql('ALTER TABLE surveyFuturePlans ADD CONSTRAINT FK_3B9EC4DD803732D3 FOREIGN KEY (futurePlanID) REFERENCES FuturePlan (futurePlanID)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE surveyFuturePlans DROP FOREIGN KEY FK_3B9EC4DD803732D3');
        $this->addSql('ALTER TABLE surveyFuturePlans DROP FOREIGN KEY FK_3B9EC4DD1279B236');
        $this->addSql('DROP TABLE FuturePlan');
        $this->addSql('DROP TABLE SeniorSurvey');
        $this->addSql('DROP TABLE surveyFuturePlans');
    }
}
