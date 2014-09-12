<?php

namespace TestMigrations\Bundle\MainBundle\Migrations\MongoDB;

use AntiMattr\MongoDB\Migrations\AbstractMigration;
use Doctrine\MongoDB\Database;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140912131126 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getDescription()
    {
        return "Make all monkeys happy.";
    }

    public function up(Database $db)
    {
        $db->selectCollection('Monkey')
            ->createQueryBuilder()
            ->update(
                array(),
                array()
            )
            ->multiple(true)
            ->field('isHappy')->set(true)
            ->getQuery()
            ->execute()
        ;
    }

    public function down(Database $db)
    {
        $db->selectCollection('Monkey')
            ->createQueryBuilder()
            ->update(
                array(),
                array()
            )
            ->multiple(true)
            ->field('isHappy')->set(false)
            ->getQuery()
            ->execute()
        ;   
    }
}
