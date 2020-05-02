<?php
/**
 * The Simple DOT ENV class.
 *
 * @author Amr Gamal <amr.gamal878@gmail.com>
 */
class EnvReader
{
    /**
     * Undocumented variable.
     *
     * @var [string]
     */
    private $path;

    /**
     * Undocumented variable.
     *
     * @var [string]
     */
    private $fileLines;

    public function __construct($fileName)
    {
        $this->path = __DIR__.DIRECTORY_SEPARATOR.$fileName;
        $this->fileLines = explode(PHP_EOL, file_get_contents($this->path));
    }

    /**
     * Undocumented function.
     *
     * @param [string] $key
     */
    public function parseConfig($key)
    {
        return $this->searchKey($key);
    }

    /**
     * Undocumented function.
     *
     * @param string $key
     */
    private function searchKey($key)
    {
        foreach ($this->fileLines as $line) {
            $configLine = explode('=', $line);
            if (in_array($key, $configLine)) {
                return array_pop($configLine);
            }
        }

        return null;
    }
}
