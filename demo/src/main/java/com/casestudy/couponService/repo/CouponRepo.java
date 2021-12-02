package com.casestudy.couponService.repo;

import org.springframework.data.mongodb.repository.MongoRepository;

import com.casestudy.couponService.model.CouponCard;

public interface CouponRepo extends MongoRepository< CouponCard, String > {
	
	

}
