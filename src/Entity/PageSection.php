<?php

namespace App\Entity;

use App\Repository\PageSectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageSectionRepository::class)]
class PageSection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'pageSection', targetEntity: Page::class)]
    private Collection $pageId;

    #[ORM\OneToMany(mappedBy: 'pageSection', targetEntity: Section::class)]
    private Collection $sectionId;

    #[ORM\Column]
    private ?int $ordered = null;

    public function __construct()
    {
        $this->pageId = new ArrayCollection();
        $this->sectionId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Page>
     */
    public function getPageId(): Collection
    {
        return $this->pageId;
    }

    public function addPageId(Page $pageId): static
    {
        if (!$this->pageId->contains($pageId)) {
            $this->pageId->add($pageId);
            $pageId->setPageSection($this);
        }

        return $this;
    }

    public function removePageId(Page $pageId): static
    {
        if ($this->pageId->removeElement($pageId)) {
            // set the owning side to null (unless already changed)
            if ($pageId->getPageSection() === $this) {
                $pageId->setPageSection(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Section>
     */
    public function getSectionId(): Collection
    {
        return $this->sectionId;
    }

    public function addSectionId(Section $sectionId): static
    {
        if (!$this->sectionId->contains($sectionId)) {
            $this->sectionId->add($sectionId);
            $sectionId->setPageSection($this);
        }

        return $this;
    }

    public function removeSectionId(Section $sectionId): static
    {
        if ($this->sectionId->removeElement($sectionId)) {
            // set the owning side to null (unless already changed)
            if ($sectionId->getPageSection() === $this) {
                $sectionId->setPageSection(null);
            }
        }

        return $this;
    }

    public function getOrdered(): ?int
    {
        return $this->ordered;
    }

    public function setOrdered(int $ordered): static
    {
        $this->ordered = $ordered;

        return $this;
    }
}
