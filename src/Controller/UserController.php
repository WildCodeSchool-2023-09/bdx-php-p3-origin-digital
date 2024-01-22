<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{

    #[Route("/export-users", name: "export_users")]

    public function exportUsers(EntityManagerInterface $entityManager): Response
    {
        // Récupérer les utilisateurs depuis la base de données avec EntityManager
        $users = $entityManager->getRepository(User::class)->findAll();

        // Préparer les en-têtes CSV
        $csvData = "Id;Email;Roles;UserName;Photo\n";

        // Parcourir les utilisateurs et préparer les données CSV
        foreach ($users as $user) {
            $roles = json_encode($user->getRoles()); // Convertir les rôles en chaîne JSON
            $csvData .= implode(';', [
                    $user->getId(),
                    $user->getEmail(),
                    $roles,
                    $user->getUserName(),
                    $user->getPhoto() ?? ' ' // Gérer les valeurs NULL
                ]) . "\n";
        }

        // Créer la réponse avec le contenu CSV
        return new Response(
            $csvData,
            200,
            [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="users.csv"'
            ]
        );
    }
}
