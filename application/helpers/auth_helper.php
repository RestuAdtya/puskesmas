<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// THE HELPER

if (!function_exists('auth_check'))
{
	function auth_check($level = null, $module = null)
	{
		if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
			
			if(auth_level($_SESSION['type'], $level, $module)){
				return true;
			}else{
				redirect('error/access_denied');
			}
			
			return false;
		}else{
			redirect('auth/login');
		}
		
		return false;
	}
}

if (!function_exists('auth_level'))
{
	function auth_level($type = null, $level = null, $module = null)
	{
		$CI =& get_instance();
		
		if(is_null($level) || is_null($type)){
			return false;
		}
		
		if(is_null($module)){
			$module = 'home';
		}
		
		$CI->load->model('user_model');
		$check = $CI->user_model->check_user_level($type, strtolower($module), $level);
		
		return $check;
	}
}

if (!function_exists('level_check'))
{
	function level_check($level = null, $module = null)
	{
		$CI =& get_instance();
		$module = $CI->module;
		if(isset($_SESSION['is_login']) && $_SESSION['is_login']){
			
			if(auth_level($_SESSION['type'], $level, $module)){
				return true;
			}
			
			return false;
		}
		
		return false;
	}
}

if (!function_exists('auth_redirect'))
{
	function auth_redirect($type)
	{
		switch($type){
			case 'waiter':
				redirect(base_url('waiter'));
				break;
			
			case 'stand':
				redirect(base_url('stand'));
				break;
				
			default:
				redirect(base_url('admin'));
				break;
		}
	}
}