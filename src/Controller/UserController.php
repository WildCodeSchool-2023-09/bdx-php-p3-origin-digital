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
        $users = $entityManager->getRepository(User::class)->findAll();
        $csvData = "Id;Email;Roles;UserName;Photo\n";
        foreach ($users as $user) {
            $roles = json_encode($user->getRoles());
            $csvData .= implode(';', [
                    $user->getId(),
                    $user->getEmail(),
                    $roles,
                    $user->getUserName(),
                    $user->getPhoto() ?? ' '
                ]) . "\n";
        }
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
