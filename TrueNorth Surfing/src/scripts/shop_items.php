<?php
require('config.php');
$product = new Product;
$products = $product->GetList();
$jproducts = json_encode($products);
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const productGrid = document.querySelector('.product-grid');
    const products = JSON.parse('<?php echo $jproducts; ?>');
    
    products.forEach(product => {
        const productItem = document.createElement('div');
        productItem.classList.add('product-item');
        productItem.innerHTML = `
            <h2 class="product-title">${product.title}</h2>
            <img src="${product.img}" alt="${product.title}" class="product-img">
            <p class="product-price">£${product.price}</p>
        `;
        
        productItem.addEventListener('click', () => {
            window.location.href = `../src/product-details.php?product_id=${product.product_id}`;
        });
        
        productGrid.appendChild(productItem);
    });
});
</script>
