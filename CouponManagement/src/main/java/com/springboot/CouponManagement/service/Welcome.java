package com.springboot.CouponManagement.service;

import org.springframework.web.bind.annotation.RestController;

import org.springframework.web.bind.annotation.GetMapping;

@RestController
public class Welcome {

	
	@GetMapping("/welcome")
	public String Welcomecontroller() {
		
		return"welcome to hello world";
		
	}

}
