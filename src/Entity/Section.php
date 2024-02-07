<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slugSection = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\ManyToMany(targetEntity: Video::class, inversedBy: 'section', cascade: ['persist'])]
    private Collection $videos;

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: PageSection::class, cascade: ['persist', 'remove'])]
    private Collection $pageSections;

    public function __construct()
    {
        $this->videos = new ArrayCollection();
        $this->pageSections = new ArrayCollection();
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

    public function getSlugSection(): ?string
    {
        return $this->slugSection;
    }

    public function setSlugSection(string $slugSection): static
    {
        $this->slugSection = $slugSection;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Video>
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): ArrayCollection|Collection
    {
        if (!$this->videos->contains($video)) {
            $this->videos->add($video);
            $video->addSection($this);
        }

        return $this->videos;
    }

    public function removeVideo(Video $video): ArrayCollection|Collection
    {
        if ($this->videos->removeElement($video)) {
            $video->removeSection($this);
        }

        return $this->videos;
    }

    /**
     * @return Collection<int, PageSection>
     */
    public function getPageSections(): Collection
    {
        return $this->pageSections;
    }

    public function addPageSection(PageSection $pageSection): static
    {
        if (!$this->pageSections->contains($pageSection)) {
            $this->pageSections->add($pageSection);
            $pageSection->setSection($this);
        }

        return $this;
    }

    public function removePageSection(PageSection $pageSection): static
    {
        if ($this->pageSections->removeElement($pageSection)) {
            // set the owning side to null (unless already changed)
            if ($pageSection->getSection() === $this) {
                $pageSection->setSection(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
