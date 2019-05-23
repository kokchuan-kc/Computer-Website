@extends('Shared/CustomerLayout')



@section('title', 'Shopping Cart')



@section('head')

<style type="text/css">
	#shoppingCart
	{
		height:90vh;
	}

	.cart, .product
	{
		border : 1px solid black;
	}

</style>
@endsection


<!--@change="sort($event)"-->
@section('body')

<div class="container" >
	<div class="row" id="shoppingCart">


		<div class="col-12" style="height:5%;">
			
			<label for="sortby">Sort By: </label>
			<select class="form-control" v-model="type" style="width:30%;display: inline-block;">
				<option value="">All</option>
				<option value="Keyboard">Keyboard</option>
				<option value="Mouse">Mouse</option>
			</select>
			<input type="text" v-model="name" placeholder="Search" class="form-control" style="width:40%;display: inline-block;">
			<button @click="search" type="button">Search</button>
		</div>

		<div class="col-12 col-lg-4 productList"  >
			
				
				<div v-for="(product, index) in productList" class="product" id="product">
					
					<p>@{{product.name}}</p>
					<img :src="product.img" style="width:100px;height:100px">
					<p>@{{product.price}}</p>


					<button @click="addToCart(index)">+</button>
					<button>About</button>
					
				</div>

			
		</div>

		<div class="col-12 col-lg-8 cartList">

			<div v-for="(cart, index) in cartList" class="cart" id="cart" >


				<p>@{{cart.name}}</p>
				<img :src="cart.img" style="width:100px;height:100px">
				<p>@{{cart.price}}</p>
				<p>Qty: @{{cart.qty}}</p>
				<button @click="removeFromCart(index)">-</button>

			</div>



		</div>


		
	</div>
</div>

@endsection



@section('script')

<script type="text/javascript">


// Test Data	
// var allList =
// {
// 	"1": {id: 1, name: "Logitech G502", img: "/img/g502.jpg", price: "500" },
// 	"2": {id: 2, name: "Corsair Scimitar", img: "/img/scimitar.jpg", price: "420" },
// 	"3": {id: 3, name: "Corsair K70", img: "/img/k70.jpg", price: "300" },
// 	"4": {id: 4, name: "Razer Blackwidow", img: "/img/blackwidow.jpg", price: "600" }
// }

// var mouseList =
// {
// 	1: {id: 1, name: "Logitech G502", img: "/img/g502.jpg", price: "500" },
// 	2: {id: 2, name: "Corsair Scimitar", img: "/img/scimitar.jpg", price: "420" }
// };

// var keyboardList = 
// {
// 	1: {id: 1, name: "Corsair K70", img: "/img/k70.jpg", price: "300" },
// 	2: {id: 2, name: "Razer Blackwidow", img: "/img/blackwidow.jpg", price: "600" }
// }

var allList =
[
	{id: 1, name: "Logitech G502", img: "/img/g502.jpg", price: "500" },
	{id: 2, name: "Corsair Scimitar", img: "/img/scimitar.jpg", price: "420" },
	{id: 3, name: "Corsair K70", img: "/img/k70.jpg", price: "300" },
	{id: 4, name: "Razer Blackwidow", img: "/img/blackwidow.jpg", price: "600" }
];



var mouseList =
[
	{id: 1, name: "Logitech G502", img: "/img/g502.jpg", price: "500" },
	{id: 2, name: "Corsair Scimitar", img: "/img/scimitar.jpg", price: "420" }
];



var keyboardList = 
[
	{id: 3, name: "Corsair K70", img: "/img/k70.jpg", price: "300" },
	{id: 4, name: "Razer Blackwidow", img: "/img/blackwidow.jpg", price: "600" }
];
	
array = []


var shoppingCart = new Vue(
{
	el: "#shoppingCart",
	data: 
	{	
		productList: allList,
		cartList: [],
		type: "",
		name: "",
	},
	methods:
	{
		addToCart(index)
		{

			var obj = {};
			Object.assign(obj,this.productList[index])
			var	matchingIndex = this.cartList.findIndex(x => x.id == obj.id)

			if( matchingIndex == -1)
			{
				obj.qty = 1;
				this.cartList.push(obj)
			}
			else
			{
				this.cartList[matchingIndex].qty += 1;
			}
		},

		removeFromCart(index)
		{
			var obj = this.cartList[index];

			obj.qty -= 1;

			if(obj.qty <= 0)
			{
				this.cartList.splice(index, 1);
			}

		},

		sort(event)
		{
			var type = event.target.value;

			if (type == "Keyboard") 
			{
				this.productList = keyboardList;
			}
			else if ( type == "Mouse")
			{
				this.productList = mouseList;
			}
			else
			{
				this.productList = allList;
			}

		},

		search()
		{

			var url = "/Product/search?type=" + this.type + "&brand=&name=" + this.name;
			jsonAjax(url, "GET", "", function(response) {shoppingCart.productList = response;}, function() {alert("Server Error")});
		}
	}
})





</script>

<script type=""></script>
@endsection