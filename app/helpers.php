<?php

if(!function_exists('classActivePath'))
{
	function classActivePath($path)
	{
		return Request::is($path) ? ' class=active' : '';
	}
}

if(!function_exists('classActiveSegment'))
{
	function classActiveSegment($segment, $value)
	{
		
	}
}