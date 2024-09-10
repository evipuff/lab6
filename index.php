<?php
require "vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log'));

// add records to the log
$log->warning('Samantha Ticsay');
$log->error('samantha.jane@example.com');
$log->info('profile', [
    'student_number' => '12345',
    'college' => 'Computer Studies',
    'program' => 'Information Technology',
    'university' => 'Angeles University Foundation'
]);

class TestClass
{
    private $logger;

    public function __construct($logger_name)
    {
        $this->logger = new Logger($logger_name);
        // Log that the class has been created
        $this->logger->info(__FILE__ . " Greetings to {$logger_name}");
    }

    public function greet($name)
    {
        // provide a greeting message with the name of the invoker
        $message = "Greetings to {$name}";
        
        // Log it
        $this->logger->info(__METHOD__ . " " . $message);
        
        return $message;
    }

    public function getAverage($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " get the average");

        // compute the average and return it
        if (empty($data)) {
            return 0;
        }
        $average = array_sum($data) / count($data);
        return $average;
    }

    public function largest($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Get the largest number");

        // compute the largest number and return it
        if (empty($data)) {
            return null;
        }
        return max($data);
    }

    public function smallest($data)
    {
        // Log it
        $this->logger->info(__CLASS__ . " Get the smallest number");

        // compute the smallest number and return it
        if (empty($data)) {
            return null;
        }
        return min($data);
    }
}

$my_name = 'Samantha';
$obj = new TestClass('TestLogger');
echo $obj->greet($my_name) . PHP_EOL;

$data = [100, 345, 4563, 65, 234, 6734, -99];
echo "Average: " . $obj->getAverage($data) . PHP_EOL;
echo "Largest: " . $obj->largest($data) . PHP_EOL;
echo "Smallest: " . $obj->smallest($data) . PHP_EOL;

$log->info('data', $data);
$log->info('object', [
    'greeting' => $obj->greet($my_name),
    'average' => $obj->getAverage($data),
    'largest' => $obj->largest($data),
    'smallest' => $obj->smallest($data),
]);