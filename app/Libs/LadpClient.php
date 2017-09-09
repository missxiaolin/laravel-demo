<?php

namespace App\Libs;

use Log;
use Symfony\Component\Ldap\Adapter\ExtLdap\Adapter;
use Symfony\Component\Ldap\Ldap;

/**
 * Class Ladp.
 */
class LadpClient
{
    public $host;
    public $port = 389;
    public $protocol_version = 3;
    public $referrals = false;

    public $dn;
    public $password;

    public static $instances;

    protected $ladpClient;

    public function __construct($config = [])
    {
        $this->host = $config['host'] ?? config('ldap.host');
        $this->port = $config['port'] ?? config('ldap.port');
        $this->dn = $config['dn'] ?? config('ldap.dn');
        $this->password = $config['password'] ?? config('ldap.password');

        $this->ladpClient = static::getLadpClient();
    }

    public static function getInstance($config = [])
    {
        if (!isset(self::$instances) || !(self::$instances instanceof LadpClient)) {
            self::$instances = new LadpClient($config);
        }
        return self::$instances;
    }

    public function getLadpClient()
    {
        $data = [
            'host' => $this->host,
            'port' => $this->port,
            'options' => array(
                'protocol_version' => $this->protocol_version,
                'referrals' => $this->referrals,
            ),
        ];
        $adapter = new Adapter($data);
        $ldap = new Ldap($adapter);
        $ldap->bind($this->dn, $this->password);
        return $ldap;
    }

    public function query($query = '')
    {
        $db = $this->ladpClient->query('dc=enmonster,dc=com', $query)->execute()->toArray();
        self::log($query, $db ? $db[0]->getAttributes() : []);
        return $db;
    }

    /**
     * @desc   保存日志
     * @author limx
     * @param $msg
     * @param $query
     * @param $db
     */
    public static function log($query, $db = [])
    {
        $message = '';

        $message .= PHP_EOL . "query：" . $query;
        $message .= PHP_EOL . "结果集合：" . json_encode($db, JSON_UNESCAPED_UNICODE);
        $message .= PHP_EOL;

        $logger = app('logger_factory')->getLogger('bd-gh');
        $logger->info($message);
    }

    /**
     * 获取运维人员工号
     * @param string $mobile
     * @return string
     */
    public function getMobile($mobile = '')
    {
        $employeeNumber = '';
        $db = $this->ladpClient->query('dc=enmonster,dc=com', "(mobile={$mobile})")->execute()->toArray();
        if (!empty($db)) {
            $employeeNumber = $db[0]->getAttribute('employeeNumber')[0];
        }
        return $employeeNumber;
    }
}
