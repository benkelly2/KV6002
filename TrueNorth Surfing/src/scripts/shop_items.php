<?php
require('config.php');
$product = new Product;
$products = $product->GetList();
$jproducts = htmlspecialchars(json_encode($products), ENT_QUOTES, 'UTF-8');
?>

<script>
function htmlspecialchars_decode(string) {
    const map = {
        '&amp;': '&',
        '&lt;': '<',
        '&gt;': '>',
        '&quot;': '"',
        '&#039;': "'"
    };
    return string.replace(/&amp;|&lt;|&gt;|&quot;|&#039;/g, function(match) {
        return map[match];
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const productGrid = document.querySelector('.product-grid');
    const products = JSON.parse(htmlspecialchars_decode('<?php echo $jproducts; ?>'));
    
    products.forEach(product => {
        const productItem = document.createElement('div');
        productItem.classList.add('product-item');
        productItem.innerHTML = `
            <h2 class="product-title">${product.title}</h2>
            <img src="../TNSC_Pictures/TNSC_tshirt/shoplogo.png" alt="${product.title}" class="product-img">
            <p class="product-price">£${parseFloat(product.price).toFixed(2)}</p>
        `;
        
        productItem.addEventListener('click', () => {
            window.location.href = `../src/product-details.php?product_id=${product.product_id}`;
        });
        
        productGrid.appendChild(productItem);
    });
});
</script>
