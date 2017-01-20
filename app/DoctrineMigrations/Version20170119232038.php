<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170119232038 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE race (race_id INT AUTO_INCREMENT NOT NULL, race_code VARCHAR(255) NOT NULL, race_name VARCHAR(255) NOT NULL, PRIMARY KEY(race_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE state (state_id INT AUTO_INCREMENT NOT NULL, state_abbr VARCHAR(255) NOT NULL, state_name VARCHAR(255) NOT NULL, PRIMARY KEY(state_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, state_id INT DEFAULT NULL, race_id INT DEFAULT NULL, state_student_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, middle_initial VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, email VARCHAR(255) NOT NULL, phone_number INT NOT NULL, street_address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code INT NOT NULL, gender VARCHAR(255) NOT NULL, ethnicity VARCHAR(255) NOT NULL, household_size INT NOT NULL, free_reduced_lunch TINYINT(1) NOT NULL, home_computer_access TINYINT(1) NOT NULL, home_internet_access TINYINT(1) NOT NULL, home_non_english_language TINYINT(1) NOT NULL, date_created DATE NOT NULL, INDEX IDX_B723AF335D83CC1 (state_id), INDEX IDX_B723AF336E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF335D83CC1 FOREIGN KEY (state_id) REFERENCES state (state_id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF336E59D40D FOREIGN KEY (race_id) REFERENCES race (race_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF336E59D40D');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF335D83CC1');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE state');
        $this->addSql('DROP TABLE student');
    }
}
