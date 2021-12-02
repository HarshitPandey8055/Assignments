package com.casestudy.OrderService.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/order")
public class Controller {
	
	@GetMapping("/hello")
	public String hello(){
		return "Hello World";		
	}

}
