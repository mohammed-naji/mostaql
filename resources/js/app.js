require('./bootstrap');

window.Echo.private(`App.Models.User.${userId}`)
    .notification( (nf) => {

        toastr.warning(`<a href="${nf.url}">${nf.text}</a>`);

    } );


// if(typeof user2Id != 'undefined') {
//     // if(user2Id) {
//         window.Echo.private(`App.Models.User2.${user2Id}`)
//         .notification( (nf) => {

//             console.log(nf);
//             toastr.warning(nf.text);

//         } );
//     }

// if(typeof userId != 'undefined') {
// // if(userId) {
//     window.Echo.private(`App.Models.User.${userId}`)
//     .notification( (nf) => {

//         toastr.warning(`<a href="${nf.url}">${nf.text}</a>`);

//     } );
// }

