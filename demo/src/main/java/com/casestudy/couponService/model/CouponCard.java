package com.casestudy.couponService.model;

import java.util.Date;
import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection = "Coupon")
public class CouponCard {
	
	@Id
	private String Id;
	private String Title;
	private Long Quantity;
	private Date Expiry;
	private String Decscription;
	private String Type;
	private String Location;
	
	public String getLocation() {
		return Location;
	}
	public void setLocation(String location) {
		Location = location;
	}
	public String getId() {
		return Id;
	}
	public void setId(String id) {
		Id = id;
	}
	public String getTitle() {
		return Title;
	}
	public void setTitle(String title) {
		Title = title;
	}
	public Long getQuantity() {
		return Quantity;
	}
	
	public void setQuantity(Long quantity) {
		Quantity = quantity;
	}
	public Date getExpiry() {
		return Expiry;
	}
	public void setExpiry(Date expiry) {
		Expiry = expiry;
	}
	public String getDecscription() {
		return Decscription;
	}
	public void setDecscription(String decscription) {
		Decscription = decscription;
	}
	public String getType() {
		return Type;
	}
	public void setType(String type) {
		Type = type;
	}
	
	public CouponCard(String id, String title, Long quantity, Date expiry, String decscription, String type,String location) {
		this.Id = id;
		this.Title = title;
		this.Quantity = quantity;
		this.Expiry = expiry;
		this.Decscription = decscription;
		this.Type = type;
		this.Location = location;
	}
	public CouponCard() {}
	
}
