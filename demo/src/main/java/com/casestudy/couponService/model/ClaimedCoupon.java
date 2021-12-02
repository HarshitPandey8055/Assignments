package com.casestudy.couponService.model;

import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "ClaimedCoupon")
public class ClaimedCoupon {
	
	CouponCard card;
	private String custId;
	
	public CouponCard getCard() {
		return card;
	}
	public void setCard(CouponCard card) {
		this.card = card;
	}
	public String getCustId() {
		return custId;
	}
	public void setCustId(String custId) {
		this.custId = custId;
	}

}
