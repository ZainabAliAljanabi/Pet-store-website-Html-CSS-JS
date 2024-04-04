




var pname;
var id;
var price;
var stock;
var des;
var image
var helpText;
    function init()
    {
		
        var myForm = document.getElementById("myForm");
        pname = document.getElementById("pname");
        id = document.getElementById("id");
        price = document.getElementById("price");
	    stock = document.getElementById("stock");
        des = document.getElementById("des");
        image = document.getElementById("image");
        myForm.onsubmit = check;
		
    } // end function init
    
	function check()
    {
		
        var pass = "";
        
		if (pname.value == ""){
            pass = "Please enter product name. ";
			}
        else if (!pname.value.match(/^[A-Za-z_][\w\-\s\.]+$/)){
			
		pass = pass + "Product name should be alphapbets only. ";
		}
        
		if (id.value == ""){
		pass = pass + "Please enter product id. ";
		}
		
		else if(isNaN(id.value)||(id.value < 1) ){
		pass = pass + "Please enter numeric product id. ";
		}
	 

		if (price.value == ""){
		pass = pass + "Please enter price for product. ";
		}
		
        else if(isNaN(price.value)||(price.value < 1) ){
		pass = pass +"Please enter numeric product price. ";
		}
		
	    if(des.value == ""){
			
        pass = pass + "Please enter description for product. ";	
		}
		
		else if (!des.value.match(/^[a-zA-Z][\w\-\s\.]+$/)){
			
		pass = pass + "Product description should not start or contain numbers only. ";
		}
		
	    if (image.value == "")
		{
		pass = pass + "Please enter image for product. ";	
        }
	
	 if (stock.value == "")
		{ pass = pass + "Please enter stock for product. ";	}
		
		
		
		if (pass != "")
        {
		alert(pass);
            
        return false;
        } 
		
		else
        return true;
    }
    
    window.addEventListener("load", init, false);
	
	
	 
	