<?php

namespace App\DataFixtures;

use App\Entity\Author as EntityAuthor;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++) {
            $author = new EntityAuthor;
            $author
            ->setFirstName('Fatah' .$i)
            ->setLastName('AINSERI' .$i)
            ->setBirthDate(DateTimeImmutable::createFromFormat('d/m/Y', $i . '/12/2000'))
            ;
            $this->addReference('author_' . $i, $author);
            $manager->persist($author);
        }

        $manager->flush();
    }
}
