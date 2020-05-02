<?php
/**
 * The Database Repository Class.
 *
 *  @author Amr Gamal <amr.gamal878@gmail.com>
 */
class Repository
{
    /**
     * the db connection instance.
     *
     * @var [PDO]
     */
    private $db;

    /**
     * Undocumented function.
     */
    public function __construct()
    {
        $this->db = $this->getConnection();
    }

    /**
     * Insert A Row.
     *
     * @param [type] $data
     *
     * @return [void]
     */
    public function insertData($data)
    {
        $sql = 'INSERT INTO shapes (width, height, average, area, area_squared) VALUES (:width,:height,:average,:area,:area_squared)';
        $this->db->prepare($sql)->execute($data);
    }

    /**
     * Fetch The last 5 rows.
     *
     * @return [array]
     */
    public function fetchData()
    {
        $sql = 'SELECT * FROM shapes ORDER BY id DESC LIMIT 5';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get a pdo connection instance.
     *
     * @return [void]
     */
    private function getConnection()
    {
        $envReader = new EnvReader('.env');
        $dsn = $envReader->parseConfig('DB_DRIVER').':dbname='.$envReader->parseConfig('DB_NAME').';host='.$envReader->parseConfig('DB_HOST');
        $dbUser = $envReader->parseConfig('DB_USER');
        $dbPassword = $envReader->parseConfig('DB_PASS');

        try {
            $connection = new PDO($dsn, $dbUser, $dbPassword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connection;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
