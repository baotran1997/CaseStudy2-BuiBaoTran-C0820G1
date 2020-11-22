<div class="container checkOut">
  <div class="row">
    <div class="col-lg-6">
        <div class="checkOutContact">
            <h3>CONTACT INFORMATION</h3>
        </div>
    <form>
        
        <div class="form-group">
            <label for="customerName">Full Name:</label>
            <input type="text" class="form-control" id="customerName" placeholder="Enter full name" required>
        </div>
        <div class="form-group">
            <label for="customerPhone">Phone Number:</label>
            <input type="text" class="form-control" id="customerPhone" placeholder="Enter phone number" required>
        </div>
        <div class="form-group">
            <label for="customerEmail">Email address:</label>
            <input type="email" class="form-control" id="customerEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="customerAddress">Address:</label>
            <input type="text" class="form-control" id="customerAddress" placeholder="Enter address" required>
        </div>
        <div class="form-group">
            <label for="customerCity">City:</label>
            <input type="text" class="form-control" id="customerCity" placeholder="Enter city" required>
        </div>

        <div class="row">
            <div class="col continueShopping">
                <a href="#" onclick="window.history.go(-1)"> < CONTINUE SHOPPING</a>
            </div>
            <div class="col" style="text-align: right;">
               
            </div>
         </div>
    </form>  


    </div>
    <div class="col-lg-6 px-5">
        <div class="orderSummary">
            <div>
                ORDER SUMMARY:
            </div>
            <div class="container">
                <div class="row justify-content-between">
                    <div class="pl-3">
                        Subtotal:
                    </div>
                    <div class="pr-3">
                        200$
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="pl-3">
                    Shipping:
                    </div>
                    <div class="pr-3">
                        0$
                    </div>
                </div>
                <hr style="background-color: wheat;">
                <div class="row justify-content-between">
                    <div class="pl-3">
                    Order Total:
                    </div>
                    <div class="pr-3">
                        200$
                    </div>
                </div>
            </div>
            <div>
                 <button type="button" class="btn btn-danger">BUYING</button>
            </div>
        </div>
    </div>
  
  </div>
</div>