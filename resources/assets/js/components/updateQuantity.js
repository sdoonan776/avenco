(function(){

let classname = document.querySelectorAll('.quantity')

    Array.from(classname).forEach(function(element) {
        element.addEventListener('change', function() {
            let id = element.getAttribute('data-id');
            let productQuantity = element.getAttribute('data-productQuantity');

            axios.patch(`/cart/${id}`, {
                quantity: this.value,
                productQuantity: productQuantity
            })
            .then(function (response) {
                console.log(response);
                window.location.href = "cart";
            })
            .catch(function (error) {
                console.log(error);
                window.location.href = "cart";
            });
        })
    })
})();