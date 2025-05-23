<!--main area-->
<main id="main" class="main-site">
	<style>
		.summary-item .row-in-form input[type=password], .summary-item .row-in-form input[type=text], .summary-item .row-in-form input[type=tel] {
			font-size: 13px;
			line-height: 19px;
			display: inline-block;
			height: 43px;
			padding: 2px 20px;
			max-width: 300px;
			width: 100%;
			border: 1px solid #e6e6e6;
		}
	</style>

	<div class="container">

		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="/" class="link">home</a></li>
				<li class="item-link"><span>Checkout</span></li>
			</ul>
		</div>
		<div class=" main-content-area">
			<form wire:submit.prevent="placeOrder">
				<div class="row">
					<div class="col-md-12">
						<div class="wrap-address-billing">
							<h3 class="box-title">Billing Address</h3>
							<div class="billing-address">
								<p class="row-in-form">
									<label for="fname">First name<span>*</span></label>
									<input type="text" name="fname" value="" placeholder="Your first name" wire:model="firstname">
									@error('firstname')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								<p class="row-in-form">
									<label for="lname">last name<span>*</span></label>
									<input type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
									@error('lastname')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								<p class="row-in-form">
									<label for="email">Email Addreess:<span>*</span></label>
									<input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
									@error('email')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								<p class="row-in-form">
									<label for="phone">Phone number<span>*</span></label>
									<input type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
									@error('mobile')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								<p class="row-in-form">
									<label for="add">Address:<span>*</span></label>
									<input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line1">
									@error('line1')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								<p class="row-in-form">
									<label for="add">Address Details:</label>
									<input type="text" name="add" value="" placeholder="Street at apartment number" wire:model="line2">
								</p>
								<p class="row-in-form">
									<label for="country">Country<span>*</span></label>
									<input type="text" name="country" value="" placeholder="United States" wire:model="country">
									@error('country')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								<p class="row-in-form">
									<label for="city">Province<span>*</span></label>
									<input type="text" name="province" value="" placeholder="Province" wire:model="province">
									@error('province')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								<p class="row-in-form">
									<label for="city">Town / City<span>*</span></label>
									<input type="text" name="city" value="" placeholder="City name" wire:model="city">
									@error('city')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								<p class="row-in-form">
									<label for="zip-code">Postcode / ZIP:<span>*</span></label>
									<input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
									@error('zipcode')
										<span class="text-danger">{{$message}}</span>
									@enderror
								</p>
								{{-- <p class="row-in-form fill-wife">
									<label class="checkbox-field">
										<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
										<span>Ship to a different address?</span>
									</label>
								</p> --}}
							</div>
						</div>
					</div>
					
				</div>
				
				<div class="summary summary-checkout">
					<div class="summary-item payment-method">
						<h4 class="title-box">Payment Method</h4>

						{{-- <p class="summary-info"><span class="title">Check / Money order</span></p> --}}
						<p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment_method" value="cod" type="radio" wire:model="paymentmode">
								<span>Cash on Delivery</span>
								<span class="payment-desc">Pay on Delivery</span>
							</label>
							<label class="payment-method">
								<input name="payment_method" value="card" type="radio" wire:model="paymentmode">
								<span>Debit / Credit Card</span>
								<span class="payment-desc">Payment By Card</span>
							</label>
							{{-- <label class="payment-method">
								<input name="payment-method" id="payment-method-bkash" value="bkash" type="radio" wire:model="paymentmode">
								<span>BKash</span>
								<span class="payment-desc">Payment By BKash</span>
							</label> --}}
							@error('paymentmode')
								<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
						@if(Session::has('checkout'))
							<p class="summary-info grand-total"><span>Total :</span> <span class="grand-total-price">৳ {{Session::get('checkout')['total']}}</span></p>
						@endif
						<button type="submit" class="btn btn-medium">Place order now</button>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed ৳ 0.00</span></p>
						
					</div>
				</div>
			</form>

			

		</div><!--end main content area-->
	</div><!--end container-->

</main>