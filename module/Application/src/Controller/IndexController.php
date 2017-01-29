<?php

namespace Application\Controller;

use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Album as albumEntity;

class IndexController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    private $doctrine;

    /**
     * IndexController constructor.
     * @param EntityManager $doctrine
     */
    public function __construct(
        EntityManager $doctrine
    )
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $albums = $this->doctrine->getRepository(albumEntity::class)->findAll();
        //$this->removeAlbums($albums); //Truncate the album entity

//        $album = new albumEntity();
//        $album->setArtist('First Album');
//        $album->setTitle('First Album');
//        $this->doctrine->merge($album);
//        $this->doctrine->flush();
//        $this->doctrine->clear();

        $newALbum = new albumEntity();
        $newALbum->setArtist('Second Album from Album #');
        $newALbum->setTitle('Second Album');
        $this->doctrine->persist($newALbum);
        $this->doctrine->flush();

        $newALbum->setArtist('Updated: Second Album from Album #');
        $this->doctrine->persist($newALbum);
        $this->doctrine->flush();

        return new ViewModel();
    }

    private function removeAlbums($albums) {
        foreach ($albums as $album) {
            $this->doctrine->remove($album);
        }
        $this->doctrine->flush();
    }
}
