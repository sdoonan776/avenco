(function(){

let quantityControl = document.querySelector('.quantity');

    // Array.from(classname).forEach(function(element) {
        quantityControl.addEventListener('change', function() {
            let id = quantityControl.getAttribute('data-id');
            let productQuantity = quantityControl.getAttribute('data-productQuantity');

            axios.patch(`/cart/${id}`, {
                quantity: this.value,
                productQuantity: productQuantity
            })
            .then(function (response) {
                // console.log(response);
                window.location.href = "cart";
            })
            .catch(function (error) {
                // console.log(error);
                window.location.href = "cart";
            });
        })
    // })
})();