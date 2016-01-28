function cust_func() {  
  var cust_info = [{ c_fname: "Donghyuk", 
					c_lname: "Jang",
					c_phone: "647-466-3365",
					c_email: "donghyuk0117@gmail.com",
					moving_date: "Feburary 25th",
					moving_time: "9:20 a.m.",
					pick_up: {
						type: "1Bedroom Condo",
						address: "777 Richmond St West",
						unit: "2030",
						city: "Toronto",
						desc: "2 TV, 1 Queen bed, 1 Big Desk, 1 Storage."
					},
					drop_off: {
						type: "TownHouse",
						address: "777 Richmond St",
						unit : "",
						city: "Toronto",
						desc: "No elevator, Narrow parking lot."
					},
					you_get:["2 Movers", "16ft Truck", "5 Hours of moving", "50 Boxes", 
							"2 Wardrobe", "Box Delivery", "Mattress Covers", "Furniture Wrapping",
							"Basic Tools", "Handy Service", "Fast Friendly Service"]
				  }];
  var customer_name = document.getElementById("c_name");
  var customer_phone = document.getElementById("c_phone");
  var customer_email = document.getElementById("c_email");
  var customer_date = document.getElementById("m_date");
  var customer_time = document.getElementById("m_time");
  
  var pick_home = document.getElementById("pick_home");
  var pick_address = document.getElementById("pick_address");
  var pick_desc = document.getElementById("pick_desc");
  
  var drop_home = document.getElementById("drop_home");
  var drop_address = document.getElementById("drop_address");
  var drop_desc = document.getElementById("drop_desc");
  
  var you_get = document.getElementById("you_get");
  
  customer_name.innerHTML = "<p>" + cust_info[0].c_fname + " " + cust_info[0].c_lname + "</p>";
  customer_phone.innerHTML = cust_info[0].c_phone;
  customer_email.innerHTML = cust_info[0].c_email;
  customer_date.innerHTML = cust_info[0].moving_date;
  customer_time.innerHTML = cust_info[0].moving_time;
  
  pick_home.innerHTML = cust_info[0].pick_up.type;
  pick_address.innerHTML = cust_info[0].pick_up.unit + " " + cust_info[0].pick_up.address + ", " + cust_info[0].pick_up.city;
  pick_desc.innerHTML = cust_info[0].pick_up.desc;
  
  drop_home.innerHTML = cust_info[0].drop_off.type;
  drop_address.innerHTML = cust_info[0].drop_off.unit + " " + cust_info[0].drop_off.address + ", " + cust_info[0].drop_off.city;
  drop_desc.innerHTML = cust_info[0].drop_off.desc;
  
  you_get.innerHTML = "<div>";
  
  for(var i = 0; i < cust_info[0].you_get.length; i++) {
    you_get.innerHTML += "<span>" + cust_info[0].you_get[i] + "</span><br/>";
  }
  you_get.innerHTML += "</div>";
}

window.onload = cust_func();
