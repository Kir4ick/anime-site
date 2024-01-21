<?php

namespace App\Services\Parser\Abstracts;

use App\Services\Parser\Contract\IParser;
use App\Services\Parser\Models\Abstracts\AbstractParseModel;

abstract class AbstractParser implements IParser
{

    public function __construct(protected readonly ?AbstractParseModel $model)
    {
    }

    protected const NAMESPACE_KEY = ':';

    public function parse(string $string): array|AbstractParseModel|null
    {
        try {
            $xml = simplexml_load_string($string,'SimpleXMLElement', LIBXML_NOCDATA);
            $namespaces = $xml->getNamespaces(true);
            # Удаляем все чертовы namespace
            foreach ($namespaces as $prefix => $uri) {
                $string = preg_replace(sprintf('/%s:/', $prefix), '', $string);
                $uri = preg_replace('~/~', '\/', $uri);
                $string = preg_replace(sprintf('/[a-z]+:%s="%s"/', $prefix, $uri), '', $string);
            }

            $string = json_encode(simplexml_load_string($string), JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $exception) { /** Если exception, значит это просто строка **/ }

        $data = json_decode($string, true);
        if ($this->model == null) {
            return $data;
        }

        return $this->model->setAttributes($this->normalizeArray($data));
    }

    abstract protected function normalizeArray(array $data);

    /**
     * Проверяет запись в массиве и отдаёт результат
     * @param $data
     * @param string $key - Ключ для поиска (пример записи: 'value:value1:value2' результат: $array[value][value1][value2])
     * @return mixed|null
     */
    protected function getValue($data, string $key)
    {
        $keys = explode(self::NAMESPACE_KEY, $key);
        $value = $data;

        foreach ($keys as $key) {
            $value = $value[$key] ?? null;
            if ($value == null) return null;
        }

        return $value;
    }
}
