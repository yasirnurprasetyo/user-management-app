<?php

function checkOnLogin()
{
	$ci = &get_instance();
	if (!$ci->session->userdata('is_logged_in')) {
		redirect("login");
	}
}