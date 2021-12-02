package com.casestudy.couponService.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.casestudy.couponService.logic.CouponService;
import com.casestudy.couponService.model.CouponCard;

@RestController
@RequestMapping("/coupon")
public class CouponController {
	
	@Autowired
	CouponService service;
	
	@GetMapping("/hello")
	public String hello(){
		return "Hello World";		
	}
		
	@PostMapping("/addCoupon")
	public String addNewCoupon( @RequestBody CouponCard coupon ){
		return service.addCoupon( coupon );		
	}
		
	@GetMapping("/getAllCoupons")
	public List<CouponCard> viewAllCoupons(){
		return service.getAllCoupons();		
	}
	
	@PutMapping("/updateCoupon/{id}")
	public String updateExistingCoupon( @RequestBody CouponCard coupon, @PathVariable String id ){
		return service.updateCoupon( coupon, id );		
	}
	
	@GetMapping("/delateCoupon/{id}")
	public String deletedCoupon( @PathVariable String id ){
		return service.deleteCoupon( id );		
	}	

}
