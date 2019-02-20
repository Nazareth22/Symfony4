<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190219211136 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable('person');
        $table->addColumn('id', 'integer', array('autoincrement' => true));
        $table->addColumn('name', 'string');
        $table->addColumn('age', 'integer');
        $table->addColumn('weight', 'integer');
        $table->setPrimaryKey(array('id'));

        $table = $schema->createTable('car');
        $table->addColumn('id', 'integer', array('autoincrement' => true));
        $table->addColumn('title', 'string');
        $table->addColumn('price', 'float');
        $table->addColumn('person_id', 'integer');
        $table->setPrimaryKey(array('id'));
        $table->addForeignKeyConstraint($schema->getTable('person'), array('person_id'), array('id'), array('NO ACTION', 'RESTRICT'),'fk_car_person');

    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable('car');
        $schema->dropTable('person');

    }

    public function postUp(Schema $schema): void
    {
        $sql = "insert into person (name, age, weight) ";
        $sql .= "values (:name, :age, :weight) returning id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('name', 'Иван');
        $stmt->bindValue('age', 44);
        $stmt->bindValue('weight', 74);
        $stmt->execute();
        $result=$stmt->fetchAll();
        $personId=$result[0]['id'];

        $sql = "insert into car (title, price, person_id) ";
        $sql .= "values (:title, :price, :person_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('title', 'BMW');
        $stmt->bindValue('price', 5354856);
        $stmt->bindValue('person_id', $personId);
        $stmt->execute();

        $sql = "insert into car (title, price, person_id) ";
        $sql .= "values (:title, :price, :person_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('title', 'Mercedes');
        $stmt->bindValue('price', 6354856);
        $stmt->bindValue('person_id', $personId);
        $stmt->execute();

        $sql = "insert into person (name, age, weight) ";
        $sql .= "values (:name, :age, :weight) returning id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('name', 'Артем');
        $stmt->bindValue('age', 24);
        $stmt->bindValue('weight', 104);
        $stmt->execute();
        $result=$stmt->fetchAll();
        $personId=$result[0]['id'];

        $sql = "insert into car (title, price, person_id) ";
        $sql .= "values (:title, :price, :person_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('title', 'Lexus');
        $stmt->bindValue('price', 3354856);
        $stmt->bindValue('person_id', $personId);
        $stmt->execute();


    }
}
