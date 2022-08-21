
<!DOCTYPE html>
<!--code by webdevtrick ( https://webdevtrick.com) -->
<html lang="en">
<head>
    <link rel="icon" href="https://webdevtrick.com/wp-content/uploads/2019/02/webdevtrick-favicon-1.png" type="image/png" sizes="16x16">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77741880-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-77741880-4');
</script>
<script async src=//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js></script> <script>(adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-1438670738267328",
          enable_page_level_ads: true
     });</script> <script async src=//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js></script> <script>(adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-1438670738267328", enable_page_level_ads: true });</script>  <title>Responsive Shopping Cart | Webdevtrick.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="canonical" href="https://webdevtrick.com/responsive-shopping-cart-page/" />
<link rel="stylesheet" href="style.css">

</head>
<body>

<h1>Shopping Cart</h1>

<div class="shopping-cart">

  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="https://webdevtrick.com/wp-content/uploads/predator.jpg">
    </div>
    <div class="product-details">
      <div class="product-title">Asus Predator</div>
      <p class="product-description">Predator is the new product series dedicated to PC Gaming from Acer: Desktop, Notebook, Tablet and Monitors for a complete gaming experience.</p>
    </div>
    <div class="product-price">1262.00</div>
    <div class="product-quantity">
      <input type="number" value="2" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">2524.00</div>
  </div>

  <div class="product">
    <div class="product-image">
      <img src="https://webdevtrick.com/wp-content/uploads/msi.jpg">
    </div>
    <div class="product-details">
      <div class="product-title">MSI Gaming Laptop</div>
      <p class="product-description">MSI Gaming laptops offer you an unrivaled experience when it comes to PC gaming. Utilizing the latest processors and graphics.</p>
    </div>
    <div class="product-price">1445.99</div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">1445.99</div>
  </div>

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">3696.99</div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">4079.16</div>
    </div>
  </div>
      
      <button class="checkout">Checkout</button>

</div>

<section class="codes">
  <Div><a href="https://webdevtrick.com/responsive-shopping-cart-page/" target="_blank">Get Source Code</a></Div>
</section>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="function.js"></script>

</body>
</html>
