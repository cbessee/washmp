<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170516174015 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE surveyFuturePlans ADD CONSTRAINT FK_3B9EC4DD1279B236 FOREIGN KEY (seniorSurveyID) REFERENCES SeniorSurvey (senior_survey_id)');
        $this->addSql('ALTER TABLE surveyFuturePlans ADD CONSTRAINT FK_3B9EC4DD803732D3 FOREIGN KEY (futurePlanID) REFERENCES FuturePlan (future_plan_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE surveyFuturePlans DROP FOREIGN KEY FK_3B9EC4DD1279B236');
        $this->addSql('ALTER TABLE surveyFuturePlans DROP FOREIGN KEY FK_3B9EC4DD803732D3');
    }
}
