<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170516191924 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF CHANGE gpa gpa DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE SeniorSurvey CHANGE other_activities other_activities VARCHAR(255) DEFAULT NULL, CHANGE other_activities_rating other_activities_rating VARCHAR(255) DEFAULT NULL, CHANGE not_attending_other not_attending_other VARCHAR(255) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE K12AIF CHANGE gpa gpa DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE SeniorSurvey CHANGE other_activities other_activities VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE other_activities_rating other_activities_rating VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE not_attending_other not_attending_other VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
