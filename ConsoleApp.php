<?php
/**
 * The Console App class.
 *
 * @author Amr Gamal <amr.gamal878@gmail.com>
 */
class ConsoleApp
{
    /**
     * The PDO connection.
     *
     * @var [Repository]
     */
    private $repo;

    /**
     * The width argument.
     *
     * @var [float]
     */
    private $width;

    /**
     * The height argument.
     *
     * @var [float]
     */
    private $height;

    /**
     * Inject the database repository as a dependency.
     *
     *  @author Amr Gamal <amr.gamal878@gmail.com>
     */
    public function __construct(Repository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Run the command.
     *
     * @author Amr Gamal <amr.gamal878@gmail.com>
     */
    public function run()
    {
        try {
            $this->width = $this->validateArg($this->sanitizeCommand('Enter width: '));
            $this->height = $this->validateArg($this->sanitizeCommand('Enter height: '));
            $area = $this->width * $this->height;
            $data = [
                'width' => $this->width,
                'height' => $this->height,
                'average' => ($this->width + $this->height) / 2,
                'area' => $area,
                'area_squared' => $area * $area,
            ];
            $this->repo->insertData($data);
            $this->printResults();
            $this->generateReport(new HtmlOutput());
        } catch (InvalidArgumentException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Validate the command argument.
     *
     * @author Amr Gamal <amr.gamal878@gmail.com>
     *
     * @param [mixed] $arg
     */
    private function validateArg($arg)
    {
        if (!is_numeric($arg) || $arg <= 0) {
            throw new InvalidArgumentException('you must provide a positive numeric value for this command'.PHP_EOL);
        }

        return $arg;
    }

    /**
     * Generate the command based on the os.
     * That was tested on ubuntu linux 20.04 LTS.
     *
     * @author Amr Gamal <amr.gamal878@gmail.com>
     *
     * @param [string] $command
     *
     * @return string
     */
    private function sanitizeCommand($command)
    {
        if (PHP_OS === 'WINNT') {
            return  $command.' '.trim(stream_get_line(STDIN, 1024, PHP_EOL));
        }

        return trim(readline($command));
    }

    /**
     * Undocumented function.
     */
    private function printResults()
    {
        $results = $this->repo->fetchData();
        foreach ($results as $row) {
            echo 'width: '.$row['width'].' || Height: '.$row['height'].' || Average: '.$row['average'].' || Area: '.$row['area'].' || Squared Area: '.$row['area_squared'].PHP_EOL;
        }
    }

    /**
     * Undocumented function.
     */
    private function generateReport(OutputInterface $formatter)
    {
        $formatter->output($this->repo->fetchData());
    }
}
