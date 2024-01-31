<?php

namespace App\Dto\Operations\Rate;

use App\Models\Rate;

class OutputUpdateRate
{
    private ?Rate $rate;

    private ?string $error_message = null;

    /**
     * @return Rate|null
     */
    public function getRate(): ?Rate
    {
        return $this->rate;
    }

    /**
     * @param Rate|null $rate
     * @return OutputCreateRate
     */
    public function setRate(?Rate $rate): OutputUpdateRate
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }

    /**
     * @param string|null $error_message
     * @return OutputCreateRate
     */
    public function setErrorMessage(?string $error_message): OutputUpdateRate
    {
        $this->error_message = $error_message;
        return $this;
    }

}
