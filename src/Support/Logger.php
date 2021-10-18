<?php

namespace Lmh\Cpcn\Support;


use Exception;
use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;

/**
 * Class LogManager.
 *
 * @author overtrue <i@overtrue.me>
 */
class Logger implements LoggerInterface
{
    private $logger;

    /**
     * Logger constructor.
     * @param array $config
     * @throws Exception
     */
    public function __construct(array $config)
    {
        $config = $config['log'];
        $this->logger = new \Monolog\Logger($config['name']);
        $this->logger->pushHandler(new StreamHandler($config['path'], \Monolog\Logger::DEBUG));
    }

    /**
     * @param mixed $level
     * @param mixed $message
     * @param array $context
     * @throws Exception
     */
    public function log($level, $message, array $context = array())
    {
        $this->logger->log($level, $message, $context);
    }

    public function emergency($message, array $context = array())
    {
        $this->logger->emergency($message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->logger->alert($message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->logger->critical($message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->logger->error($message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->logger->warning($message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->logger->notice($message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->logger->info($message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->logger->debug($message, $context);
    }
}
