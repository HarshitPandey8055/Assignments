package com.casestudy.couponService.logic;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.casestudy.couponService.model.ClaimedCoupon;
import com.casestudy.couponService.model.CouponCard;
import com.casestudy.couponService.repo.CouponRepo;

@Service
public class CouponService {
	
	@Autowired
	CouponRepo repo;
	
	ClaimedCoupon card;
	
	
	public String addCoupon( CouponCard coupon ){
		repo.insert( coupon );
		return ("Added Successfully");		
	}
	
	public List<CouponCard> getAllCoupons(){
		return repo.findAll();		
	}
	
	public String updateCoupon( CouponCard coupon, String id) { 
		coupon.setId( id ); 
		repo.save( coupon );
		return ("Updated Successfully"); 
	}
	
	public String deleteCoupon( String id) { 
		repo.deleteById( id );
		return ("Deleted Successfully"); 	
	}
	
	public String claimedCoupon( String id ) {
		
//		card.setCard( repo.findById( id ) );
//		repo.insert( card, id );
		return ("Claimed Successfully");
	}
}
