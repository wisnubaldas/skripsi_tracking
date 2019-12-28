<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Philo\Blade\Blade;
class Blade_view {

        protected $CI;
        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
        }
        public function render($page,$data = [])
        {
        	$this->CI->config->load('blade');
        	$blade = new Blade($this->CI->config->item('blade_views'),$this->CI->config->item('blade_cache'));
        	echo $blade->view()->make($page,$data)->render();
        }
}


