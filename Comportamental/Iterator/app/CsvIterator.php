<?php

namespace App;

/**
 * Iterador arquivo CSV
 */
class CsvIterator implements \Iterator
{
    const ROW_SIZE = 4096;

    protected $filePointer = null;
    protected $currentElement = null;
    protected $rowCounter = null;
    protected $delimiter = null;

    /**
     * Iniciando instância e abrindo aruivo CSV
     * 
     * @param string $file The CSV file.
     * @param string $delimiter The delimiter.
     *
     * @throws \Exception
     */
    public function __construct($file, $delimiter = ';')
    {
        try {
            $this->filePointer = fopen($file, 'rb');
            $this->delimiter = $delimiter;
        } catch (\Exception $e) {
            throw new \Exception('O arquivo "' . $file . '" não pode ser lido.');
        }
    }

    /**
     * Reseta o ponteiro.
     */
    public function rewind(): void
    {
        $this->rowCounter = 0;
        rewind($this->filePointer);
    }

    /**
     * Retorna linha atual do arquivo como um array
     * @return array
     */
    public function current(): array
    {
        $this->currentElement = fgetcsv($this->filePointer, self::ROW_SIZE, $this->delimiter);
        $this->rowCounter++;
        return $this->currentElement;
    }

    /**
     * Retorna o número da linha atual
     * @return int
     */
    public function key(): int
    {
        return $this->rowCounter;
    }

    /**
     * Verifica fim do arquivo
     * @return bool
     */
    public function next(): bool
    {
        if (is_resource($this->filePointer)) {
            return !feof($this->filePointer);
        }

        return false;
    }

    /**
     * Verificando se a próxima linha é válida
     * @return bool
     */
    public function valid(): bool
    {
        if (!$this->next()) {
            if (is_resource($this->filePointer)) fclose($this->filePointer);
            return false;
        }

        return true;
    }
}


