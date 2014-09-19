<?php namespace Fueldevco\Boilerplate\Support;

use Closure;
use Illuminate\Session\Store as SessionStore;
use Illuminate\Support\MessageBag as M;

/**
 * Class Messages
 *
 * @package Fueldevco\Boilerplate\Support
 */
class Messages extends M
{

    /**
     * @var \Illuminate\Session\Store
     */
    protected $session;

    /**
     * Cached messages to be extends to current request.
     *
     * @var self
     */
    protected $instance = null;

    /**
     * @param SessionStore $session
     * @return $this
     */
    public function setSessionStore(SessionStore $session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get the session store.
     *
     * @return \Illuminate\Session\Store
     */
    public function getSessionStore()
    {
        return $this->session;
    }

    /**
     * Add a message to the bag.
     *
     * @param  string  $key
     * @param  string  $message
     * @return \Illuminate\Support\MessageBag
     */
    public function add($key, $message)
    {
        parent::add($key, $message);
        $this->save();
    }

    /**
     * Retrieve Message instance from Session, the data should be in
     * serialize, so we need to unserialize it first.
     *
     * @return self
     */
    public function retrieve()
    {
        $messages = null;

        if (! isset($this->instance)) {
            $this->instance = new static();
            $this->instance->setSessionStore($this->session);

            if ($this->session->has('message')) {
                $messages = @unserialize($this->session->get('message', ''));
            }

            $this->session->forget('message');

            if (is_array($messages)) {
                $this->instance->merge( $messages );
            }
        }
        return $this->instance;
    }

    /**
     * @param Closure $callback
     * @return Messages
     */
    public function extend(Closure $callback)
    {
        $instance = $this->retrieve();
        call_user_func($callback, $instance);

        return $instance;
    }

    /**
     * Store current instance.
     *
     * @return void
     */
    public function save()
    {
        $this->session->flash('message', $this->serialize());
    }

    /**
     * Compile the instance into serialize
     *
     * @return string   serialize of this instance
     */
    public function serialize()
    {
        return serialize($this->messages);
    }
}