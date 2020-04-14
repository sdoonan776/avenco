// (function(){
//     const classname = document.querySelectorAll('.quantity')
//     Array.from(classname).forEach(function(element) {
//         element.addEventListener('change', function() {
//             const id = element.getAttribute('data-id')
//             const productQuantity = element.getAttribute('data-productQuantity')
//             axios.patch(`/cart/${id}`, {
//                 quantity: this.value,
//                 productQuantity: productQuantity
//             })
//             .then(function (response) {
//                 // console.log(response);
//                 window.location.href = 'cart'
//             })
//             .catch(function (error) {
//                 // console.log(error);
//                 window.location.href = 'cart'
//             });
//         })
//     })
// })();