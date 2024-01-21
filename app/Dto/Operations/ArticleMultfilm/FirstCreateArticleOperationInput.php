<?php

namespace App\Dto\Operations\ArticleMultfilm;

use Illuminate\Http\UploadedFile;

class FirstCreateArticleOperationInput
{
    private string $title;

    private \DateTime $premier;

    private UploadedFile $poster;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return FirstCreateArticleOperationInput
     */
    public function setTitle(string $title): FirstCreateArticleOperationInput
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPremier(): \DateTime
    {
        return $this->premier;
    }

    /**
     * @param \DateTime $premier
     * @return FirstCreateArticleOperationInput
     */
    public function setPremier(\DateTime $premier): FirstCreateArticleOperationInput
    {
        $this->premier = $premier;
        return $this;
    }

    /**
     * @return UploadedFile
     */
    public function getPoster(): UploadedFile
    {
        return $this->poster;
    }

    /**
     * @param UploadedFile $poster
     * @return FirstCreateArticleOperationInput
     */
    public function setPoster(UploadedFile $poster): FirstCreateArticleOperationInput
    {
        $this->poster = $poster;
        return $this;
    }
}
