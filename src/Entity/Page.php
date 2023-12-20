<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Section::class, inversedBy: 'pages')]
    private Collection $pageSection;

    public function __construct()
    {
        $this->pageSection = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Section>
     */
    public function getPageSection(): Collection
    {
        return $this->pageSection;
    }

    public function addPageSection(Section $pageSection): static
    {
        if (!$this->pageSection->contains($pageSection)) {
            $this->pageSection->add($pageSection);
        }

        return $this;
    }

    public function removePageSection(Section $pageSection): static
    {
        $this->pageSection->removeElement($pageSection);

        return $this;
    }
}
