<?php namespace Fueldevco\Boilerplate\Controllers;

use Fueldevco\Boilerplate\Repositories\AbstractRepository;
use Illuminate\Routing\Controller;
use Response;

/**
 * Class AbstractBaseController
 *
 * @package Fueldevco\Boilerplate\Controllers
 */
abstract class AbstractBaseController extends Controller
{
    /**
     * @var AbstractRepository $repository;
     */
    protected $repository;

    /**
     * @var int
     */
    protected $httpStatusCode = 500;

    /**
     * @var array
     */
    protected $jsonData = [];

    /**
     * Build a new Controller
     *
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * @param $code
     *
     * @return $this
     */
    public function setHttpStatusCode($code)
    {
        $this->httpStatusCode = $code;
        return $this;
    }

    /**
     * @param       $data
     * @param       $status
     * @param array $headers
     * @param int   $options
     *
     * @return mixed
     */
    public function json($data, $status, $headers = [], $options = 0)
    {
        return Response::json($data, $status ?: $this->getHttpStatusCode(), $headers, $options);
    }
}