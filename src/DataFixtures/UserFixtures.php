<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {

        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("admin@email.com");
        $user->setPassword($this->encoder->encodePassword($user,"admin"));
        $user->addRole("ROLE_ADMIN");
        $user->setIsActive(true);
        $manager->persist($user);
        //**************************************
        $user1 = new User();
        $user1->setEmail("user@email.com");
        $user1->setPassword($this->encoder->encodePassword($user1,"user"));
        $user1->addRole("ROLE_USER");
        $user1->setIsActive(true);
        $manager->persist($user1);

        $manager->flush();
    }
}
