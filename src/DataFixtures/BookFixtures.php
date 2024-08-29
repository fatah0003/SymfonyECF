<?php

namespace App\DataFixtures;

use App\Entity\Book as EntityBook;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $book = new EntityBook();
            $book
            ->setTitle('ECF symfony' . $i)
            ->setDescription(('Ceci est un livre' . $i))
            ->setPublicationDate(DateTimeImmutable::createFromFormat('d/m/Y', $i . '/12/2000'))
            ->setUser($this->getReference('user_' . rand(0, 2)))
            ->setAuthor($this->getReference('author_' . rand(0, 2)))
            ;
            $manager->persist($book);
        } 
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
        UserFixtures::class,
        AuthorFixtures::class,

        ];
    }
}
