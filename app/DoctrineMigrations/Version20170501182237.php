<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170501182237 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Student CHANGE state_student_id state_student_id BIGINT DEFAULT NULL, CHANGE district_student_id district_student_id BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user ADD k12center_id INT DEFAULT NULL, ADD is_wa_mesa TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A647918CC2F69 FOREIGN KEY (k12center_id) REFERENCES K12Center (k12center_id)');
        $this->addSql('CREATE INDEX IDX_957A647918CC2F69 ON fos_user (k12center_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_789E96AFA021FDA4 ON Student');
        $this->addSql('ALTER TABLE Student CHANGE state_student_id state_student_id BIGINT NOT NULL, CHANGE district_student_id district_student_id BIGINT NOT NULL');
        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A647918CC2F69');
        $this->addSql('DROP INDEX IDX_957A647918CC2F69 ON fos_user');
        $this->addSql('ALTER TABLE fos_user DROP k12center_id, DROP is_wa_mesa');
    }
}
