<?php namespace Fueldevco\Boilerplate\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;
use Fueldevco\Boilerplate\Repositories\AbstractRepository;

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
     * @param array $data
     * @param       $status
     * @param array $headers
     * @param int   $options
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function json(array $data = [], $status, $headers = [], $options = 0)
    {
        return Response::json($data, $status ?: $this->getHttpStatusCode(), $headers, $options);
    }

    /**
     * @param string $view
     * @param array $data
     *
     * @return \Illuminate\View\View
     */
    protected function view($view, array $data = [])
    {
        return View::make($view, $data);
    }
}