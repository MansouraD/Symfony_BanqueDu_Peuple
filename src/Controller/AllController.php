<?php

namespace App\Controller;

use App\Entity\ClientsEntreprises;
use App\Entity\ClientsParticuliers;
use App\Entity\Comptes;
use App\Entity\Employeur;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AllController extends AbstractController
{
   private $em;
   public function __construct(EntityManagerInterface $emi)
   {
       $this->em=$emi;
       $this->cp_repository=$this->em->getRepository(ClientsParticuliers::class);
       $this->ce_repository=$this->em->getRepository(ClientsEntreprises::class);
       $this->c_repository=$this->em->getRepository(Comptes::class);
       $this->e_repository=$this->em->getRepository(Employeur::class);
   }
   
    /**
     * @Route("/", name="all")
     */

    public function index()
    {
        return $this->render('all/index.html.twig', [
            'controller_name' => 'AllController',
        ]);
    }

    /**
     * @Route("/client", name="app_all_inserer")
     */
    public function inserer(Request $request){   
        
        if($request->isMethod("POST"))
        {
            if($this->isCsrfTokenValid('client_token',$request->request->get('token')))
            {
                if($request->request->get('check1')=="Particulier")
                {
                    $this->addcp($request);
                   // $this->addc($request);
            
                   //$data['result']=1;
                   // if($data==1)
                    {
                        $this->addc($request);
                    }
                    if($request->request->get('check3')=="salarie")
                    {
                        $this->adde($request);   
                    }
                    return $this->redirectToRoute('all');
                }
                else if($request->request->get('check1')=="Entreprise")
                {
                    $this->addce($request);
                    //$data['result']=1;

                    //if($data==1)
                    {
                        $this->addc($request);
                    }
                    return $this->redirectToRoute('all');

                }
            }
        
        }
        return $this->redirectToRoute('all');

    }


    public function addcp(Request $request)
    {
        $ClientsParticuliers= new ClientsParticuliers();

        $ClientsParticuliers->setNom($request->get('nom_client'));
        $ClientsParticuliers->setPrenom($request->get('prenom_client'));
        $ClientsParticuliers->setDateDeNaissance($request->get('datenaiss'));
        $ClientsParticuliers->setCni($request->get('cni'));
        $ClientsParticuliers->setAdresse($request->get('adresse_client'));
        $ClientsParticuliers->setTelephone($request->get('tel_client'));
        $ClientsParticuliers->setMail($request->get('email_client'));
        $ClientsParticuliers->setProfession($request->get('profession'));
        $ClientsParticuliers->setStatut($request->get('statut'));
        $ClientsParticuliers->setSalaire($request->get('salaire'));

        $this->em->persist($ClientsParticuliers);
        $this->em->flush();
    }

    public function addce(Request $request)
    {
        $ClientsEntreprises= new ClientsEntreprises();

        $ClientsEntreprises->setStatut($request->get('statut_juridique'));
        $ClientsEntreprises->setDenomination($request->get('nom_entreprise'));
        $ClientsEntreprises->setNinea($request->get('ninea'));
        $ClientsEntreprises->setAdresse($request->get('adresse_entreprise'));
        $ClientsEntreprises->setTelephone($request->get('tel_entreprise'));
        $ClientsEntreprises->setMail($request->get('email_entreprise'));

        $this->em->persist($ClientsEntreprises);
        $this->em->flush();   
    }

    public function addc(Request $request)
    {
        $Comptes= new Comptes();

        $Comptes->setTypeCompte($request->get('type_compte'));
        $Comptes->setNumeroAgence($request->get('numero_agence'));
        $Comptes->setNumeroCompte($request->get('numero_compte'));
        $Comptes->setCleRib($request->get('cle_rib'));
        $Comptes->setFraisOuverture($request->get('frais_ouverture'));

        $this->em->persist($Comptes);
        $this->em->flush();
    }

    public function adde(Request $request)
    {
        $Employeur= new Employeur();

        $Employeur->setNumeroIdentification($request->get('numero_identification'));
        $Employeur->setDenomination($request->get('denomination'));
        $Employeur->setRaisonSocial($request->get('raison_social'));
        $Employeur->setAdresse($request->get('adresse_employeur'));

        $this->em->persist($Employeur);
        $this->em->flush();
    }
}
