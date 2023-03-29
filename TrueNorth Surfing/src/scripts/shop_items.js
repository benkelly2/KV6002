document.addEventListener('DOMContentLoaded', function () {
    const productGrid = document.querySelector('.product-grid');
    
    // Example product data
    const products = [
        {
            product_id: 1,
            title: 'TNSC T-Shirt',
            price: 19.99,
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 2,
            title: 'TNSC Hoodie',
            price: 39.99,
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 3,
            title: 'TNSC Cap',
            price: 14.99,
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 4,
            title: 'TNSC Wax',
            price: '3.29',
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 5,
            title: 'TNSC Membership',
            price: '14.99',
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 6,
            title: 'TNSC Membership',
            price: '14.99',
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 7,
            title: 'TNSC Membership',
            price: '14.99',
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 8,
            title: 'TNSC Membership',
            price: '14.99',
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 9,
            title: 'TNSC Membership',
            price: '14.99',
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        },
        {
            product_id: 10,
            title: 'TNSC Membership',
            price: '14.99',
            img: '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg'
        }
    ];
    
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
